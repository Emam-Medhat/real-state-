<?php

namespace App\Models;

use App\Models\PropertyImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'price', 'address', 'image', 'type', 'user_id','city','bedrooms','bathrooms',
        'area','floor','total_floors','construction_year','furnished','amenities',
        'neighborhood','latitude','longitude','status',
    ];

    // العلاقة بين العقار والمستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
{
    return $this->hasMany(PropertyImage::class);
}

}

