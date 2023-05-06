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
        'status',
        'created_at',
        'updated_at'
    ];
}
