<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Account;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;


class PartnerController extends BaseController
{
    public $data = [];
    private $ids;
    public function __construct()
    {
        // $this->ids = $this->getIds();

    }
    private function getIds(){
        $customer = Customer::find(Auth::user()->id);
        if($customer != null){
            return $customer->getDescendantIds();
        }
        return [];
    }
    public function index()
    {
        
        return view("");
    }
    
    public function makepass(Request $request){
        return $this->success(Hash::make($request->password));
    }
    
    
    public function getUserinfo(Request $request){
        $id = $request->id;
        $data = DB::table('customers')->where('id',$id)->first();
        $html = view('partner.include.modal_update_customer', compact('data'))->render();
        return $this->data($html);
    }
    
    public function getImageinfo(Request $request){
        $id = $request->id;
        $data = DB::table('setting_img')->where('id',$id)->first();
        $html = view('admin.include.modal_update_image', compact('data'))->render();
        return $this->data($html);
    }
    
     public function getReportinfo(Request $request){
        $id = $request->id;
        $data = DB::table('reports')->where('id',$id)->first();
        $html = view('admin.include.modal_update_report', compact('data'))->render();
        return $this->data($html);
    }
    
     public function loan(Request $request){
        return view("partner.loan", $this->data);
    }
    public function updateImage(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:setting_img,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|integer|in:1,2',
            'status' => 'required|boolean',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $imageName);

