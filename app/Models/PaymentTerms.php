<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTerms extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'bill_to',
        'payment_term',
        'status',
        'created_at',
        'updated_at'

    ];
}
