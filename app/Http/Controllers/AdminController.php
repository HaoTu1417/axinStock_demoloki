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
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use DateTime;
use App\Mail\SendNotifyCus;

class AdminController extends BaseController
{
    public $data = [];
    private $translateService;
    public function __construct()
    {
        
    }
    public function index()
    {
        return view("");
    }
    
    public function setLocale(Request $request)
    {
        $lang = $request->lang;
        $language = config('app.locale');
        if ($lang == 'cn') {
            $language = 'cn';
        }
        if ($lang == 'vi') {
            $language = 'vi';
        }
        session(['language' => $language]);
        return $this->success('');
    }
    
    public function notireport(){
        $confirmRecharge = DB::table('transfers')->where('type', 1)->where('status', 0)->count();
        $confirmKYC = DB::table('customers')->where('kyc_status', 1)->count();
        $confirmWithdrawal = DB::table('transfers')->where('type', 2)->where('status', 0)->count();
        $confirmDebt = DB::table('customer_debt')->where('status', 0)->where('status', 0)->count();
        return $this->data([
            'kyc' => $confirmKYC != null ? $confirmKYC : 0,
            'recharge' => $confirmRecharge != null ? $confirmRecharge : 0,
            'withdrawal' => $confirmWithdrawal != null ? $confirmWithdrawal : 0,
            'debt' => $confirmDebt != null ? $confirmDebt : 0
        ]);
    }
    
    public function createNoti(Request $request){
        $title = $request->title;
        $note = $request->note;
        $type = $request->type;
        $customer = $request->customer;
        
        if($title == null || $note == null || $type == null){
            return  $this->error('Please fill all input');
        }
        $data = [
            'web' => DB::table('settings')->where('setting_key','domain')->first()->setting_value,
            'title' => $title,
            'note'  => $note,
        ];
        
        if($type == 1){
            $emailAddresses = DB::table('customers')->select('email')->distinct()->pluck('email');
            DB::table('notifications')->insert([
                'title' => $title,
                'description' => $note,
                'type' => $type,
                'status' => 1,
                'created_at' => now(),
                'send_to' => 0
            ]);
            foreach ($emailAddresses as $email) {
                Mail::to($email)->queue(new SendNotifyCus($data));
            }
        }else if($type == 2){
            $emailAddresses = DB::table('customers')->whereIn('id',$customer)->select('email')->distinct()->pluck('email');
            foreach($customer as $cus){
             DB::table('notifications')->insert([
                'title' => $title,
                'description' => $note,
                'type' => $type,
                'status' => 1,
                'created_at' => now(),
                'send_to' => $cus
            ]);
            }
            foreach ($emailAddresses as $email) {
                Mail::to($email)->queue(new SendNotifyCus($data));
            }
        }
        
        
        return $this->success('Create notify complete');
    }
    
     public function updateStockData(Request $request){
            $id = $request->id;
            $stockData = DB::table('stocks')->find($id);
            
            if($stockData->status_update == 0){
                return $this->error('Vui lòng cập nhật trạng thái can thiệp !');
            }
    
            if (!$stockData) {
                return $this->error('Not found stock');
            }
            
      
            $itemData =  Redis::get($request->input('exchange')."_".$request->input('stock'));
            $itemArray = json_decode($itemData, true);
            
            // Cập nhật các giá trị mới từ request
            $itemArray['c'] = $request->input('c');
            $itemArray['f'] = $request->input('f');
            $itemArray['r'] = $request->input('r');
            $itemArray['o'] = $request->input('o');
            $itemArray['ot'] = $request->input('ot');
            $itemArray['lot'] = $request->input('lot');
            $itemArray['avePrice'] = $request->input('avePrice');
            $itemArray['changePc'] = $request->input('changePc');
            $itemArray['highPrice'] = $request->input('highPrice');
            $itemArray['lowPrice'] = $request->input('lowPrice');
            $itemArray['lastPrice'] = $request->input('lastPrice');
            
            $updatedItemData = json_encode($itemArray);
            
            Redis::set($request->input('exchange')."_".$request->input('stock'), $updatedItemData);
            
            DB::table('stocks')->where('id',$id)->update([
                  'c' => $request->input('c'),
            'f' => $request->input('f'),
            'r' => $request->input('r'),
            'o' => $request->input('o'),
            'ot' => $request->input('ot'),
            'lot' => $request->input('lot'),
            'avePrice' => $request->input('avePrice'),
            'changePc' => $request->input('changePc'),
            'highPrice' => $request->input('highPrice'),
            'lowPrice' => $request->input('lowPrice'),
            'lastPrice' => $request->input('lastPrice'),
            ]);
            
            return $this->success('Cập nhật thành công');
        }
    
    
    public function stockStatusUpdate(Request $request){
        $id = $request->id;
        $status = $request->status;
        DB::table('stocks')->where('id',$id)->update(['status_update' => $status]);
        return $this->success('Cập nhật thành công');
    }
    
     public function stockStatus(Request $request){
        $id = $request->id;
        $status = $request->status;
        DB::table('stocks')->where('id',$id)->update(['status' => $status]);
        return $this->success('Cập nhật thành công');
    }
    
    public function role(Request $request){
        // dd(DB::table('settings')->pluck('setting_display','setting_key'));
        $this->data['data'] = DB::table('role')->paginate();
        return view("admin.role",$this->data);
    }
    
    public function addrole(Request $request){
                return view("admin.addrole",$this->data);

    }
    
    public function day_off(){
        return view("admin.dayoff",$this->data);
    }
    
    public function dayofflist(){
        $data = DB::table('day_off')->get();
        return $this->data($data);
    }
    
    public function dayoffpost(Request $request){
        if(empty($request->day) || empty($request->name)){
            return $this->error('Vui lòng nhập đầy đủ thông tin');
        }
         $from_hour = $request->input('from_hour');
        $to_hour = $request->input('to_hour');
    
        // Convert times to DateTime objects
        $from_time = DateTime::createFromFormat('H:i:s', $from_hour);
        $to_time = DateTime::createFromFormat('H:i:s', $to_hour);
    
        // Check if from_hour is greater than or equal to to_hour
        if ($from_time >= $to_time) {
            return $this->error('Thời gian mở cửa phải trước thời gian đóng cửa');
        }
         
        if($request->id > 0){
            DB::table('day_off')->where('id', $request->id)->update([
                'name' => $request->name,
                'day' => $request->day,
                'is_holiday' => $request->is_holiday,
                'from_hour' => $request->from_hour,
                'to_hour' => $request->to_hour
            ]);
            return $this->success('Cập nhật thành công');
        }
        DB::table('day_off')->insert([
            'name' => $request->name,
            'day' => $request->day,
            'is_holiday' => $request->is_holiday,
            'from_hour' => $request->from_hour,
            'to_hour' => $request->to_hour
        ]);
        return $this->success('Thêm mới thành công');
    }
    
    public function detaildebt(Request $request){
        $item = DB::table('customer_debt')->where('id', $request->id)->first();
        $data = [
                'id' => $item->id,
                'type' => $item->type,
                'deposit' => $item->deposit,
                'money' => $item->money,
                'percent' => $item->percent,
                'created_at' => $item->created_at,
                'next_at' => $item->next_at,
                'exp_day' => $item->exp_day,
                'is_auto' => $item->is_auto,
                'status' => $item->status,
                'note' => $item->note,
                'exp_at' => Carbon::parse($item->next_at)->addDays($item->exp_day)
            ];
        return $this->data($data);
    }
    
    public function deleteDayoff(Request $request){
        $id = $request->id;
        if($id){
            DB::table('day_off')->where('id',$request->id)->delete();
            return $this->success('Xóa thành công');
        }
        
        return $this->error('Đã có lỗi xảy ra, vui lòng thử lại');

    }
    
