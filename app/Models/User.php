<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ أضف هذا السطر
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory; // ✅ أضف HasFactory هنا

    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'profile_picture'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
