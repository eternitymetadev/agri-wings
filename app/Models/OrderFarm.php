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
        'base_price',
        'discount_price',
        'client_specific',
        'subvention',
        'crop',
        'acreage',
        'crop_price',
        'discount',
        'total_price',
        'status',
        'created_at',
        'updated_at'
    ];

    public function CropName()
    {
        return $this->hasOne('App\Models\Crop','id','crop');
    }

    public function FarmerFarm()
    {
        return $this->hasOne('App\Models\Farm','id','farm_location');
    }

    public function CropDetail()
    {
        return $this->hasOne('App\Models\CropPriceScheme','crop_id','crop');
    }

}