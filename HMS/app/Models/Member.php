<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','photo','phone','status','admit_date'];

    function bedassign() {
        return $this->hasMany(BedAssign::class,'member_id','id');
    }
    function payment() {
        return $this->hasMany(Payment::class,'member_id','id');
    }
}
