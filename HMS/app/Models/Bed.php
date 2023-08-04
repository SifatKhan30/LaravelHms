<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    protected $fillable= ['room_id','bed_no','status'];
    
 
    public function room()
    {
        return $this->belongsTo(Room::class,'room_id','id');
    }
    public function bedassign()
    {
        return $this->hasMany(BedAssign::class,'bed_id','id');
    }
}
