<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable=['month_id','expense_category_id','cost','date'];
    function month() {
        return $this->belongsTo(Month::class,'month_id','id');
    }
    function category() {
        return $this->belongsTo(Expense_category::class,'expense_category_id','id');
    }
}
