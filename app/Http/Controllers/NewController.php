<?php

namespace App\Http\Controllers;

use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewController extends BaseController
{
    public $data = [];

    public function __construct()
    {
          $this->data['logo'] = DB::table('setting_img')->where('type',2)->where('status',1)->first();
        $this->data['banners'] = DB::table('setting_img')->where('type',1)->where('status',1)->get();
        $this->data['domain']  = DB::table('settings')->where('setting_key','domain')->first();
        $this->data['title']  = DB::table('settings')->where('setting_key','title_web')->first();
        $this->data['icon']  = DB::table('setting_img')->where('type',3)->first();
    }

  
      public function thongbao()
    {
      
        return view('home.thongbao',$this->data);

    }
    
      private function checkKyc(){
        $statusKyc = Auth::user()->kyc_status;
        if($statusKyc != 2){
            return true;
        }
        return false;
    }
    
    public function nganhang(){
        $this->data['bank'] = DB::table('customer_bank')->where('cus_id',Auth::user()->id)->get();
        return view('home.nganhang',$this->data);
    }
    
    public function addbank(){
        return view('home.addbank',$this->data);
    }
    
    
    public function tichkiem(Request $request){
        $wallet_save = DB::table('wallet_profit')->where('customer_id',Auth::user()->id)->first();
        if(!$wallet_save){
            $wallet_save = DB::table('wallet_profit')->insert([
                'customer_id' => Auth::user()->id,
                'deposit_money' => 0,
                'profit_total'  => 0,
                'time_day' => 0,
                'created_at' =>now(),
                'updated_at' => now(),
            ]);
            
            return redirect()->route('tichkiem',$this->data);
            
        }
        
        $profit = DB::table('settings')->where('setting_key','profit_wallet')->first();
        $this->data['wallet'] = $wallet_save;
        $this->data['customer'] = Auth::user();
        $this->data['profit'] = ($profit->setting_value * 100);
        $this->data['history'] = DB::table('wallet_profit_history')->where('customer_id',Auth::user()->id)->latest()->get();
            
        return view('home.tichkiem',$this->data);

    }
    
    public function submitWallet(Request $request){
        if($this->checkKyc()){ return $this->error('Vui lòng xác thực tài khoản để thực hiện chức năng !');}

        $type = $request->type;
        $number = $request->number;
        $limit = DB::table('settings')->where('setting_key','limit_wallet')->first();
        $currentHour = date('H');
    
        if ($currentHour >= 23 || $currentHour < 1) {
            return $this->error('Hàng ngày từ 11h đêm tới 1h sáng, ví sẽ dừng nạp rút để tiến hành tính lãi. Vui lòng quay lại sau.');
        }
    
      
        if($number == 0){
            return $this->error('Số tiền yêu cầu lớn hơn 0.');
        }
        switch ($type) {
            case 'send':
                if($number > Auth::user()->money){
                    return $this->error('Số dư tài khoản không đủ.');
                }
                
                $checkTime = DB::table('wallet_profit_history')
                ->where('customer_id',Auth::user()->id)
                ->where('type',1)
                ->whereDate('created_at', Carbon::today())->count();
                
                if($checkTime >= $limit->setting_value){
                    return $this->error('Đã vượt quá số lần rút trong ngày.');
                }

                
                DB::table('customers')
                ->where('id', Auth::user()->id)
                ->decrement('money', $number);
                
                DB::table('wallet_profit')
                ->where('customer_id', Auth::user()->id)
                ->increment('deposit_money', $number);
                
                
                $customer = DB::table('customers')
                ->where('id', Auth::user()->id)
                ->first();
                $wallet = DB::table('wallet_profit')
                ->where('customer_id', Auth::user()->id)->first();
                
                
                DB::table('wallet_profit_history')->insert([
                    'customer_id'=> Auth::user()->id,
                    'type' => 1,
                    'money' => $number,
                    'wallet_money' =>  $wallet->deposit_money,
                    'cus_money' => $customer->money,
                    'created_at' => now()
                ]);
                    
                
                
                return $this->success('Thực hiện thành công.');
                
            case 'get':
                $wallet = DB::table('wallet_profit')->where('customer_id',Auth::user()->id)->first();
                
                if($number > $wallet->deposit_money){
                    return $this->error('Số dư ví không đủ.');
                }
                
                 $checkTime = DB::table('wallet_profit_history')
                ->where('customer_id',Auth::user()->id)
                ->where('type',2)
                ->whereDate('created_at', Carbon::today())->count();
                
                if($checkTime >= $limit->setting_value){
                    return $this->error('Đã vượt quá số lần rút trong ngày.');
                }
                
                
                 DB::table('wallet_profit')
                ->where('customer_id', Auth::user()->id)
                ->decrement('deposit_money', $number);
                
                DB::table('customers')
                ->where('id', Auth::user()->id)
                ->increment('money', $number);
                
                
                  $customer = DB::table('customers')
                ->where('id', Auth::user()->id)
                ->first();
                $wallet = DB::table('wallet_profit')
                ->where('customer_id', Auth::user()->id)->first();
                
                
                DB::table('wallet_profit_history')->insert([
                    'customer_id'=> Auth::user()->id,
                    'type' => 2,
                    'money' => $number,
                    'wallet_money' =>  $wallet->deposit_money,
                    'cus_money' => $customer->money,
                    'created_at' => now()
                ]);
                
                return $this->success('Thực hiện thành công.');
                break;
           
        }
    }
    
    public function hoahong(){
                        return view('home.hoahong',$this->data);

    }
    
   public function postReport(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            '_token' => 'required|string',
            'image' => 'image|nullable',
        ]);
    
        $title = $validatedData['title'];
        $description = $validatedData['description'];
        $user = Auth::user();
        $imagePath = null;
    
       
    
        $check = DB::table('reports')->where('customer_id', $user->id)->where('status', 0)->get();
    
        if ($check->count() > 0) {
            return $this->error('Bạn đang có 1 yêu cầu khiếu nại đang được xử lý, vui lòng đợi xử lý xong!');
        } else {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = "report_".$user->id.'_' .time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->move(public_path('assets/images/report'), $imageName);
            }
            DB::table('reports')->insert([
                'customer_id' => $user->id,
                'title' => $title,
                'description' => $description,
                'img' => $imagePath ? $imageName : "",
                'status' => 0,
                'note' => '',
                'created_at' => now(),
            ]);
    
            return $this->success('Phản hồi của bạn đã được gửi thành công!');
        }
    }
    
    public function tigia(){
        $tigia = DB::table('settings')->where('setting_key','usd')->first();
        $tigia2 = DB::table('settings')->where('setting_key','vnd')->first();
        
        $this->data['data'] = $tigia;
        $this->data['data2'] = $tigia2;
        
    

        return view('home.tigia',$this->data);
    }
    
    public function qltbao(){
        $this->data['reports'] = DB::table("reports")->where('customer_id',Auth::user()->id)->latest()->get();
        return view('home.qltbao',$this->data);
    }
    
      public function khieunai(){
        return view('home.khieunai',$this->data);
    }
    
    public function info(){
        $data = Auth::user();
        $this->data['data'] = $data;
        return view('home.info',$this->data);
    }
    
    public function changephone(Request $request){
        
        return view('home.changephone',$this->data);
    }
    
     public function updatePhone(Request $request){
        $user = Auth::user();
        
        $phoneLast = $request->zone . $request->phone;
        
        $pass = $request->pass;
        if(md5($pass) == $user->password){
                DB::table('customers')->where('id',$user->id)->update(['phone'=> $phoneLast]);
              return $this->success('Cập nhật số điện thoại thành công !');

        }
        
        return $this->error('Sai mật khẩu, vui lòng thử lại !');
    }
    
    public function kyc(){
        $kycList = DB::table('settings')->where('setting_key', 'personal')->first();
        $this->data['kyclist'] = explode(",", $kycList->setting_value);
        return view('home.kyc',$this->data);
    }
    
