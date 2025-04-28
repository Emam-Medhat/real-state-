<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $fillable = ['property_id', 'path', 'room_type', 'caption'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
