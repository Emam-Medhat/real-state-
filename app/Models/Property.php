<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'price', 'address', 'image', 'type', 'user_id'
    ];

    // العلاقة بين العقار والمستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

