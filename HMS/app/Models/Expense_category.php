<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense_category extends Model
{
    use HasFactory;
    protected $fillable= ['name'];
    function expense() {
        return $this->hasMany(Expense::class,'month_id','id');
    }
}