    public function sellStockCustomer(Request $request){
        if (!is_numeric($request->amount)) {
            return $this->error('Số tiền không hợp lệ');
        }

        $amount = intval($request->amount);
        if ($amount <= 0) {
            return $this->error('Số tiền không hợp lệ');
        }
        
        if (!is_numeric($request->quantity)) {
            return $this->error('Số lượng không hợp lệ');
        }

        $quantity = intval($request->quantity);
        if ($quantity <= 0) {
            return $this->error('Số lượng không hợp lệ');
        }
        
        $stockData = DB::table('stocks')->where('stock', $request->stock)->first();
        
        if($stockData == null){
            return $this->error('Mã chứng khoán không hợp lệ');
        }
        
        $redisData = Redis::get($stockData->exchange .'_'.$stockData->stock);
        
        if($redisData == null){
            return $this->error('Mã chứng khoán không hợp lệ');
        }
        
        $stockRedis = json_decode($redisData);
        
        $customerData = Customer::find($request->id);
        
        $totalAvaiable = DB::table('stock_tplus')
                        ->where('customer_id', $customerData->id)
                        ->where('stock', $stockData->stock)
                        ->where('status', 1)
                        ->whereRaw('((type = 1 and t >= 3) or type = 2)')
                        ->selectRaw('ifnull(sum(quantity),0) as quantity')
                        ->first();
        
        if($totalAvaiable ==  null){
            return $this->error('Số lượng cổ phiếu có sẵn không đủ');
        }
        
        if($totalAvaiable->quantity < $quantity){
            return $this->error('Số lượng cổ phiếu có sẵn không đủ');
        }
        
        $checkDebt = DB::table('customer_debt')
                    ->where('customer_id', $request->id)
                    ->where('status', 1)
                    ->where('type', 5)
                    ->first();
        $totalSub = 0;
        if($checkDebt != null){
            $totalCal = DB::table('stock_tplus')
                        ->where('customer_id', $customerData->id)
                        ->where('stock', $stockData->stock)
                        ->where('status', 1)
                        ->where('type', 1)
                        ->get();
            $totalPrice = 0;
            $totalQuan = 0;
            if($totalCal != null && count($totalCal) > 0){
                foreach ($totalCal as $item){
                    $totalPrice += $item->price;
                    $totalQuan += $item->quantity;
                }
                $totalPriceTB = round($totalPrice / $totalQuan);
                if($amount <= $stockRedis->lastPrice * 1000 && $totalPriceTB < $amount){
                    $totalSub = ($amount - $totalPriceTB) * $quantity;
                }
            }
        }
        
        $fee = floatval(DB::table('settings')->where('setting_key', 'fee')->first()->setting_value);
        
        $totalAmount = $amount * $quantity;
        
        $totalFee = ($totalAmount * $fee) / 100;
        if($checkDebt == null){
            $totalFeeF0 = Auth::user()->fee;
            
            if($totalFeeF0 > 0 && $customerData->role == 0){
                $customerF0 = Customer::find($customerData->getRoot()->id);
                $feeMoney = $totalAmount * $totalFeeF0 / 100;
                $totalFee += $feeMoney;
                $beforeAmountF0 = $customerF0->money;
                $afterAmountF0 = $customerF0->money + $feeMoney;
                DB::table('historys')->insert([
                    'customer_id' => $customerF0->id,
                    'befores' => $beforeAmountF0,
                    'money' => $feeMoney,
                    'afters' => $afterAmountF0,
                    'created_at' => Carbon::now(),
                    'note' => 'Nhận phí giao dịch từ cấp dưới',
                    'note_trans' => '从下级收取交易费'
                ]);
                DB::table('customers')->where('id', $customerF0->id)->update([
                    'money' => $afterAmountF0
                ]);
            }
        }
        
        $id = DB::table('orders')->insertGetId([
            'customer_id' => $customerData->id,
            'type' => 2,
            'stock' => $stockData->stock,
            'created_at' => Carbon::now(),
            'quantity' => $quantity,
            'prices' => $amount,
            'fee' => $totalFee,
            'status' => $amount <= $stockRedis->lastPrice * 1000 ? 1 : 0,
            'match_at' => Carbon::now()
        ]);
        
        
        
        DB::table('stock_tplus')->insert([
            'order_id' => $id,
            'customer_id' => $customerData->id,
            'price' => $amount,
            'type' => 2,
            'stock' => $stockData->stock,
            'created_at' => Carbon::now(),
            'calculate_at' => Carbon::now(),
            'quantity' => 0 - $quantity,
            't' => 1,
            'status' => $amount <= $stockRedis->lastPrice * 1000 ? 1 : 0
        ]);
        
        if($amount <= $stockRedis->lastPrice * 1000){
            $customerParentId = $customerData->getRoot()->id;
            $refData = DB::table('ref_customer')->where('customer_id', $customerParentId)->whereRaw('MONTH(created_at) = MONTH(now())')->first();
            if($refData != null){
                DB::table('ref_customer')->where('id', $refData->id)->update([
                    'total_money' => $refData->total_money + $totalFee + $totalSub
                ]);
            }
            else{
                DB::table('ref_customer')->insert([
                    'customer_id' => $customerParentId,
                    'total_money' => $totalFee + $totalSub,
                    'created_at' => Carbon::now()
                ]);
            }
            $beforeAmount = $customerData->money;
            $afterAmount = $customerData->money + ($totalAmount - $totalFee);
            DB::table('historys')->insert([
                'customer_id' => $customerData->id,
                'befores' => $beforeAmount,
                'money' => $totalAmount - $totalFee,
                'afters' => $afterAmount,
                'created_at' => Carbon::now(),
                'note' => 'Đặt bán ' . number_format($quantity) . ' CP ' . $stockData->stock,
                'note_trans' => '卖出 ' . number_format($quantity) . ' 股 ' . $stockData->stock
            ]);
            if($totalSub > 0){
                DB::table('historys')->insert([
                    'customer_id' => $customerData->id,
                    'befores' => $afterAmount,
                    'money' => $totalSub,
                    'afters' => $afterAmount - ($totalSub * 0.2),
                    'created_at' => Carbon::now(),
                    'note' => 'Trích lãi cho khoản vay miễn lãi',
                    'note_trans' => '从免息贷款中提取利息'
                ]);
                $afterAmount -= $totalSub * 0.2;
            }
            DB::table('customers')->where('id', $customerData->id)->update([
                'money' => $afterAmount
            ]);
        }

        return $this->success('Đặt lệnh thành công');
    
    }
    
