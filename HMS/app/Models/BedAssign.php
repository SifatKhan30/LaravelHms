<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedAssign extends Model
{
    use HasFactory;
    protected $fillable = ['member_id','room_id','bed_id','date'];

    function member()  {
        return $this->belongsTo(Member::class,'member_id','id');
    }
    function room()  {
        return $this->belongsTo(Room::class,'room_id','id');
    }
    function bed()  {
        return $this->belongsTo(Bed::class,'bed_id','id');
    }

}
