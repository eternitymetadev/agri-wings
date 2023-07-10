<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'farmer_id', 'field_area', 'address', 'pin_code','city','created_at','updated_at'        
    ];
}
 