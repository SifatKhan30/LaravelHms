<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['month_id','member_id','paid_amount','date'];
    function member()  {
        return $this->belongsTo(Member::class,'member_id','id');
    }
    function month() {
        return $this->belongsTo(Month::class,'month_id','id');
    }
}
