<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationPending extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'customer_type',
        'business_plan',
        'verification_done_by',
        'payment_term',
        'remarks',
        'bill_to_farmer',
        'draft_mode',
        'status',
        'created_at',
        'updated_at'
    ];

    public function RegionalDetails()
    {
        return $this->hasOne('App\Models\RegionalClient','id','client_id');
    }
    public function PendingTerm()
    {
        return $this->hasMany('App\Models\PaymentTerms','client_id','client_id');
    }

}