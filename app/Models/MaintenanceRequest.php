<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'property_id',
        'issue_type',
        'description',
        'priority',
        'images',
        'status',
        'requested_date',
        'scheduled_date',
        'completion_date',
        'assigned_technician_id',
        'technician_notes',
        'customer_feedback',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'images' => 'array', // Convert JSON string to an array
        'requested_date' => 'date',
        'scheduled_date' => 'date',
        'completion_date' => 'date',
    ];

    /**
     * Relationship with the Property model.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Relationship with the User model (request owner).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with the User model (assigned technician).
     */
    public function assignedTechnician()
    {
        return $this->belongsTo(User::class, 'assigned_technician_id');
    }
}