<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineeringCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'city',
        'phone',
        'email',
        'website',
        'images',
        'services',
        'projects',
        'certifications',
        'team',
        'years_experience',
    ];

    protected $casts = [
        'images' => 'array',
        'services' => 'array',
        'projects' => 'array',
        'certifications' => 'array',
        'team' => 'array',
    ];
}