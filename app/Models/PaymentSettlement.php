<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSettlement extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'date_of_deposite',
        'bank_name',
        'branch_location',
        'payment_settlement',
        'amount_deposite',
        'user_id',
        'verify_date',
        'status',
        'created_at',
        'updated_at'
    ];

    public function GetUser(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
