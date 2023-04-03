<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientUserDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name', 'contact_name', 'contact_number', 'email', 'gst_no', 'pan', 'gst_upload', 'pan_upload', 'status', 'created_at', 'updated_at'
    ];
} 
