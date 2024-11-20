<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamp = false;
    protected $table = 'customers';
    protected $fillable = [
        'phone',
        'password',
        'money',
        'bank_name',
        'bank_account',
        'bank_number',
        'status',
    ];
}
