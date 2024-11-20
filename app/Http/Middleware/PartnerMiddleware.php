<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PartnerMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        $maintain = DB::table('settings')->where('setting_key', 'maintain_status')->first();
        if($maintain->setting_value == "on" && $request->path() != "maintain"){
             if($request->ajax()){
                return response()->json([
                    'status' => true,
                    'message' => 'Hệ thống bảo trì'
                ], 200);
            }
            else{
                return redirect()->to('maintain');
            }
        }
        $user_info = Auth::user();
        if ($user_info == null) {
            if($request->ajax()){
                return response()->json([
                    'status' => false,
                    'message' => 'Vui lòng đăng nhập để sử dụng dịch vụ'
                ], 200);
            }
            else{
                return redirect()->to('login');
            }
        }
        else if($user_info != null && $user_info->status == 0){
            if($request->ajax()){
                return response()->json([
                    'status' => false,
                    'message' => 'Tài khoản đã bị khoá'
                ], 200);
            }
            else{
                return redirect()->to('login');
            }
        }
        else if($user_info != null && $user_info->role == 0){
            if($request->ajax()){
                return response()->json([
                    'status' => false,
                    'message' => 'Không có quyền truy cập'
                ], 200);
            }
            else{
                return redirect()->to('login');
            }
        }
        return $next($request);
    }
}