public function kycUpdate(Request $request){
    $validatedData = $request->validate([
        'name' => 'required|string',
        'zone' => 'required|string',
        'phone' => 'required|string',
        'id' => 'required|string',
        'kyc_type' => 'required|int',
        '_token' => 'required|string',
        'image_front' => 'required|image',
        'image_back' => 'required|image',
    ]);
    $name = $validatedData['name'];
    $zone = $validatedData['zone'];
    $phone = $validatedData['phone'];
    $kycId = $validatedData['id'];
        $kyctype = $validatedData['kyc_type'];

    $id = Auth::user()->id;
    $check = DB::table('customers')->where('kyc_type',$kyctype)->where('kyc_id',$kycId)->get();
    if($check->count() > 0){
        return $this->error("Thông tin kyc đã được sử dụng.");
    }

    $imageFront = $validatedData['image_front'];
    $imageFrontName = 'kyc_'.$id.'_front_'.time().'.'.$imageFront->getClientOriginalExtension();

    if ($imageFront->move(public_path('assets/images/kyc'), $imageFrontName)) {
        $imageBack = $validatedData['image_back'];
        $imageBackName = 'kyc_'.$id.'_back_'.time().'.'.$imageBack->getClientOriginalExtension();

        if ($imageBack->move(public_path('assets/images/kyc'), $imageBackName)) {
            DB::table('customers')->where('id',$id)->update([
                'kyc_status'=> 1,
                'kyc_id' => $kycId,
                'kyc_type' => $kyctype,
                "kyc_img_front" => $imageFrontName,
                "kyc_img_back"  => $imageBackName
            ]);
            
            return $this->success("Đã gửi yêu cầu thành công. Vui lòng đợi admin duyệt.");
        } else {
            Storage::delete($imageFrontPath);
        }
    }
    
    return $this->error("Có lỗi xảy ra khi tải lên ảnh. Vui lòng thử lại.");
}
    

    
    public function mienphi(){
        $this->data['information'] = Customer::find(Auth::user()->id);
        return view('home.mienphi', $this->data);

    }
    public function hangngay(){
        $percent = DB::table('levels')->where('type', 1)->where('level', Auth::user()->level)->first();
        $this->data['percent'] = $percent;
        return view('home.hangngay', $this->data);

    }
     public function hangthang(){
        $percent = DB::table('levels')->where('type', 4)->where('level', Auth::user()->level)->first();
        $this->data['percent'] = $percent;
        return view('home.hangthang', $this->data);
    }
    
    public function mienlai(){
        $percent = DB::table('levels')->where('type', 5)->where('level', Auth::user()->level)->first();
        $quantity = DB::table('settings')->where('setting_key', 'quantity_5')->first();
        $this->data['percent'] = $percent;
        $this->data['quantity'] = $quantity->setting_value;
        return view('home.mienlai', $this->data);
    }
    
    public function hangtuan(){
        $percent = DB::table('levels')->where('type', 3)->where('level', Auth::user()->level)->first();
        $this->data['percent'] = $percent;
        return view('home.hangtuan', $this->data);
    }
    public function vip(){
        $percent = DB::table('levels')->where('type', 6)->where('level', Auth::user()->level)->first();
        $this->data['percent'] = $percent;
        return view('home.vip', $this->data);
    }
    
    public function changePass(){
        return view('home.changePass',$this->data);
    }
    
    public function changePassPost(Request $request){
        $user = Auth::user();
        
        $pass = $request->pass;
        $passNew = $request->passNew;
        $repassNew = $request->repassNew;
        
        if(strlen($passNew) < 6){
            return $this->error("Mật khẩu từ 6 ký tự trở lên");
        }
        

        if($repassNew != $passNew){
            return $this->error('Mật khẩu confirm không khớp, vui lòng thử lại !');
        }
        if(md5($pass) != $user->password){
            return $this->error('Sai mật khẩu, vui lòng thử lại !');
        }
        else{
            DB::table('customers')->where('id',$user->id)->update(['password'=> md5($passNew)]);
            return $this->success('Cập nhật mật khẩu thành công !');

        }
        
    }
    
    public function updateBankInfo(Request $request){
          $user = Auth::user();
        
        $bankName = $request->bank_name;
        $bankAccount = $request->bank_account;
        $bankNumber = $request->bank_number;
        
        $checkBankNumber = DB::table("customer_bank")->where('bank_number',$bankNumber)->where("bank_name",$bankName)->get();
        
        if($checkBankNumber->count() > 0){
            return $this->error("Tài khoản ngân hàng đã được đăng ký !");
        } else{
            DB::table('customer_bank')->insert([
                'cus_id' => $user->id,
                'bank_name'=> $bankName,
                'bank_account'=> $bankAccount,
                'bank_number'=> $bankNumber,
            ]);
            
            return $this->success('Cập nhật ngân hàng thành công !');
        }
    }
    
    public function deleteBankInfo(Request $request){
        $user = Auth::user();
        $bank = DB::table("customer_bank")->where('id',$request->id)->first();
        if($bank == null || $bank->cus_id != $user->id){
                        return $this->error("Tài khoản ngân hàng không tồn tại hoặc không đủ quyền !");
        }
        DB::table("customer_bank")->where('id',$request->id)->delete();
        return $this->success('Cập nhật ngân hàng thành công !');

        
    }
    
      public function changePassBank(){
                return view('home.changePassBank',$this->data);

    }
    
    public function changePassBankPost(Request $request){
        $user = Auth::user();
        
        $pass = $request->pass;
        $passNew = $request->passNew;
        $repassNew = $request->repassNew;
        
        if(strlen($passNew) > 6){
            return $this->error("Mật khẩu rút tiền tối đa 6 số !");
        }
        if($repassNew != $passNew){
            return $this->error('Mật khẩu confirm không khớp, vui lòng thử lại !');
        }
        if(md5($pass) != $user->password){
            return $this->error('Sai mật khẩu, vui lòng thử lại !');
        }
        else{
            DB::table('customers')->where('id',$user->id)->update(['password2'=> $passNew]);
            return $this->success('Cập nhật mật khẩu bank thành công !');

        }
        
    }
    
      public function accountAfter(){
          return view('home.accountAfter',$this->data);

    }

}