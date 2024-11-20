<?php

namespace App\Http\Controllers;

use App\Account;
use App\Customer;
use App\Http\Controllers\BaseController;
use App\Http\Requests\FogotPasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;

class AuthController extends BaseController
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
    public function index()
    {
        return view('auth.login',$this->data);
    }
    public function signup(Request $request)
    {
        if($request != null && $request->ref_id){
            $this->data['ref_id'] = $request->ref_id;
        }
        else{
            $this->data['ref_id'] = '';
        }
        return view('auth.register', $this->data);
    }
    
    public function signin(Request $request)
    {
    
        if(empty($request->username) || empty($request->password)){
            return $this->error('Vui lòng nhập tài khoản, mật khẩu');
        }
        $user = User::where('email', $request->username)->where('password', md5($request->password))->first();
        if($user != null && $user->status == 0){
            return $this->error("Tài khoản đã bị khoá, vui lòng liên hệ CSKH");
        }
        if ($user != null) {
            Db::table('customers')->where('id', $user->id)->update(['last_login' => date('Y-m-d H:i:s')]);
            DB::table('login_historys')->insert([
                'customer_id' => $user->id,
                'ip' => $request->ip(),
                'use_agent' => $request->header('User-Agent'),
                'created_at' => Carbon::now()
            ]);
            Auth::login($user);
            return $this->success("0");
        }
       
        return $this->error("Sai tài khoản hoặc mật khẩu");
    }
    public function signup_post(Request $request)
    {
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
        
        
        if ($request->otp == null) {
            return $this->error("Vui lòng điền mã OTP");
        }
        
        $otpCheck = DB::table('otps')->where('email',$request->email)->first();
        $currentTime = now();
        $expiryTime = Carbon::parse($otpCheck->time);            
        $minutesDifference = $expiryTime->diffInMinutes($currentTime);
        $ref_id = 0;
        if($request->ref_id != ""){
            $ref_id = $request->ref_id;
        }
        if ($minutesDifference > 2) {
            return $this->error("OTP đã quá hạn vui lòng lấy OTP mới!");
        }else{
            if($request->otp != $otpCheck->otp){
                return $this->error("OTP không đúng, vui lòng thử lại !");
            }else{
                 $passwordHash = md5($request->password);
                 $result = DB::table('customers')->insert([
                    'password' => $passwordHash,
                    'username' => $request->username,
                    'money' => 0,
                    'email' => $request->email,
                    'bank_name' => '',
                    'bank_account' => '',
                    'bank_number' => '',
                    'status' => 1,
                    'level' => 1,
                    'ref_id' => $ref_id, 
                    'created_at' => date('Y-m-d H:i:s'),
                    'last_login' => date('Y-m-d H:i:s'),
                    'password2' => ''
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
                    return $this->success('Đăng ký tài khoản thành công');
                } else {
                    return $this->error('Đăng ký tài khoản không thành công');
                }
            }
        }
        
        
        // if(!empty($request->ref_id))
        // {
        //     $getRefUser = DB::table('customers')->where('id', $request->ref_id)->first();
        
        //     if($getRefUser == null){
        //         return $this->error("Mã mời không hợp lệ");
        //     }
        // }
        // else{
        //     return $this->error("Vui lòng nhập mã mời");
        // }
        
       
    }
    public function detect_number($number)
    {
        $numberPhone = '31,30,20,96,97,98,32,33,34,35,36,37,38,39,90,93,70,71,72,73,74,75,76,78,79,91,94,80,81,82,83,84,85,86,87,88,89,99,92,56,58,95';

        // $number is not a phone number
        if (!preg_match('/^[0-9]{9}$/', $number)) return false;

        if (strpos($numberPhone, substr($number, 0, 2)) == false) return false;

        // if not found, return false
        return true;
    }
    public function generateRandomString($length)
    {
        $characters = '0123456789';
        $characters2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters3 = 'abcdefghijklmnopqrstuwxyz';
        $randomString = '';
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $characters2[rand(0, strlen($characters2) - 1)];
        }
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $characters3[rand(0, strlen($characters3) - 1)];
        }
        return $randomString;
    }
	public function logout() {
       Auth::logout();
        return redirect()->to('login');
    }
    
         public function logoutAdmin() {
            Auth::guard('admins')->logout();
            return redirect('manager/login');
        }
    
    public function forgotpassword(){
        return view("auth.forgotpassword",$this->data);
    }
    
    public function sendOtp(Request $request){
        
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return $this->error("Email không đúng định dạng");
        }
        
        $email = $request->email;
        $check = DB::table('customers')->where('email',$email)->get();
        
        if($check->count() > 0){
            return $this->error('Tài khoản email đã tồn tại');
        }
        
        
        $otpCheck = DB::table("otps")->where('email', $email)->first();
        
       if ($otpCheck) {
            $currentTime = now();
            $expiryTime = Carbon::parse($otpCheck->time);            
            $minutesDifference = $expiryTime->diffInMinutes($currentTime);
            if ($minutesDifference > 2) {
                $newOtp = mt_rand(100000, 999999);
                Mail::to($email)->send(new SendOtpMail($newOtp));
                DB::table('otps')->where('id',$otpCheck->id)->update([
                    'time' => $currentTime,
                    'otp' => $newOtp,
                ]);
                return $this->success('OTP dã được gửi thành công, OTP có thời hạn trong 2 phút.');
            } else {
                 return $this->error('Đã gửi OTP, vui lòng kiểm tra lại email !');
            }
        } else {
             $currentTime = now();
             $newOtp = mt_rand(100000, 999999);
             Mail::to($email)->send(new SendOtpMail($newOtp));
             DB::table('otps')->insert([
                    'email' => $email,
                    'time' => $currentTime,
                    'otp' => $newOtp,
             ]);
             
              return $this->success('OTP dã được gửi thành công, OTP có thời hạn trong 2 phút.');

        }
    }
    
    public function resetpassword(Request $request){
      
        
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return $this->error("Email không đúng định dạng");
        }

        if(strlen($request->password) < 6){
            return $this->error("Mật khẩu từ 6 ký tự trở lên");
        }

        if($request->password != $request->repassword){
            return $this->error("Xác nhận mật khẩu không đúng");
        }

        
        
        
        if ($request->otp == null) {
            return $this->error("Vui lòng điền mã OTP");
        }
        
        $otpCheck = DB::table('otps')->where('email',$request->email)->first();
        $currentTime = now();
        $expiryTime = Carbon::parse($otpCheck->time);            
        $minutesDifference = $expiryTime->diffInMinutes($currentTime);
        
        if ($minutesDifference > 2) {
            return $this->error("OTP đã quá hạn vui lòng lấy OTP mới!");
        }else{
            if($request->otp != $otpCheck->otp){
                return $this->error("OTP không đúng, vui lòng thử lại !");
            }else{
                 $passwordHash = md5($request->password);
                 $result = DB::table('customers')->where('email',$request->email)->update([
                    'password' => $passwordHash,
                 ]);
                return $this->success('Thay đổi mật khẩu thành công');
              
            }
        }
    }
    
    
    public function sendOtp2(Request $request){
        
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return $this->error("Email không đúng định dạng");
        }
        
        $email = $request->email;
        $check = DB::table('customers')->where('email',$email)->get();
        
        if($check->count() == 0){
            return $this->error('Tài khoản email không tồn tại trên hệ thống');
        }
        
        
        $otpCheck = DB::table("otps")->where('email', $email)->first();
        
       if ($otpCheck) {
            $currentTime = now();
            $expiryTime = Carbon::parse($otpCheck->time);            
            $minutesDifference = $expiryTime->diffInMinutes($currentTime);
            if ($minutesDifference > 2) {
                $newOtp = mt_rand(100000, 999999);
                Mail::to($email)->send(new SendOtpMail($newOtp));
                DB::table('otps')->where('id',$otpCheck->id)->update([
                    'time' => $currentTime,
                    'otp' => $newOtp,
                ]);
                return $this->success('OTP dã được gửi thành công, OTP có thời hạn trong 2 phút.');
            } else {
                 return $this->error('Đã gửi OTP, vui lòng kiểm tra lại email !');
            }
        } else {
             $currentTime = now();
             $newOtp = mt_rand(100000, 999999);
             Mail::to($email)->send(new SendOtpMail($newOtp));
             DB::table('otps')->insert([
                    'email' => $email,
                    'time' => $currentTime,
                    'otp' => $newOtp,
             ]);
             
              return $this->success('OTP dã được gửi thành công, OTP có thời hạn trong 2 phút.');

        }
    }
}
