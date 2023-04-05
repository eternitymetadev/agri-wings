<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionalClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'baseclient_id', 'location_id', 'name','user_id','regional_client_nick_name', 'email', 'phone', 'gst_no','pan','pin','city','district','state','address','notification','verified_by','upload_gst','upload_pan','payment_term','is_multiple_invoice', 'is_prs_pickup', 'status','is_email_sent', 'created_at', 'updated_at'
    ]; 


    public function BaseClient()
    {
        return $this->hasOne('App\Models\BaseClient','id','baseclient_id');
    }

    public function Location()
    {
        return $this->hasOne('App\Models\Location','id','location_id');
    }
    public function UserId()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

}
