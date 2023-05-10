<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderActivityDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'last_acerage',
        'acerage',
        'last_crop',
        'crop',
        'checmical_used',
        'charging_point',
        'noc_upload',
        'fresh_water',
        'farmer_available',
        'available_person_name',
        'available_person_phone',
        'status',
        'created_at',
        'updated_at' 
    ];
}
