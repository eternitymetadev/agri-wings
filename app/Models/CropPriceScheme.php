<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropPriceScheme extends Model
{
    use HasFactory;
    protected $fillable = [
        'crop_id','from_date','to_date','crop_price','discount_price','status','created_at','updated_at'
     ];

     public function Crops()
    {
        return $this->hasOne('App\Models\Crop','id','crop_id');
    }
}
