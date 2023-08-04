<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_sell extends Model
{
    use HasFactory;
    protected $fillable=['orderId','member_id','service_id','month_id','quantity','total','date'];

    function month() {
        return $this->belongsTo(Month::class,'month_id','id');
    }
    function member() {
        return $this->belongsTo(Member::class,'member_id','id');
    }
    function service() {
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