    public function adddebt(Request $request){
        $cusDebt = DB::table('customer_debt')->where('id', $request->id)->first();
        if($cusDebt == null){
            return $this->error('Hợp đồng không tồn tại');
        }
        if($request->amount <= 0){
            return $this->error('Số tiền cọc thêm không hợp lệ');
        }
        $customerData = Customer::find($cusDebt->customer_id);
        $margin = $cusDebt->money / $cusDebt->deposit;
        $totalDebt = $request->amount * $margin;
        DB::table('customer_debt')->where('id', $request->id)->update([
            'deposit' => $cusDebt->deposit + $request->amount,
            'money' => $cusDebt->money + $totalDebt
        ]);
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money + $totalDebt;
        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'befores' => $beforeAmount,
            'money' => $totalDebt,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Thêm tiền cọc khoản vay',
            'note_trans' => '增加贷款押金'
        ]);
        DB::table('customers')->where('id', $customerData->id)->update([
            'money' => $afterAmount
        ]);
        return $this->success('Thêm tiền cọc khoản vay thành công');
    }
    
    public function paydebt(Request $request){
        $dataDebt = DB::table('customer_debt')
                    ->where('id', $request->id)
                    ->where('status', 1)
                    ->first();
        if($dataDebt == null){
            return $this->error('Khoản nợ không tồn tại hoặc đã được thanh toán');
        }
        $customerData = DB::table('customers')->where('id', $dataDebt->customer_id)->first();
        if($customerData == null){
            return $this->error('Vui lòng đăng nhập để sử dụng dịch vụ');
        }
        if($customerData->money < $dataDebt->money - $dataDebt->deposit){
            return $this->error('Số dư không đủ để thanh toán');
        }
        $totalReturn = $dataDebt->money - $dataDebt->deposit;
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money - $totalReturn;
        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'created_at' => Carbon::now(),
            'befores' => $beforeAmount,
            'money' => $totalReturn,
            'afters' => $afterAmount,
            'note' => 'Thanh toán gói vay',
            'note_trans' => '支付贷款套餐'

        ]);
        DB::table('customers')->where('id', $customerData->id)->update(['money' => $afterAmount]);
        DB::table('customer_debt')->where('id', $dataDebt->id)->update(['status' => 3]);
            
        $content = '';
        $content .= '<p>Kính chào quý khách</p>';
        $content .= '<p>Khoản vay của quý khách đã được tất toán, nếu có thắc mắc vui lòng liên hệ admin để xử lý.</p>';
        $content .= '<p>Xin chân thành cảm ơn.</p>';
        try {
            Mail::to($customerData->email)->send(new SendMail('Thông báo tất toán khoản vay', $content));
        } catch (Exception $e) {
        }
        return $this->success('Thanh toán thành công');
    }
    
    public function logincustomer(Request $request){
        $data = User::where('id', $request->id)->first();
        if($data == null){
            return $this->error('Tài khoản không tồn tại');
        }
        Auth::login($data);
        return $this->success('Thành công');
    }
    
    public function getUserLoanInfo(Request $request){
        $customerId = $request->id;
        $data = DB::table('customer_debt as h')
            ->leftJoin('customers as c', 'h.customer_id', '=', 'c.id')
            ->where('h.customer_id', $customerId)
            ->whereIn('h.status',[0,1])
            ->select('h.*', 'c.email')
            ->orderBy('h.id', 'desc')
            ->get();
        $dataArr = [];
        foreach ($data as $item){
             if ($item->type == 1) {
                $type = '<span class="badge bg-primary">Hợp đồng hàng ngày</span>';
            } else if ($item->type == 2) {
                $type = '<span class="badge bg-success">Hợp đồng miễn phí</span>';
            } else if ($item->type == 3) {
                $type = '<span class="badge" style="background:#b47dfc">Hợp đồng hàng tuần</span>';
            } else if ($item->type == 4) {
                $type = '<span class="badge bg-warning">Hợp đồng hàng tháng</span>';
            } else if ($item->type == 5) {
                $type = '<span class="badge" style="background:#ff5629">Hợp đồng miễn lãi</span>';
            } else {
                $type = '<span class="badge" style="background:#646e8f">Hợp đồng vip</span>';
            }
            array_push($dataArr, [
                'id' => $item->id,
                'email' => $item->email,
                'type' => $item->type,
                'deposit' => $item->deposit,
                'money' => $item->money,
                'percent' => $item->percent,
                'created_at' => $item->created_at,
                'next_at' => $item->next_at,
                'exp_day' => $item->exp_day,
                'is_auto' => $item->is_auto,
                'status' => $item->status,
                'note' => $item->note,
                'exp_at' => Carbon::parse($item->next_at)->addDays($item->exp_day),
                'type_html' =>  $type,
           
            ]);
        }
        
        $html = view('admin.include.modal_loan',['data'=>$dataArr])->render();
        
        return $html;
    }
    
    public function getUserHistoryInfo(Request $request){
        $customerId = $request->id;
        $history = DB::table('historys')->where('customer_id',$customerId)->latest()->get();

        $html = view('admin.include.modal_history',['data'=> $history])->render();

        return $html;

    }
    
    public function addFeeCustomer(Request $request){
         $customerId = $request->id;
         $note1 = $request->note;
         $status = $request->status;
         $money = $request->money;
         $type = $request->type;
        if ($type == 1) {
            $customer = DB::table('customers')->where('id', $customerId)->latest()->first();
        
            $note = '';
            $note_trans = ''; // Khởi tạo biến note_trans
        
            if ($status == 1) {
                $feeAfter = $customer->money + $money;
                $note = "Cộng số dư ";
                $note_trans = '增加管理费，金额为: ' . number_format($money, 2, '.', ','); // "增加管理费，金额为"
            } else {
                $feeAfter = $customer->money - $money;
                $note = "Trừ số dư ";
                $note_trans = '减少管理费，金额为: ' . number_format($money, 2, '.', ','); // "减少管理费，金额为"
            }
        
            // Định dạng tiền tệ cho note
            $formattedMoney = number_format($money, 0, '.', ',');
        
            // Tạo giá trị cho note
            $note .= 'với giá trị: ' . $formattedMoney;
        
            // Chèn vào cơ sở dữ liệu
            DB::table('historys')->insert([
                'customer_id' => $customer->id,
                'created_at' => Carbon::now(),
                'befores' => $customer->money,
                'money' => ($status == 1) ? $money : -$money, // Lưu số tiền đã cộng hoặc trừ
                'afters' => $feeAfter, // Cập nhật số dư sau khi thay đổi
                'note' => $note . " | " . $note1,
                'note_trans' => $note_trans
            ]);
            
            // Cập nhật số dư trong bảng customers
            DB::table('customers')->where('id', $customerId)->update(['money' => $feeAfter]);
        
            return $this->success('Update success');
        }
        
        $customer = DB::table('customers')->where('id', $customerId)->latest()->first();

        $feeAfter = 0;
        $note = '';
        $note_trans = ''; // Khởi tạo biến note_trans
        
        if ($status == 1) {
            $feeAfter = $customer->fee_manager + $money;
            $note = "Cộng ";
            $note_trans = '增加管理费，金额为: ' . number_format($money, 2, '.', ','); // "Tăng phí quản lý, số tiền là"
        } else {
            $feeAfter = $customer->fee_manager - $money;
            $note = "Trừ ";
            $note_trans = '减少管理费，金额为: ' . number_format($money, 2, '.', ','); // "Giảm phí quản lý, số tiền là"
        }
        
        // Định dạng tiền tệ cho note
        $formattedMoney = number_format($money, 0, '.', ',');
        
        // Tạo giá trị cho note
        $note .= 'phí quản lý với giá trị: ' . $formattedMoney;
        
        // Tạo giá trị cho note_trans
        $note_trans .= ' | ' . $note1; // Kết hợp thêm thông tin nếu có
        
        // Chèn vào cơ sở dữ liệu
        DB::table('historys')->insert([
            'customer_id' => $customer->id,
            'created_at' => Carbon::now(),
            'befores' => $customer->fee_manager,
            'money' => $money,
            'afters' => $feeAfter, // Cập nhật phí quản lý sau khi thay đổi
            'note' => $note . " | " . $note1,
            'note_trans' => $note_trans,
            'type' => 1,
        ]);
         DB::table('customers')->where('id',$customerId)->update(['fee_manager'=>$feeAfter]);
         
         
         return $this->success('Update success');
    }
    
    
     public function getManagerFee2(Request $request){
        $customerId = $request->id;
        $history = DB::table('customers')->where('id',$customerId)->latest()->first();
        $html = view('admin.include.customer_add_fee',['data'=> $history,'type'=>0])->render();

        return $html;

    }
    
      public function getManagerFee22(Request $request){
        $customerId = $request->id;
        $history = DB::table('customers')->where('id',$customerId)->latest()->first();
        $html = view('admin.include.customer_add_fee',['data'=> $history,'type'=>1])->render();

        return $html;

    }
    
    public function getUserCpInfo(Request $request){
        $query = DB::table('stock_tplus')->where('customer_id', $request->id)->get();
        $dataStock = collect($query);
        $groupCP = $dataStock->groupBy('stock')->map(function($group){
            return $group->sum('quantity');
        })->all();
        $listReport = [];
        if($groupCP != null && count($groupCP) > 0){
            foreach ($groupCP as $key => $item){
                $stockData = DB::table('stocks')->where('stock', $key)->first();
                $stockRedis = json_decode(Redis::get($stockData->exchange.'_'.$key));
                $tt = $dataStock->where('stock', $key)->where('type', 1)->map(function($group){
                    return is_null($group) ? 0 : $group->quantity * $group->price;
                })->sum();
                $tq = $dataStock->where('stock', $key)->where('type', 1)->map(function($group){
                    return is_null($group) ? 0 : $group->quantity;
                })->sum();
                $pTb = intval($tt / $tq);
                $t0 = $dataStock->where('stock', $key)->where('type', 1)->where('t', 0)->map(function($group){
                    return is_null($group) ? 0 : $group->quantity;
                })->sum();
                $t1 = $dataStock->where('stock', $key)->where('type', 1)->where('t', 1)->map(function($group){
                    return is_null($group) ? 0 : $group->quantity;
                })->sum();
                $t2 = $dataStock->where('stock', $key)->where('type', 1)->where('t', 2)->map(function($group){
                   return is_null($group) ? 0 : $group->quantity;
                })->sum();
                $a = $item - $t0 - $t1 - $t2;
                $o = 0;
                $i = 0;
                if($stockRedis->lastPrice > $pTb){
                    $o = round(((($stockRedis->lastPrice * 1000) - $pTb) / $pTb) * 100, 2);
                    $i = (($stockRedis->lastPrice * 1000) - $pTb) * $a;
                }
                else{
                    $o = - round((($pTb - ($stockRedis->lastPrice * 1000)) / $pTb) * 100, 2);
                    $i = - ($pTb - ($stockRedis->lastPrice * 1000)) * $a;
                }
                array_push($listReport, array(
                    'sym' => $key,
                    't0' => $t0,
                    't1' => $t1,
                    't2' => $t2,
                    'a' => $a,
                    't' => $item,
                    'ptb' => $pTb,
                    'ptt' => $stockRedis->lastPrice,
                    'i' => $i,
                    'o' => $o
                ));
            }
        }
        // dd($listReport);
        $this->data['listStock'] = $listReport;
        $this->data['page'] = 'agency';
        $this->data['customer_id'] = $request->id;
        $html = view('admin.include.modal_cp_customer',$this->data)->render();
        
        return $html;
        
    }
    
    public function addrolepost(Request $request){
        $data = ($request->all());
        $name = $request->name;
        
        
        $arrRoleDefault = [
            'statistic' =>[
                'read' => 0
            ],
            'customer' => [
                'read' => 0,
                'add' => 0,
                'update' => 0,
                'delete' => 0,
                'login' =>0,
                'loan' => 0,
                'cp' =>0,
            ],
            'transfer' => [
                'read' => 0,
                'update' => 0,
            ],
            'order' => [
                'read' => 0,
            ],
            'report' => [
                'read' => 0,
                'update' => 0,
            ],
            'loan' => [
                'read' => 0,
                'update' => 0,
            ],
            'interest' => [
                'read'=> 0, 
                'update' => 0,
            ],
            'wallet' => [
               'read'=> 0, 
            ]
        ];
        
        foreach($data as $key => $item){
            if($key != '_token' && $key != 'name'){
               if (strpos($key, '_') !== false) { 
                    list($k, $r) = explode('_', $key);
                    if($item == 'on'){
                        $arrRoleDefault[$k][$r] = 1;
                    }
                }
            }
        };
        
        $check = DB::table('role')->where('name',$request->name)->get();
        if($check->count() > 0){
            return redirect()->back()->with('error', 'Tên quyền đã tồn tại');
        }
        
        DB::table('role')->insert([
            'name' => $name,
            'config' => json_encode($arrRoleDefault)
        ]);
        
        return redirect()->to('/manager/role')->with('success', 'Thêm quyền thành công');

    

    }
    
    
     public function updaterolepost(Request $request){
        $data = ($request->all());
        $name = $request->name;
        
        
       $arrRoleDefault = [
            'statistic' =>[
                'read' => 0
            ],
            'customer' => [
                'read' => 0,
                'add' => 0,
                'update' => 0,
                'delete' => 0,
                'login' =>0,
                'loan' => 0,
                'cp' =>0,
            ],
            'transfer' => [
                'read' => 0,
                'update' => 0,
            ],
            'order' => [
                'read' => 0,
            ],
            'report' => [
                'read' => 0,
                'update' => 0,
            ],
            'loan' => [
                'read' => 0,
                'update' => 0,
            ],
            'interest' => [
                'read'=> 0, 
                'update' => 0,
            ],
            'wallet' => [
               'read'=> 0, 
            ]
        ];
        
        foreach($data as $key => $item){
            if($key != '_token' && $key != 'name'){
               if (strpos($key, '_') !== false) { 
                    list($k, $r) = explode('_', $key);
                    if($item == 'on'){
                        $arrRoleDefault[$k][$r] = 1;
                    }
                }
            }
        };
        
        $check = DB::table('role')->where('name',$request->name)->where('id','!=',$request->id)->get();
        if($check->count() > 0){
            return redirect()->back()->with('error', 'Tên quyền đã tồn tại');
        }
        
        DB::table('role')->where('id',$request->id)->update([
            'name' => $name,
            'config' => json_encode($arrRoleDefault)
        ]);
        
        return redirect()->to('/manager/role')->with('success', 'Cập nhật quyền thành công');

    

    }
    
    
    public function addPostemployer(Request $request){
        
        $username= $request->username;
        $password = $request->password;
        $repasswod = $request->repassword;
        $role = $request->role;
        
        $check = DB::table('admins')->where('username',$username )->get();
        if($check->count() > 0){
            return redirect()->back()->with('error', 'Tên tài khoản đã tồn tại');

        }
        if($password != $repasswod){
           return redirect()->back()->with('error', 'Mật khẩu nhập lại không đun');
        }
        
        DB::table('admins')->insert([
            'username' => $username,
            'password' => Hash::make($request->password),
            'role_group' => $role,
            'created_at' => now(),
        ]);
        
        return redirect()->to('/manager/employer')->with('success', 'Thêm nhân viên thành công');

    }
    
    public function employer(){
        $data =  DB::table('admins')->where('id','!=',1)->paginate(20);
        $this->data['data'] = DB::table('admins')->where('id','!=',1)->paginate(20);
        $this->data['roles'] = DB::table('role')->pluck('name','id');
        return view('admin.employer',$this->data);
    }
    
    
    public function addemployer(){
        
        $role = DB::table('role')->get();
        $this->data['role'] = $role;
        return view('admin.addemployer',$this->data);

    }
    
    
    public function updaterole(Request $request){
        $data = DB::table('role')->where('id',$request->id)->first();
        if($data == null){
           return redirect()->back()->with('error', 'Quyền không tồn tại');
        }
        
        $data->config = json_decode($data->config,true);
        $this->data['data'] = $data;
        

        return view('admin.updaterole',$this->data);
    
        
    }
    
    public function updateemployer(Request $request){
        $id = $request->id;
        $employ = DB::table('admins')->where('id',$request->id)->get();
        if($id == 1){
            return redirect()->back()->with('error', 'Không đủ quyền');
        };
        if($employ->count() == 0){
            return redirect()->back()->with('error', 'Nhân viên không tồn tại');

        }
        
        
        $arr = [
            "role_group" => $request->role,
        ];
        if($request->password != null){
            if($request->password != $request->repassword)
            $arr['password'] = Hash::make($request->password);
        }
        
        DB::table('admins')->where('id',$request->id)->update($arr);
        
        return redirect()->to('/manager/employer')->with('success', 'Cập nhật nhân viên thành công');

    }
    
    public function editemployer(Request $request){
        $id = $request->id;
        if($id == 1){
            return redirect()->back()->with('error', 'Không đủ quyền');
        };
        $employer = DB::table('admins')->where('id',$id)->first();
        if($employer == null){
            return redirect()->back()->with('error', 'Không tìm thấy');
        };
        $this->data['data'] = $employer;
        $role = DB::table('role')->get();
        $this->data['role'] = $role;
        
        
        return view('admin.editemployer',$this->data);
    }
    
    public function statistic(Request $request){
        $this->data['kyc_new'] = DB::table("customers")->where('kyc_status',1)->get()->count();
        $this->data['customer'] = DB::table('customers')->get()->count();
        $this->data['online'] = 0;
        $this->data['ref'] = DB::table('customers')->where('role',1)->get()->count();
        $this->data['fee'] = DB::table('settings')->where('setting_key','fee')->first()->setting_value;
        $this->data['pay'] = DB::table('transfers')->where('type','1')->where('status',0)->get()->count();
        $this->data['withdraw'] = DB::table('transfers')->where('type','2')->where('status',0)->get()->count();
        $this->data['loan'] = DB::table('customer_debt')->where('status',0)->get()->count();
        $this->data['report'] = DB::table('reports')->where('status',0)->get()->count();
        $this->data['wallet'] = DB::table('wallet_profit')->get()->count();

        // Lấy ngày hiện tại và ngày hôm qua
        $currentDate = Carbon::today()->toDateString();
        $yesterdayDate = Carbon::yesterday()->toDateString();
        
        // Tính tổng số tiền nạp trong ngày hôm nay
        $totalPayDay = DB::table('transfers')
            ->where('type', 1)
            ->where('status', 1)
            ->whereDate('created_at', $currentDate)
            ->sum('money');
        $this->data['totalPayDay'] = $totalPayDay;
        
        // Tính tổng số tiền rút trong ngày hôm nay
        $totalWithdrawDay = DB::table('transfers')
            ->where('type', 2)
            ->where('status', 1)
            ->whereDate('created_at', $currentDate)
            ->sum('money');
        $this->data['totalWithdrawDay'] = $totalWithdrawDay;
        
        // Tính tổng số tiền nạp trong ngày hôm qua
        $totalPayYesterday = DB::table('transfers')
            ->where('type', 1)
            ->where('status', 1)
            ->whereDate('created_at', $yesterdayDate)
            ->sum('money');
        
        // Tính tổng số tiền rút trong ngày hôm qua
        $totalWithdrawYesterday = DB::table('transfers')
            ->where('type', 2)
            ->where('status', 1)
            ->whereDate('created_at', $yesterdayDate)
            ->sum('money');
        
        // Tính tỉ lệ tăng trưởng
        $payGrowthRate = $totalPayYesterday > 0 ? round(((($totalPayDay - $totalPayYesterday) / $totalPayYesterday)* 100),2) : 100;
        $withdrawGrowthRate = $totalWithdrawYesterday > 0 ? round(((($totalWithdrawDay - $totalWithdrawYesterday) / $totalWithdrawYesterday)* 100),2) : 100;
        
        // Gán tỉ lệ tăng trưởng vào mảng dữ liệu
        $this->data['payGrowthRate'] = $payGrowthRate;
        $this->data['withdrawGrowthRate'] = $withdrawGrowthRate;
        
        // Mảng chứa dữ liệu số liệu nạp và rút của 7 ngày gần nhất
        $labels = [];
        $labelsUser = [];
        $datauser = [];
        $withdrawData = [];
        $payData = [];
        
        for ($i = 0; $i < 7; $i++) {
            // Lấy ngày hiện tại
            $date = Carbon::today()->subDays($i)->toDateString();
        
            // Tính tổng số tiền nạp trong ngày
            $totalPayDay = DB::table('transfers')
                ->where('type', 1)
                ->where('status', 1)
                ->whereDate('created_at', $date)
                ->sum('money');
        
            // Tính tổng số tiền rút trong ngày
            $totalWithdrawDay = DB::table('transfers')
                ->where('type', 2)
                ->where('status', 1)
                ->whereDate('created_at', $date)
                ->sum('money');
        
            // Thêm dữ liệu vào mảng
            $labels[] = $date;
            $withdrawData[] = (int)$totalWithdrawDay;
            $payData[] = (int)$totalPayDay;
        }
        
        // Đảo ngược mảng để có thứ tự từ cũ đến mới
        $labels = array_reverse($labels);
        $withdrawData = array_reverse($withdrawData);
        $payData = array_reverse($payData);
        
        $this->data['labelLine'] = $labels;
        $this->data['withdrawData'] = $withdrawData;
        $this->data['payData'] = $payData;

        
        for ($i = 0; $i < 30; $i++) {
            // Lấy ngày hiện tại
            $date = Carbon::today()->subDays($i)->toDateString();
        
            // Tính tổng số tiền nạp trong ngày
            $totalCustomer = DB::table('customers')
                ->whereDate('created_at', $date)
                ->count();
        

            $labelsUser[] = $date;
            $datauser[] = (int)$totalCustomer;
        }
        
        
        $this->data['customerBar'] = array_reverse($datauser);
        $this->data['LabelBar'] = array_reverse($labelsUser);

        $reportHD = DB::table('customer_debt')->whereRaw('date(next_at) <= date(now()) and date_add(next_at, interval exp_day day) >= date(now()) and type !=2 and type != 5 and status = 1')->get();
        $totalHD = 0;
        if($reportHD != null){
            foreach ($reportHD as $item){
                $totalHD += ($item->money * $item->percent) / ($item->exp_day * 100);
            }
        }
        
        $totalMoney = DB::table('customers')->selectRaw('sum(money) as money')->first();
        
        $totalDebt = DB::table('customer_debt')->where('status', 1)->whereRaw('type != 2')->selectRaw('sum(money - deposit) as debt')->first();
        
        $this->data['totalDebt'] = ($totalMoney != null ? $totalMoney->money : 0) - ($totalDebt != null ? $totalDebt->debt : 0);
        
        $this->data['totalHD'] = $totalHD;

        return view("admin.statistic",$this->data);
    }
    
    public function debtreport(Request $request){
        if($request->type == 0){
            $orders = DB::table('customer_debt')
                    ->whereRaw('date(next_at) <= date(now()) and date(DATE_ADD(next_at, INTERVAL exp_day day)) >= date(now()) and type !=2 and type != 5 and status = 1')
                    ->select(DB::raw('type, SUM((money * percent) / 100) as total'))
                    ->groupBy('type')
                    ->get();
        }
        else if($request->type == 1){
            $orders = DB::table('customer_debt')
                    ->whereRaw('month(next_at) <= month(now()) and month(date_add(next_at, INTERVAL exp_day day)) >= month(now()) and type !=2 and type != 5 and status = 1')
                    ->select(DB::raw('type, SUM((money * percent) / 100) as total'))
                    ->groupBy('type')
                    ->get();
        }
        else{
            $orders = DB::table('customer_debt')
                    ->whereRaw('month(next_at) <= month(now()) and month(date_add(next_at, INTERVAL exp_day day)) >= month(now()) and type !=2 and type != 5 and status = 1')
                    ->select(DB::raw('type, SUM((money * percent) / 100) as total'))
                    ->groupBy('type')
                    ->get();
        }
        $t1 = 0;
        $t2 = 0;
        $t3 = 0;
        $t4 = 0;
        if($orders != null && count($orders) > 0){
            $rs1 = collect($orders)->where('type', 1)->first();
            $t1 = $rs1 != null ? number_format(round($rs1->total, 0)) : 0;
            $rs2 = collect($orders)->where('type', 3)->first();
            $t2 = $rs2 != null ? number_format(round($rs2->total, 0)) : 0;
            $rs3 = collect($orders)->where('type', 4)->first();
            $t3 = $rs3 != null ? number_format(round($rs3->total, 0)) : 0;
            $rs4 = collect($orders)->where('type', 6)->first();
            $t4 = $rs4 != null ? number_format(round($rs4->total, 0)) : 0;
        }
        return $this->data([
            't1' => $t1,
            't2' => $t2,
            't3' => $t3,
            't4' => $t4
        ]);
    }
    
    public function debtreportcus(Request $request){
        if($request->type == 0){
            $orders = DB::table('customer_debt')
                    ->whereRaw('date(next_at) <= date(now()) and date(DATE_ADD(next_at, INTERVAL exp_day day)) >= date(now()) and type !=2 and type != 5 and status = 1 and customer_id = '.$request->customer_id)
                    ->select(DB::raw('type, SUM((money * percent) / 100) as total'))
                    ->groupBy('type')
                    ->get();
        }
        else if($request->type == 1){
            $orders = DB::table('customer_debt')
                    ->whereRaw('month(next_at) <= month(now()) and month(date_add(next_at, INTERVAL exp_day day)) >= month(now()) and type !=2 and type != 5 and status = 1 and customer_id = '.$request->customer_id)
                    ->select(DB::raw('type, SUM((money * percent) / 100) as total'))
                    ->groupBy('type')
                    ->get();
        }
        else{
            $orders = DB::table('customer_debt')
                    ->whereRaw('month(next_at) <= month(now()) and month(date_add(next_at, INTERVAL exp_day day)) >= month(now()) and type !=2 and type != 5 and status = 1 and customer_id = '.$request->customer_id)
                    ->select(DB::raw('type, SUM((money * percent) / 100) as total'))
                    ->groupBy('type')
                    ->get();
        }
        $t1 = 0;
        $t2 = 0;
        $t3 = 0;
        $t4 = 0;
        if($orders != null && count($orders) > 0){
            $rs1 = collect($orders)->where('type', 1)->first();
            $t1 = $rs1 != null ? number_format(round($rs1->total, 0)) : 0;
            $rs2 = collect($orders)->where('type', 3)->first();
            $t2 = $rs2 != null ? number_format(round($rs2->total, 0)) : 0;
            $rs3 = collect($orders)->where('type', 4)->first();
            $t3 = $rs3 != null ? number_format(round($rs3->total, 0)) : 0;
            $rs4 = collect($orders)->where('type', 6)->first();
            $t4 = $rs4 != null ? number_format(round($rs4->total, 0)) : 0;
        }
        return $this->data([
            't1' => $t1,
            't2' => $t2,
            't3' => $t3,
            't4' => $t4
        ]);
    }
    
    public function makepass(Request $request){
        return $this->success(Hash::make($request->password));
    }
    
    public function login()
    {
        return view("admin.login");
    }
    
    public function banner(){
        $banner = DB::table('setting_img')->paginate();
        return view('admin.banner',['data'=>$banner]);
    }
    
    public function getUserinfo(Request $request){
        $id = $request->id;
        $data = DB::table('customers')->where('id',$id)->first();
        $data->last_login = DB::table('login_historys')->where('customer_id',$id)->latest()->first();
        $html = view('admin.include.modal_update_customer', compact('data'))->render();
        return $this->data($html);
    }
    
     public function getUserBank(Request $request){
        $id = $request->id;
        $data = DB::table('customer_bank')->where('cus_id',$id)->get();
        $html = view('admin.include.modal_update_bank', compact('data'))->render();
        return $this->data($html);
    }
    
    public function deleteBankCus(Request $request){
        $id = $request->id;
        $data = DB::table('customer_bank')->where('id',$id)->delete();
        return $this->success("Cập nhật thành công");
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
        return view("admin.loan", $this->data);
    }
    public function updateImage(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:setting_img,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|integer|in:1,2,3',
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
    
    public function acceptdebt(Request $request){
        $data = DB::table('customer_debt')->where('id', $request->id)->first();
        if($data == null){
            return $this->error('Khoản vay không hợp lệ');
        }
        if($data->status > 0){
            return $this->error('Khoản vay đã được duyệt');
        }
        if($request->status == 2 && empty($request->note)){
            return $this->error('Vui lòng nhập ghi chú');
        }
        if($request->status != 1 && $request->status != 2){
            return $this->error('Trạng thái không hợp lệ');
        }
        $customerData = DB::table('customers')->where('id', $data->customer_id)->first();
        if($request->status == 2){
            DB::table('customer_debt')->where('id', $data->id)->update(['status' => 2, 'note' => $request->note]);
            $beforeAmount = $customerData->money;
            $afterAmount = $customerData->money + $data->deposit;
            DB::table('historys')->insert([
                'customer_id' => $data->customer_id,
                'created_at' => Carbon::now(),
                'befores' => $beforeAmount,
                'money' => $data->deposit,
                'afters' => $afterAmount,
                'note' => 'Từ chối gói vay',
                'note_trans' => '拒绝贷款套餐'
            ]);
            DB::table('customers')->where('id', $customerData->id)->update(['money' => $afterAmount]);
            
            $content = '';
            $content .= '<p>Kính chào quý khách</p>';
            $content .= '<p>Khoản vay của quý khách đã bị từ chối, nếu có thắc mắc vui lòng liên hệ admin để xử lý.</p>';
            $content .= '<p>Xin chân thành cảm ơn.</p>';
            try {
                Mail::to($customerData->email)->send(new SendMail('Thông báo duyệt khoản vay', $content));
            } catch (Exception $e) {
            }
            
            return $this->success('Huỷ gói vay thành công');
        }
        $day = 0;
        if($data->type == 1){
            $day = $data->exp_day;
        }
        else if($data->type == 3){
            $day = $data->exp_day / 7;
        }
        else {
            $day = $data->exp_day / 30;
        }
        
        $totalFee = $data->money * $day * ($data->percent/100);
        $totalAddCustomer = $data->money - $totalFee;
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money + $totalAddCustomer;
        DB::table('historys')->insert([
                'customer_id' => $data->customer_id,
                'created_at' => Carbon::now(),
                'befores' => $beforeAmount,
                'money' => $totalAddCustomer,
                'afters' => $afterAmount,
                'note' => 'Duyệt gói vay',
                'note_trans' => '批准贷款套餐'
            ]);
        DB::table('customers')->where('id', $customerData->id)->update(['money' => $afterAmount]);
        DB::table('customer_debt')->where('id', $data->id)->update(['status' => 1, 'is_auto' => $request->is_auto, 'next_at' => Carbon::now(), 'note' => empty($request->note) ? '' : $request->note]);
        $content = '';
        $content .= '<p>Kính chào quý khách</p>';
        $content .= '<p>Khoản vay của quý khách đã được duyệt, nếu có thắc mắc vui lòng liên hệ admin để xử lý.</p>';
        $content .= '<p>Xin chân thành cảm ơn.</p>';
        Mail::to($customerData->email)->send(new SendMail('Thông báo duyệt khoản vay', $content));
        return $this->success('Duyệt gói vay thành công');
    }
    
    public function walletsave(Request $request){
        $data = DB::table('wallet_profit')->paginate(20);
        
        $arrColor = ['#FF0033','#FFCC00','#6666FF','#00CC00','#CC00CC', '#d35858'];
        foreach ($data as $key => $each){
            $customer =  DB::table('customers')->where('id',$each->customer_id)->first();
            $each->historys = DB::table('wallet_profit_history')->where('customer_id',$each->customer_id)->get();
            $each->customer = $customer;
            $randomIndex = array_rand($arrColor);
            $each->color = $arrColor[$randomIndex];
            $each->n     =  ucfirst(substr($each->customer->username, 0, 2));
        }
        
        
        
        $this->data['wallets'] = $data;
        return view("admin.walletsave", $this->data);
    }
    
    public function interest(){
        return view('admin.interest');
    }
    
     public function interestList(Request $request){
        $query = DB::select(DB::raw("
            select * from levels 
        "));
        
   
        $data = collect($query);

        return $this->data($data);
    }
    
    
    public function loanList(Request $request){
        $status = $request->status;
        $type = $request->type;
        if($type){
               $query = DB::table('customer_debt as h')
            ->select('h.*', 'c.email')
            ->leftJoin('customers as c', 'h.customer_id', '=', 'c.id')
            ->where('h.status', $status)
            ->where('h.type', $type)
            ->orderBy('h.id', 'desc')
            ->get();
        }else{
            $query = DB::table('customer_debt as h')
            ->select('h.*', 'c.email')
            ->leftJoin('customers as c', 'h.customer_id', '=', 'c.id')
            ->where('h.status', $status)
            ->orderBy('h.id', 'desc')
            ->get();
        }
        $data = collect($query);
        $dataArr = [];
        foreach ($data as $item){
            array_push($dataArr, [
                'id' => $item->id,
                'email' => $item->email,
                'type' => $item->type,
                'deposit' => $item->deposit,
                'money' => $item->money,
                'percent' => $item->percent,
                'created_at' => $item->created_at,
                'next_at' => $item->next_at,
                'exp_day' => $item->exp_day,
                'is_auto' => $item->is_auto,
                'status' => $item->status,
                'note' => $item->note,
                'exp_at' => Carbon::parse($item->next_at)->addDays($item->exp_day)->format('Y-m-d H:i:s')
            ]);
        }
        return $this->data($dataArr);
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
        return view("admin.order", $this->data);
    }
    
    public function orderList(Request $request){
        $query = DB::select(DB::raw("
            select h.*, c.email from orders h left join customers c on h.customer_id = c.id order by h.id desc
        "));
        
   
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
        $txt = $request->s ?? '';
        $statusss = $request->status ?? -1;
        // dd($status);
        $data = DB::table('customers')
        ->whereRaw(" ('".$txt."' = '' or (username like '%".$txt."%' or email like '%".$txt."%' or id like '%".$txt."%')) and (".intval($statusss)." = -1 or kyc_status = ".intval($statusss).") ")
        ->latest()
        ->paginate(20);
        $debtList = DB::table('customer_debt')->whereRaw('status <= 1')->selectRaw('customer_id, sum(deposit) as total, sum(money) as debt')->groupBy('customer_id')->get();
       
        
        // dd($debtList);
        
        foreach ($data as $each){
             $debtInfo = collect($debtList)->where('customer_id', $each->id)->first();
            $each->dongbang = $debtInfo != null ? $debtInfo->total : 0;
            $each->tongvay = $debtInfo != null ? $debtInfo->debt : 0;
            $totalRecharge = DB::table('transfers')->where('type', 1)->where('customer_id', $each->id)->where('status', 1)->selectRaw('sum(money) as total')->first();
            $totalWithdraw = DB::table('transfers')->where('type', 2)->where('customer_id', $each->id)->where('status', 1)->selectRaw('sum(money) as total')->first();
            $each->recharge = $totalRecharge != null ? $totalRecharge->total : 0;
            $each->withdraw = $totalWithdraw != null ? $totalWithdraw->total : 0;
            $orders = DB::table('customer_debt')
                    ->whereRaw('type !=2 and type != 5 and status = 1 and customer_id = '.$each->id)
                    ->select(DB::raw('SUM((money * percent) / 100) as total'))->first();
            
            $debt =  DB::table('customer_debt')->where('customer_id', $each->id)->whereRaw('status <= 1')->selectRaw('sum(deposit) as total, sum(money) as debt')->first();
            
            $each->revenus = $orders != null ? $orders->total : 0;
             
           
            $query = DB::table('stock_tplus')->where('customer_id', $each->id)->get();
            $dataStock = collect($query);
            $groupCP = $dataStock->groupBy('stock')->map(function($group){
                return $group->sum('quantity');
            })->all();
            $totalCp = 0;
            if($groupCP != null && count($groupCP) > 0){
                foreach ($groupCP as $key => $item){
                    
                    $stockData = DB::table('stocks')->where('stock', $key)->first();
                    $stockRedis = json_decode(Redis::get($stockData->exchange.'_'.$key));
                    $totalCp += $item * $stockRedis->lastPrice * 1000;
                }
            }
            $each->totalCp = $totalCp;
            $each->totalValue = $each->money + $each->dongbang + $each->totalCp;
            
        }

        $html = view('admin.include.customer_table', compact('data'))->render();


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
        
        $data = DB::table('notifications')
                ->join('customers', 'notifications.send_to', '=', 'customers.id')
                ->select('notifications.*', 'customers.email','customers.username')
                ->latest('notifications.created_at')
                ->paginate(20);

        $user = DB::table('customers')->get();
        
        
        return view("admin.notification", ['data'=>$data,'customers'=>$user]);
   }
    
   public function updateCustomer(Request $request)
    {
        $data = $request->all();
        $user = DB::table("customers")->where('id',$request->id)->first();
        
        if ($data['password'] != "") {
            $data['password'] = md5($data['password']);
        } else {
            unset($data['password']);
        }
        
        if($data['password2'] == ""){
            unset($data['password2']);
        }
        
        unset($data['_token']);
    
        $customer = DB::table('customers')->where('id', $data['id'])->update(
            $data
        );
    
        if ($customer) {
            return  $this->success("Cập nhật thành công");
        } else {
            return  $this->error("Cập nhật thất bại");
        }
    }
    

    
    public function signin(Request $request)
    {
        if (auth()->guard('admins')->attempt(['username' => $request->username, 'password' => $request->password]))
        {
            // $user = auth()->guard('admins')->user();
            return $this->success("Đăng nhập thành công");
        }
        return $this->error("Sai tài khoản hoặc mật khẩu");
    }
    public function getparent(Request $request){
        $listParentRef = $this->getAllParentCategories($request->customer_id);
        $data = DB::table('ref_customer')
                ->join('customers', 'customers.id', '=', 'ref_customer.customer_id')
                ->whereIn('ref_customer.customer_id', $listParentRef)
                ->selectRaw('ref_customer.*, customers.username, customers.block_ref')
                ->get();
        $dataRow = [];
        foreach($data as $item){
            $customerData = Customer::find($item->customer_id);
            if($customerData != null){
                $total = $customerData->getDescendantIds();
            }
            else{
                $total = null;
            }
            array_push($dataRow, [
                'id' => $item->id,
                'customer_id' => $item->customer_id,
                'username' => $item->username,
                'level' => $item->level,
                'recharge_money' => $item->recharge_money,
                'play_money' => $item->play_money,
                'ref_money' => $item->ref_money,
                'created_at' => $item->created_at,
                'totalF' => $total != null ? count($total) - 1 : 0
            ]);
        }
                
        return $this->data($dataRow);
        
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
        
        $txt = $request->s ?? '';
        $statusss = $request->status ?? -1;
        // dd($status);
        $data = DB::table('customers')
        ->whereRaw(" ('".$txt."' = '' or (username like '%".$txt."%' or email like '%".$txt."%')) and (".intval($statusss)." = -1 or kyc_status = ".intval($statusss).") ")
        ->latest()
        ->paginate(20);
        $debtList = DB::table('customer_debt')->whereRaw('status <= 1')->selectRaw('customer_id, sum(deposit) as total, sum(money) as debt')->groupBy('customer_id')->get();
        
        // dd($debtList);
        
        foreach ($data as $each){
            $debtInfo = collect($debtList)->where('customer_id', $each->id)->first();
            $each->dongbang = $debtInfo != null ? $debtInfo->total : 0;
            $each->tongvay = $debtInfo != null ? $debtInfo->debt : 0;
            $totalRecharge = DB::table('transfers')->where('type', 1)->where('customer_id', $each->id)->where('status', 1)->selectRaw('sum(money) as total')->first();
            $totalWithdraw = DB::table('transfers')->where('type', 2)->where('customer_id', $each->id)->where('status', 1)->selectRaw('sum(money) as total')->first();
            $each->recharge = $totalRecharge != null ? $totalRecharge->total : 0;
            $each->withdraw = $totalWithdraw != null ? $totalWithdraw->total : 0;
            $orders = DB::table('customer_debt')
                    ->whereRaw('type !=2 and type != 5 and status = 1 and customer_id = '.$each->id)
                    ->select(DB::raw('SUM((money * percent) / 100) as total'))->first();
            $each->revenus = $orders != null ? $orders->total : 0;
           
           
            $query = DB::table('stock_tplus')->where('customer_id', $each->id)->get();
            $dataStock = collect($query);
            $groupCP = $dataStock->groupBy('stock')->map(function($group){
                return $group->sum('quantity');
            })->all();
            $totalCp = 0;
            if($groupCP != null && count($groupCP) > 0){
                foreach ($groupCP as $key => $item){
                    
                    $stockData = DB::table('stocks')->where('stock', $key)->first();
                    $stockRedis = json_decode(Redis::get($stockData->exchange.'_'.$key));
                    $totalCp += $item * $stockRedis->lastPrice * 1000;
                }
            }
            $each->totalCp = $totalCp;
            $each->totalValue = $each->money + $each->dongbang + $each->totalCp;
        }
        
        return view("admin.customer", ['data'=>$data,'s'=>$txt]);
    }

    public function customerlist()
    {
        $data = DB::table('customers')
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
                    'note' => 'Cộng tiền',
                    'note_trans' => '加钱'

                ]);
        }
        else if($request->money < $customerData->money){
                DB::table('historys')->insert([
                    'customer_id' => $customerData->id,
                    'befores' => $customerData->money,
                    'money' => $customerData->money - $request->money,
                    'afters' => $request->money,
                    'created_at' => Carbon::now(),
                    'note' => 'Trừ tiền',
                    'note_trans' => '扣钱'
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
        return view("admin.history", $this->data);
    }
    
    
    

    public function historylist(){
        $query = DB::select(DB::raw("
        select h.*, c.email 
        from historys h 
        left join customers c on h.customer_id = c.id 
        where h.type != 1
        order by h.id desc
    "));

   
        $data = collect($query);
        // foreach ($data as $item){
        //     if (!empty($item->note)) {
        //         $translation = $this->__translate($item->note, 'vi', 'zt');
        //         dd($translation);
        //         $item->note = $translation['translatedText'];
        //     }
        // }
    

        return $this->data($data);
    }
    
    public function stock(){
        return view("admin.stock", $this->data);
    }
    
    
    

    public function stockList(){
        $query = DB::table('stocks')->get();
        

   
        $data = collect($query);
        // foreach ($data as $item){
        //     if (!empty($item->note)) {
        //         $translation = $this->__translate($item->note, 'vi', 'zt');
        //         dd($translation);
        //         $item->note = $translation['translatedText'];
        //     }
        // }
    

        return $this->data($data);
    }
    
    private function __translate($text, $source = 'vi', $target = 'zt')
    {
       $apiUrl = 'https://libretranslate.com/translate';
       $postData = json_encode([
            'q' => $text,
            'source' => $source,
            'target' => $target,
            'format' => 'text',
            'api_key' => '', // Bạn có thể thêm khóa API nếu cần
        ]);

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);

    }

    public function transferlist(Request $request)
    {
        $status = $request->status;
        $query = DB::table('transfers as tf')
            ->select('tf.*', 'c.email')
            ->where('tf.type', $request->type)
            ->leftJoin('customers as c', 'tf.customer_id', '=', 'c.id');
        
        if ($status != null && $status !== "") {
            $query->where('tf.status', $status);
        }

        $data = $query->orderByDesc('tf.id')->get();

        $count = DB::table('transfers')->distinct('customer_id')->count('customer_id');
        
            // $data = collect($query);
        return $this->data([
            'data' => $data,
            'total' => $count
        ]);
    }
    
     public function interestStatus(Request $request)
    {
        $interestStatus = DB::table("levels")->where('id', $request->id)->first();
        if ($interestStatus == null) {
            return $this->error('Cấu hình không tồn tại');
        }
        
        DB::table("levels")->where('id', $request->id)->update([
            'p2' => $request->p2,
            'p3' => $request->p3,
            'p4' => $request->p4,
            'p5' => $request->p5,
            'p6' => $request->p6,
            'p7' => $request->p7,
            'p8' => $request->p8,
            'p9' => $request->p9,
            'p10' => $request->p10,
            'p12' => $request->p12,
            'p15' => $request->p15,
            'p20' => $request->p20,

        ]);
        
        return $this->success('Cập nhật thành công');
    }

    public function transferstatus(Request $request)
    {
        $transferData = DB::table("transfers")->where('id', $request->id)->first();
        if ($transferData == null) {
            return $this->error('Giao dịch không tồn tại');
        }
        if ($transferData->status > 0) {
            return $this->error('Giao dịch đã xử lý');
        }
        $userCurrent = DB::table('customers')->where('id', $transferData->customer_id)->first();
        if ($transferData->type == 1) {
            if ($request->status == 1) {
                $beforeAmount = $userCurrent->money;
                $afterAmount = $userCurrent->money + $transferData->money;
                
                DB::table('historys')->insert([
                    'customer_id' => $transferData->customer_id,
                    'befores' => $beforeAmount,
                    'money' => $transferData->money,
                    'afters' => $afterAmount,
                    'created_at' => Carbon::now(),
                    'note' => 'Nạp tiền thành công',
                    'note_trans' => '充值成功'
                ]);
                
                DB::table('customers')->where('id', $transferData->customer_id)->update([
                    'money' => $afterAmount
                ]);
                
                // $dataRef = DB::table('ref_customer')->where('customer_id', $transferData->customer_id)->whereRaw("DATE(created_at) = DATE(now())")->first();

                // if ($dataRef != null) {
                //     DB::table('ref_customer')->where('id', $dataRef->id)->update([
                //         'recharge_money' => $dataRef->recharge_money + $transferData->money
                //     ]);
                // } else {
                //     DB::table('ref_customer')->insert([
                //         'customer_id' => $transferData->customer_id,
                //         'created_at' => Carbon::now(),
                //         'level' => Customer::find($transferData->customer_id)->getLevel(),
                //         'recharge_money' => $transferData->money,
                //         'play_money' => 0,
                //         'ref_money' => 0
                //     ]);
                // }
                
             
            }
        } else {
            if ($request->status == 2) {
                $beforeAmount = $userCurrent->money;
                $afterAmount = $userCurrent->money + $transferData->money;
                DB::table('historys')->insert([
                    'customer_id' => $transferData->customer_id,
                    'befores' => $beforeAmount,
                    'money' => $transferData->money,
                    'afters' => $afterAmount,
                    'created_at' => Carbon::now(),
                    'note' => 'Huỷ lệnh rút tiền',
                    'note_trans' => '取消取款指令'
                ]);
                DB::table('customers')->where('id', $transferData->customer_id)->update([
                    'money' => $afterAmount
                ]);
            }
        }
        $note = empty($request->note) ? "" : $request->note;
        DB::table("transfers")->where('id', $request->id)->update([
            'status' => $request->status,
            'note' => $note
        ]);
        return $this->success('Cập nhật thành công');
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

    public function session(Request $request){
        if($request->password != '174174'){
            return redirect()->to('manager/403');
        }
        $this->data['customer_data'] = DB::table('customers')->where('id', Auth::user()->id)->first();
        $query = DB::select(DB::raw("
                select * from room_sessions 
                where created_at <= now() and DATE_ADD(created_at, INTERVAL 60 SECOND) >= now() 
                order by id desc limit 1
        "));

        $currentSession = collect($query)[0];
        $this->data['session_time'] = $currentSession != null ? Carbon::parse($currentSession->created_at)->addSeconds(62)->diffInSeconds(Carbon::now()) : 0;
        return view("admin.session", $this->data);
    }
    
    public function getSession(){
        $query = DB::select(DB::raw("
                select * from room_sessions 
                where created_at <= now() and DATE_ADD(created_at, INTERVAL 60 SECOND) >= now() 
                order by id desc limit 1
        "));
        if($query == null){
            return $this->error(0);
        }
        $currentSession = collect($query)[0];
        $second = $currentSession != null ? Carbon::parse($currentSession->created_at)->addSeconds(62)->diffInSeconds(Carbon::now()) : 0;
        return $this->success(intval($second));
    }

    public function changesession(Request $request)
    {
        $transferData = DB::table("room_sessions")->where('id', $request->id)->first();
        if ($transferData == null) {
            return $this->error('Giao dịch không tồn tại');
        }
        if(Carbon::parse($transferData->created_at)->addSeconds(52) < Carbon::now()){
            return $this->error("Phiên đã kết thúc");
        }
        DB::table("room_sessions")->where('id', $request->id)->update([
            'number' => $request->number,
            'is_update' => 1
        ]);
        return $this->success('Cập nhật thành công');
    }
    
    
    public function changepasswords(Request $request)
    {
        if (md5($request->old) != Auth::user()->password) {
            return $this->error("Mật khẩu hiện tại không đúng");
        }
        if ($request->old == $request->new) {
            return $this->error("Mật khẩu mới trùng với mật khẩu hiện tại");
        }
        if ($request->confirm != $request->new) {
            return $this->error("Xác nhận mật khẩu không đúng");
        }
        DB::table('customers')->where('id', Auth::user()->id)->update([
            'password' => md5($request->new)
        ]);
        session()->flush();
        Auth::logout();
        return $this->success("Đổi mật khẩu thành công");
    }
    
     public function setting(Request $request){
        // if($request->password !     = '174174'){
        //     return redirect()->to('manager/403');
        // }
        // $this->data['customer_data']= DB::table('customers')->where('id', Auth::user()->id)->first();
        $tigia                         = ['vnd','usd'];
        $systemt                       = ['notification','maintain_content','maintain_status','livechat','telegram','notification_run','title_web','domain', 'personal'];
        $bank                          = ['bank_name','bank_account','bank_number','bank_content'];
        $limit                         = ['limit_wallet','withdraw_quantity','profit_wallet','fee', 'quantity_5'];
        $trade                         = [
            'status_monday_trade','status_tuesday_trade','status_wednesday_trade','status_thursday_trade','status_friday_trade','status_saturday_trade','status_sunday_trade',
            ];
        $tradeTime                         = [
            
            'time_monday_trade','time_tuesday_trade','time_wednesday_trade','time_thursday_trade','time_friday_trade','time_saturday_trade','time_sunday_trade'];
        $this->data['tigia']           = DB::table('settings')->whereIn("setting_key",$tigia)->get();
        $this->data['systemt']         = DB::table('settings')->whereIn("setting_key",$systemt)->get();;
        $this->data['bank']            = DB::table('settings')->whereIn("setting_key",$bank)->get();;
        $this->data['limit']           = DB::table('settings')->whereIn("setting_key",$limit)->get();
        $this->data['trade']           = DB::table('settings')->whereIn("setting_key",$trade)->get();
        $this->data['tradeTime']       = DB::table('settings')->whereIn("setting_key",$tradeTime)->get();
        // $this->data['settings']     = DB::table('settings')->get();
        return view("admin.setting", $this->data);
    }

    public function settings(Request $request){
        DB::table('settings')->where('setting_key', 'bank_name')->update([
            'setting_value' => empty($request->bank_name) ? '' : $request->bank_name
        ]);
        DB::table('settings')->where('setting_key', 'bank_account')->update([
            'setting_value' => empty($request->bank_account) ? '' : $request->bank_account
        ]);
        DB::table('settings')->where('setting_key', 'bank_number')->update([
            'setting_value' => empty($request->bank_number) ? '' : $request->bank_number
        ]);
        DB::table('settings')->where('setting_key', 'bank_content')->update([
            'setting_value' => empty($request->bank_content) ? '' : $request->bank_content
        ]);
        DB::table('settings')->where('setting_key', 'telegram')->update([
            'setting_value' => empty($request->telegram) ? '' : $request->telegram
        ]);
        DB::table('settings')->where('setting_key', 'livechat')->update([
            'setting_value' => empty($request->livechat) ? '' : $request->livechat
        ]);
        DB::table('settings')->where('setting_key', 'notification')->update([
            'setting_value' => empty($request->notification) ? '' : $request->notification
        ]);
        DB::table('settings')->where('setting_key', 'withdraw_quantity')->update([
            'setting_value' => empty($request->withdraw_quantity) ? '' : $request->withdraw_quantity
        ]);
        DB::table('settings')->where('setting_key', 'vnd')->update([
            'setting_value' => empty($request->vnd) ? '' : $request->vnd
        ]);
        
          DB::table('settings')->where('setting_key', 'usd')->update([
            'setting_value' => empty($request->usd) ? '' : $request->usd
        ]);
         DB::table('settings')->where('setting_key', 'notification_run')->update([
            'setting_value' => empty($request->notification_run) ? '' : $request->notification_run
        ]);
        
        DB::table('settings')->where('setting_key', 'personal')->update([
            'setting_value' => empty($request->personal) ? '' : $request->personal
        ]);
        
         DB::table('settings')->where('setting_key', 'limit_wallet')->update([
            'setting_value' => empty($request->limit_wallet) ? '' : $request->limit_wallet
        ]);
        
          DB::table('settings')->where('setting_key', 'limit_wallet')->update([
            'setting_value' => empty($request->limit_wallet) ? '' : $request->limit_wallet
        ]);
        
         DB::table('settings')->where('setting_key', 'profit_wallet')->update([
            'setting_value' => empty($request->profit_wallet) ? '' : $request->profit_wallet
        ]);
        
           DB::table('settings')->where('setting_key', 'fee')->update([
            'setting_value' => empty($request->fee) ? '' : $request->fee
        ]);
        
           DB::table('settings')->where('setting_key', 'title_web')->update([
            'setting_value' => empty($request->title_web) ? '' : $request->title_web
        ]);
        
        DB::table('settings')->where('setting_key', 'quantity_5')->update([
            'setting_value' => empty($request->quantity_5) ? '' : $request->quantity_5
        ]);
        
           DB::table('settings')->where('setting_key', 'domain')->update([
            'setting_value' => empty($request->domain) ? '' : $request->domain
        ]);
        
         $trade                         = [
            'status_monday_trade','status_tuesday_trade','status_wednesday_trade','status_thursday_trade','status_friday_trade','status_saturday_trade','status_sunday_trade',
            ];
         $tradeTime                         = [
            
            'time_monday_trade','time_tuesday_trade','time_wednesday_trade','time_thursday_trade','time_friday_trade','time_saturday_trade','time_sunday_trade'];
        foreach ($trade as $key) {
            DB::table('settings')->where('setting_key', $key)->update([
                'setting_value' => empty($request->$key) ? '' : $request->$key
            ]);
        }
        
        // Cập nhật giá trị cho tradeTime
        foreach ($tradeTime as $key) {
            DB::table('settings')->where('setting_key', $key)->update([
                'setting_value' => empty($request->$key) ? '' : $request->$key
            ]);
        }
        return redirect()->to('manager/setting');
    }
    public function get_product($type)
    {
        if ($type == 'b' || $type == 'g' || $type == 'h' || $type == 'i' || $type == 'j') {
            return 'HotTrend';
        } else {
            return 'Viral';
        }
    }

    public function get_value($type)
    {
        if ($type == 'a') {
            return 'A';
        } else if ($type == 'b') {
            return 'B';
        } else if ($type == 'c') {
            return 'V1';
        } else if ($type == 'd') {
            return 'LG';
        } else if ($type == 'e') {
            return 'V2';
        } else if ($type == 'f') {
            return 'A1';
        } else if ($type == 'g') {
            return 'A2';
        } else if ($type == 'h') {
            return 'P';
        } else if ($type == 'i') {
            return 'D';
        } else if ($type == 'j') {
            return 'V3';
        }
    }

    public function get_type($type)
    {
        if ($type == 'c' || $type == 'e' || $type == 'h' || $type == 'j') {
            return 'Vàng Bạc';
        } else if ($type == 'd' || $type == 'f' || $type == 'g' || $type == 'i') {
            return 'Xăng Dầu';
        } else {
            return 'Lúa Gạo';
        }
    }

    public function sessionlist(){
        $query = DB::select(DB::raw("
            select * from room_sessions 
            where DATE_ADD(created_at, INTERVAL 60 SECOND) > now() 
            and room = 2 order by id desc
        "));
        $data = collect($query);
        $dataResult = [];
        foreach($data as $item){
            array_push($dataResult, [
                'id' => $item->id,
                'created_at' => $item->created_at,
                'name' => $this->get_value($item->number) . ' - ' . $this->get_type($item->number) . ' - ' . $this->get_product($item->number),
                'number' => $item->number
            ]);
        }
        return $this->data($dataResult);
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
