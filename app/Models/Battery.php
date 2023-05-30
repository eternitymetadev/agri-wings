<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    use HasFactory;
    protected $fillable = [
        'battery_no','type','est_acers','battery_cycle','status','created_at','updated_at'        
    ];
}
