<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;
    protected $fillable=['month_name','current_month'];

    function food_order() {
        return $this->hasMany(Food_order::class, 'month_id','id');
    }
    function service_sell() {
        return $this->hasMany(Service_sell::class, 'month_id','id');
    }
    function payment() {
        return $this->hasMany(Payment::class, 'month_id','id');
    }
    function expense() {
        return $this->hasMany(Expense::class, 'month_id','id');
    }
  
}
