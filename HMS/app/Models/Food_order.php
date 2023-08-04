<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_order extends Model
{
    use HasFactory;
    protected $fillable=['orderId','member_id','food_item_id','month_id','quantity','total','date'];

    function month() {
        return $this->belongsTo(Month::class,'month_id','id');
    }
    function member() {
        return $this->belongsTo(Member::class,'member_id','id');
    }
    function food_item() {
        return $this->belongsTo(Food_item::class,'food_item_id','id');
    }
}
