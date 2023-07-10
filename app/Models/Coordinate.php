<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id','pilot','latitude','longitude','type','status','created_at','updated_at'        
    ];
}