              DB::table('setting_img')->where('id',$request->id)->update([
                "image"=> 'assets/images/' . $imageName,
                "type" => $request->type,
                "status" => $request->status,
                "updated_at" => now()
            ]);
        }else{
            
            DB::table('setting_img')->where('id',$request->id)->update([
                "type" => $request->type,
                "status" => $request->status,
                "updated_at" => now()
            ]);
        }
        
        return $this->success("Cập nhật thành công");

    }
    
    public function walletsave(Request $request){
        
        
        
        $this->ids = $this->getIds();
        $data = DB::table('wallet_profit')->whereIn('customer_id',$this->ids)->paginate(20);
        $arrColor = ['#FF0033','#FFCC00','#6666FF','#00CC00','#CC00CC'];
        foreach ($data as $key => $each){
            $customer =  DB::table('customers')->where('id',$each->customer_id)->first();
            $each->historys = DB::table('wallet_profit_history')->where('customer_id',$each->customer_id)->get();
            $each->customer = $customer;
            $each->color = $arrColor[$key];
            $each->n     =  ucfirst(substr($each->customer->username, 0, 2));
        }
        
        
        
        $this->data['wallets'] = $data;
        return view("partner.walletsave", $this->data);
    }
    
    public function interest(){
        return view('partner.interest');
    }
    
     public function interestList(Request $request){
         
        $query = DB::select(DB::raw("
            select * from levels 
        "));
        
   
        $data = collect($query);

        return $this->data($data);
    }
    
    
    public function loanList(Request $request){
       $this->ids = $this->getIds();

        $query = DB::table('customer_debt as h')
            ->whereIn('h.customer_id', $this->ids)
            ->leftJoin('customers as c', 'h.customer_id', '=', 'c.id')
            ->select('h.*', 'c.email')
            ->orderBy('h.id', 'desc')
            ->get();
        
   
        $data = collect($query);
      
        return $this->data($data);
    }
    
    public function updateReport(Request $request){
        $id = $request->id;
        $note = $request->note;
        if($note == ""){
            return $this->error("Vui lòng điền nội dung phản hồi");
        }else{
            DB::table('reports')->where('id',$id)->update([
                'status' => 1,
                'note'   => $note
            ]);
            
            return $this->success('Trả lời phản hồi thành công');
        }
    }
    

    public function orders(Request $request){
        return view("partner.order", $this->data);
    }
    
    public function orderList(Request $request){
        $this->ids = $this->getIds();
        $query = DB::table('orders as h')
        ->whereIn('h.customer_id', $this->ids)  // Chắc chắn là bạn muốn lọc theo các `id` này
        ->leftJoin('customers as c', 'h.customer_id', '=', 'c.id')
        ->select('h.*', 'c.email')
        ->orderBy('h.id', 'desc')
        ->get();
        
   
        $data = collect($query);

        return $this->data($data);
    }
    
    public function addCustomer(Request $request){
        if(strlen($request->username) < 4 || strlen($request->username) > 15){
            return $this->error("Tài khoản từ 4 - 15 ký tự");
        }
        
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return $this->error("Email không đúng định dạng");
        }

        if(strlen($request->password) < 6){
            return $this->error("Mật khẩu từ 6 ký tự trở lên");
        }

        if($request->password != $request->repassword){
            return $this->error("Xác nhận mật khẩu không đúng");
        }
        
        
      

        $getEmail = DB::table('customers')->where('username', $request->username)->first();

        if ($getEmail != null) {
            return $this->error("Tài khoản đã được đăng ký rồi");
        }
    

        $getUser = DB::table('customers')->where('email', $request->email)->first();

        if ($getUser != null) {
            return $this->error("Email đã được đăng ký rồi");
        }
        
       
        
        $passwordHash = md5($request->password);
        $result = DB::table('customers')->insert([
            'password' => $passwordHash,
            'username' => $request->username,
            "level" => 1,
            'money' => 0,
            'email' => $request->email,
            'phone' => $request->phone,
            'bank_name' => '',
            'bank_account' => '',
            'bank_number' => '',
            'status' => 1,
            'ref_id' => 0, 
            'created_at' => date('Y-m-d H:i:s'),
            'last_login' => date('Y-m-d H:i:s'),
            'password2' => '',
            'role'      => $request->role,
        ]);
        if ($result > 0) {
            $user = User::where('username', $request->username)->where('password', $passwordHash)->first();
            DB::table('login_historys')->insert([
                'customer_id' => $user->id,
                'ip' => $request->ip(),
                'use_agent' => $request->header('User-Agent'),
                'created_at' => Carbon::now()
            ]);
            Auth::login($user);
            return $this->success('Thêm tài khoản thành công');
        } else {
            return $this->error('Thêm tài khoản không thành công');
        }
    }
    
    public function customerTable(Request $request){
            $this->ids = $this->getIds();

            $txt = $request->s ?? '';
            $data = DB::table('customers')
                ->whereIn('id', $this->ids)->latest()
                ->where(function($query) use ($txt) {
                    $query->where('username', 'like', '%' . $txt . '%')
                          ->orWhere('email', 'like', '%' . $txt . '%');
                })->paginate(20);

        $html = view('partner.include.customer_table', compact('data'))->render();


        return $this->data($html);

    }
    
    public function addImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|integer|in:1,2,3',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $imageName);

          
            DB::table('setting_img')->insert([
                'image' =>   'assets/images/' . $imageName,
                'type'  =>   $request->type,
                'status' => $request->status,
                'updated_at' => now()
            ]);

            return $this->success('Thêm hình ảnh thành công');
        }

        return $this->error('Thêm hình ảnh thất bại');
    }
    
    
    public function deleteImage(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:setting_img,id',
        ]);
    
        $settingImg = DB::table('setting_img')->where('id',$request->id)->first();
    
        if (!$settingImg) {
            return $this->error("không tim thấy hình ảnh");
        }
    
        $imagePath = public_path($settingImg->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    
        DB::table('setting_img')->where('id',$request->id)->delete();
    
            return $this->success("Xóa thành công");
    }
    
    public function deleteCustomer(Request $request){
        
        $id = $request->id;
        
        DB::table('customers')->where('id',$id)->delete();
        
        return redirect()->route('adminCustomer');
    }
    
   public function report(Request $request){
        $data = DB::table('reports')->latest()->paginate(20);
        return view("admin.report", ['data'=>$data]);
   }
   
    public function notification(Request $request){
        $data = DB::table('notifications')->latest()->paginate(20);
        return view("admin.notification", ['data'=>$data]);
   }
    
   public function updateCustomer(Request $request)
    {
        $data = $request->all();
        $user = DB::table("customers")->where('id',$request->id)->first();
        
       
    
        $customer = DB::table('customers')->where('id', $data['id'])->update(
            ['fee' => $data['fee']]
        );
    
        if ($customer) {
            return  $this->success("Cập nhật thành công");
        } else {
            return  $this->error("Cập nhật thất bại");
        }
    }
    
    
    public function addcredit(Request $request){
        if(!is_numeric($request->money)){
            return $this->error('Nhập số tiền hợp lệ');
        }
        $amount = intval($request->money);
        $customerData = DB::table('customers')->where('id', $request->id)->first();
        if($customerData == null){
            return $this->error('Khách hàng không hợp lệ');
        }
       
        DB::table('customer')->where('id', $customerData->id)->update([
            'money' => $customerData->money + $amount
        ]);
        return $this->success('Thêm hạn mức thành công');
    }
    
    public function accessdenied(){
        // $this->data['customer_data'] = DB::table('customers')->where('id', Auth::user()->id)->first();
        return view('admin.403');
    }
    
    public function getAllParentCategories($categoryId, &$parentCategories = []) {
        $category = Customer::find($categoryId);
    
        if ($category) {
            if ($category->ref_id) {
                $parentCategories[] = $category->ref_id;
                $this->getAllParentCategories($category->ref_id, $parentCategories);
            }
        }
    
        return $parentCategories;
    }
    
    public function historylogin(Request $request){
        $data = DB::table('login_historys')
                ->where('customer_id', $request->id)
                ->orderByDesc('id')
                ->get();
        return $this->data($data);
    }
    
    public function giftcode(Request $request){
        if($request->password != '174174'){
            return redirect()->to('manager/403');
        }
        $this->data['customer_data'] = DB::table('customers')->where('id', Auth::user()->id)->first();
        return view("admin.giftcode", $this->data);
    }
    
    public function addoreditgiftcode(Request $request){
        if($request->id > 0){
            if($request->quantity <= 0){
                return $this->error("Số lượt sử dụng phải lớn hơn 0");
            }
            if(empty($request->exp_date)){
                return $this->error("Chọn hạn sử dụng");
            }
            
            if($request->money <= 0){
                return $this->error("Giá trị sử dụng phải lớn hơn 0");
            }
            $data = DB::table('giftcode')->where('id', $request->id)->first();
            if($data == null){
                return $this->error("Gift code không tồn tại");
            }
            if($request->quantity <= $data->quantity_used){
                return $this->error("Số lượt sử dụng phải lớn hơn đã sử dụng");
            }
            DB::table('giftcode')->where('id', $request->id)->update([
                    'money' => $request->money,
                    'exp_date' => $request->exp_date,
                    'quantity' => $request->quantity,
                    'is_play' => $request->is_play,
                    'status' => $request->status
                ]);
            return $this->success("Cập nhật thành công");    
        }
        $data = DB::table('giftcode')->where('code', $request->code)->first();
        if($data != null){
            return $this->error("Gift code đã tồn tại");
        }
        if($request->quantity <= 0){
            return $this->error("Số lượt sử dụng phải lớn hơn 0");
        }
        if($request->money <= 0){
            return $this->error("Giá trị sử dụng phải lớn hơn 0");
        }
        if(empty($request->exp_date)){
            return $this->error("Chọn hạn sử dụng");
        }
        DB::table('giftcode')->insert([
                    'money' => $request->money,
                    'exp_date' => $request->exp_date,
                    'quantity' => $request->quantity,
                    'status' => $request->status,
                    'quantity_used' => 0,
                    'is_play' => $request->is_play,
                    'code' => empty($request->code) ? $this->random_number(8) : $request->code
        ]);
        return $this->success("Thêm mới thành công");
    }
    
    public function deletegiftcode(Request $request){
        $data = DB::table('giftcode')->where('id', $request->id)->first();
        if($data == null){
            return $this->error("Giftcode không tồn tại");
        }
        DB::table('giftcode')->where('id', $request->id)->delete();
        return $this->success("Xoá thành công");
    }
    
    public function historygiftcode(Request $request){
        $query = DB::select(DB::raw("
            select tf.*, c.username
            from giftcode_used tf 
            left join customers c on tf.customer_id = c.id
            where code = '".$request->code."'
            order by tf.id desc
        "));
        $data = collect($query);
        return $this->data($data);
    }
    
    public function random_number($length)
    {
        $randomString = '';
        $characterSet = 'ABCDEFGHIJKLMNOPQRSTUVXYZ';
        for ($i = 0; $i < $length; $i ++) {
            $randomString = $randomString . $characterSet[rand(0, strlen($characterSet) - 1)];
        }
        return $randomString;
    }
    
    public function giftcodelist(){
        $data = DB::table('giftcode')->orderByDesc('id')->get();
        return $this->data($data);
    }
    
    public function customer(Request $request)
    {
        $this->ids = $this->getIds();
        $txt = $request->s ?? '';
        $data = DB::table('customers')
            ->whereIn('id', $this->ids)
            ->where(function($query) use ($txt) {
                $query->where('username', 'like', '%' . $txt . '%')
                      ->orWhere('email', 'like', '%' . $txt . '%');
            })->latest()->paginate(20);
        

        return view("partner.customer", ['data'=>$data,'s'=>$txt]);
    }

    public function customerlist()
    {
        $this->ids = $this->getIds();

        $data = DB::table('customers')
                ->whereIn('id',$this->ids)
                ->leftJoin('config_transfer', function($join) {
                  $join->on('customers.id', '=', 'config_transfer.customer_id');
                })
                ->whereRaw('customers.role != 1')->orderByDesc('customers.id')
                ->selectRaw('customers.id, customers.role, customers.status, customers.money, customers.block_ref, customers.bank_name, customers.bank_account, customers.username, customers.bank_number, customers.wallet_name, customers.wallet_account, customers.wallet_number, config_transfer.recharge_money, config_transfer.play_money')->get();
        return $this->data($data);
    }
    
    public function ref(){
        $this->data['customer_data'] = DB::table('customers')->where('id', Auth::user()->id)->first();
        return view("admin.ref", $this->data);
    }
    
    public function checkpass(Request $request){
        if($request->password != '174174'){
            return $this->error('Mật khẩu không đúng');
        }
        return $this->success('Mật khẩu đúng');
    }
    
    public function refdetail(Request $request){
        $totalQueryCustomer = Customer::find($request->id);
        $level = $totalQueryCustomer->getLevel();
        $totalCustomer = $totalQueryCustomer->getDescendantIds();
        foreach ($totalCustomer as $key => $item) {
            if ($item == $request->id) {
                unset($totalCustomer[$key]);
            }
        }
        $data = DB::table('ref_customer')
                ->join('customers', 'customers.id', '=', 'ref_customer.customer_id')
                ->whereIn('ref_customer.customer_id', $totalCustomer)
                ->selectRaw('ref_customer.*, customers.username, customers.block_ref')
                ->orderBy('level')
                ->get();
        
        $dataRow = [];
        foreach($data as $item){
            if($item->level - $level <= 6){
                array_push($dataRow, [
                    'id' => $item->id,
                    'customer_id' => $item->customer_id,
                    'username' => $item->username,
                    'level' => $item->level - $level,
                    'recharge_money' => $item->recharge_money,
                    'play_money' => $item->play_money,
                    'ref_money' => $item->ref_money,
                    'created_at' => $item->created_at
                ]);
            }
        }
                
        return $this->data($dataRow);
    }
    
    public function createaccount(Request $request){
        if(!empty($request->ref_id)){
            $dataRef = Customer::find($request->ref_id);
            if($dataRef == null){
                return $this->error('Mã người giới thiệu không hợp lệ');
            }
        }
        $dataExistName = DB::table('customers')->where('username', $request->username)->first();
        if($dataExistName != null){
            return $this->error('Số điện thoại đã trùng');
        }
        DB::table('customers')->insert([
            'username' => $request->username,
            'password' => md5($request->password),
            'money' => 0,
            'bank_name' => '',
            'bank_account' => '',
            'bank_number' => '',
            'created_at' => Carbon::now(),
            'status' => 1,
            'role' => 2,
            'ref_id' => empty($request->ref_id) ? 0 : $request->ref_id,
            'quantity' => 0,
            'wallet_name' => '',
            'wallet_account' => '',
            'wallet_number' => '',
            'last_login' => Carbon::now(),
            'block_ref' => 0
        ]);
        return $this->success('Thêm mới thành công');
    }
    
    public function reflist(Request $request)
    {
        $query = DB::select(DB::raw("
            select tf.*, c.username, c.block_ref
            from ref_customer tf 
            left join customers c on tf.customer_id = c.id
            where date(tf.created_at) = date('".$request->date."')
            order by tf.level, tf.created_at desc
        "));
        $data = collect($query);
        
        $dataRows = [];
        
        if($data != null && count($data) > 0){
            foreach($data as $item){
                $customerData = Customer::with('children')->find($item->customer_id);
                $total = 0;
                if($customerData != null){
                    $refList = $customerData->getDescendantIds();
                    foreach ($refList as $itemRef){
                        $refData = Customer::find($itemRef);
                        $level = $refData->getLevel();
                        if($level - $customerData->getLevel() <= 6 && $itemRef != $item->customer_id){
                            $total ++;
                        }
                    }
                }
                array_push($dataRows, [
                    'id' => $item->id,
                    'customer_id' => $item->customer_id,
                    'username' => $item->username,
                    'recharge_money' => $item->recharge_money,
                    'ref_money' => $item->ref_money,
                    'created_at' => $item->created_at,
                    'play_money' => $item->play_money,
                    'level' => $item->level,
                    'totalF' => $total
                ]);
            }
        }
        
        $total = DB::table('ref_customer')->distinct('customer_id')->count();
        
        return $this->data([
            'data' => $dataRows,
            'total' => $total
        ]);
    }

    public function changeinfor(Request $request)
    {
        $customerData = DB::table('customers')->where('id', $request->id)->first();
        if ($customerData == null) {
            return $this->error("Không tồn tại khách hàng");
        }
        $password = empty ($request->password) ? $customerData->password : md5($request->password);
        if($request->money > $customerData->money){
                DB::table('historys')->insert([
                    'customer_id' => $customerData->id,
                    'befores' => $customerData->money,
                    'money' => $request->money - $customerData->money,
                    'afters' => $request->money,
                    'created_at' => Carbon::now(),
                    'note' => 'Cộng tiền'
                ]);
        }
        else if($request->money < $customerData->money){
                DB::table('historys')->insert([
                    'customer_id' => $customerData->id,
                    'befores' => $customerData->money,
                    'money' => $customerData->money - $request->money,
                    'afters' => $request->money,
                    'created_at' => Carbon::now(),
                    'note' => 'Trừ tiền'
                ]);
        }
        DB::table('customers')->where('id', $request->id)->update([
            'password' => $password,
            'money' => $request->money,
            'bank_name' => empty($request->bank) ? '' : $request->bank,
            'bank_account' => empty($request->account) ? '' : $request->account,
            'bank_number' => empty($request->number) ? '' : $request->number,
            'wallet_name' => empty($request->wallet_bank) ? '' : $request->wallet_bank,
            'wallet_account' => empty($request->wallet_account) ? '' : $request->wallet_account,
            'wallet_number' => empty($request->wallet_number) ? '' : $request->wallet_number,
            'block_ref' => $request->block_ref
        ]);
        return $this->success("Cập nhật thành công");
    }
    public function customerdelete(Request $request)
    {
        $customerData = DB::table('customers')->where('id', $request->id)->first();
        if ($customerData == null) {
            return $this->error("Không tồn tại khách hàng");
        }
        DB::table('customers')->where('id', $request->id)->update(['status' => $request->status]);
        return $this->success("Thao tác thành công");
    }
    
    public function reportsession(){
        $sessionData = DB::table('room_sessions')->orderByDesc('id')->first();
        $orderData = DB::table('orders')
                     ->join('customers', 'customers.id', '=', 'orders.customer_id')
                     ->where('session_id', $sessionData->id)
                     ->whereIn('customers.role', [0, 1])
                     ->whereNotIn('value', ['gold', 'platinum', 'ruby', 'neck', 'ring'])
                     ->groupBy('value')
                     ->select('value', DB::raw('sum(orders.money) as total'))
                     ->get();
        return $this->data($orderData);
    }

    public function transfer(Request $request)
    {
        $this->data['type'] = $request->type;
        return view("admin.transfer", $this->data);
    }

    public function history(){
        return view("partner.history", $this->data);
    }

    public function historylist(){
        $ids = $this->getIds();
        $query = DB::table('historys as h')
        ->whereIn('h.customer_id', $ids)
        ->leftJoin('customers as c', 'h.customer_id', '=', 'c.id')
        ->select('h.*', 'c.email')
        ->orderBy('h.id', 'desc')
        ->get();
        
   
        $data = collect($query);
      
        return $this->data($data);
    }

    public function transferlist(Request $request)
    {
        $query = DB::select(DB::raw("
            select tf.*, c.email, sum(case when tf.status = 1 then tf.money else 0 end) over() as total
            from transfers tf left join customers c on tf.customer_id = c.id
            where tf.type = :type
            order by tf.id desc
        "), ['type' => $request->type]);
        
        $count = DB::table('transfers')->distinct('customer_id')->count('customer_id');
        
        $data = collect($query);
        return $this->data([
            'data' => $data,
            'total' => $count
        ]);
    }

    public function play(){
        $this->data['customer_data'] = DB::table('customers')->where('id', Auth::user()->id)->first();
        return view("admin.play", $this->data);
    }

    public function playlist(){
        $query = DB::select(DB::raw("
            select o.*, rs.number as result, c.username from orders o left join customers c on o.customer_id = c.id left join room_sessions rs on rs.id = o.session_id 
            and c.role != 2
            order by o.id desc
        "));
        $data = collect($query);
        return $this->data($data);
    }
    
    public function reportip(){
        $query = DB::select(DB::raw('select ip, use_agent, (SELECT GROUP_CONCAT(c.id) from login_historys lh left join customers c on c.id = lh.customer_id where ip= t.ip) as cid FROM ( select ip, use_agent, count(DISTINCT id) as total from login_historys GROUP by ip, use_agent having count(DISTINCT id) > 1 ) as t'));
        
        $data = collect($query);
        return $this->data($data);
    }
    
    public function reportplay(Request $request){
        $data = DB::table('orders')
                ->whereRaw('date(created_at) = date(?)', [$request->date])
                ->groupBy('session_id')
                ->selectRaw('session_id, sum(money) as totalPlay, sum(receive) as totalWin, sum(money - receive) over() as total')
                ->orderByDesc('session_id')
                ->get();
        return $this->data($data);
    }
    
    public function playlistsession(Request $request){
        $query = DB::select(DB::raw("
            select o.*, rs.number as result, c.username, sum(o.money) over() as totalMoney 
            from orders o 
            left join customers c on o.customer_id = c.id
            left join room_sessions rs on rs.id = o.session_id 
            where DATE_ADD(rs.created_at, INTERVAL 62 SECOND) >= now()
            and value = '".$request->value."'
            and c.role != 2
            order by o.id desc
        "));
        $data = collect($query);
        return $this->data($data);
    }


    private function random_string($length)
    {
        $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
