<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;
    protected $fillable = [
        'crop_name','crop_price','water_qty','crop_image','status','created_at','updated_at'        
    ];
}
