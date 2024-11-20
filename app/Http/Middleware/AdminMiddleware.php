<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        $user_info = auth()->guard('admins')->user();
        if ($user_info == null) {
            if($request->ajax()){
                return response()->json([
                    'status' => false,
                    'message' => 'Vui lòng đăng nhập để sử dụng dịch vụ'
                ], 200);
            }
            else{
                return redirect()->to('manager/login');
            }
        }
        
        
        return $next($request);
    }
}
