<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bed;
use App\Models\BedAssign;
use App\Models\Room;
use App\Models\Member;

class BedAssignCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = BedAssign::all();
        return view('admin.bedassign', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $member = Member::leftJoin('bed_assigns', 'members.id', '=', 'bed_assigns.member_id')
        ->whereNull('bed_assigns.member_id')
        ->select('members.id', 'members.name')
        ->get();
        $roomData=Room::leftJoin('bed_assigns','rooms.id', '=', 'bed_assigns.room_id')
        ->whereNull('bed_assigns.room_id')
        ->select('rooms.id','rooms.room_no','rooms.room_charge')
        ->get();
        $category = Room::select('category')
        ->distinct()
        ->get();
        $room= [
            'roomData'=>$roomData,
            'category'=>$category
        ];
        $bed=Bed::all();
        $assign = $bed->contains('status',['unavailable']);
        // dd($room);
        if($assign){
            return 'error';
        }else{
            return view('form.bedassign',compact('room','member','bed'));
        }
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id'=>'required',
            'room_id'=>'required',
            'bed_id'=>'required',
            'date'=>'required',
        ]);
        $bed =Bed::findOrFail($request->bed_id);

        $data=$request->all();
        BedAssign::create($data);
        $bed->status = 'unavailable';
        $bed->save();
        return redirect()->route('assign.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assign= BedAssign::find($id);
        // dd($assign);
        $member=Member::all();
        $room=Room::all();

        $bed=Bed::all();
        
       
        return view('form.bedassignedit',compact('assign','member','room','bed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
