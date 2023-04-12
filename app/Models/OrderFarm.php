<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFarm extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'farm_location',
        'crop',
        'acreage',
        'status',
        'created_at',
        'updated_at'
    ];
}