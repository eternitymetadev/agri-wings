<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id','client_id', 'status', 'created_at', 'updated_at'
    ];

    public function GetFarmer(){
        return $this->hasOne('App\Models\Consignee','id','customer_id');
    }
}
