<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable=['room_no','room_charge','category'];

    function bed() {
        return $this->hasMany(Bed::class,'room_id','id');
    }
    function bedassign() {
        return $this->hasMany(BedAssign::class,'room_id','id');
    }
}
