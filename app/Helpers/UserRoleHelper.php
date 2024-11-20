<?php
namespace App\Helpers;

class UserRoleHelper
{
  
    public static function getUserInfo()
    {
        $userInfo = auth()->guard('admins')->user();
        
        dd($userInfo);
    }
}
