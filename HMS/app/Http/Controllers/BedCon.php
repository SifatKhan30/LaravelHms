<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bed;
use App\Models\Room;
use App\Models\BedAssign;
use Illuminate\Support\Facades\Validator;

class BedCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Bed::all();
        // dd($list);
        return view('admin.bed',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room=Room::all();
        // dd($room);
        return view('form.bed',compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'room_id'=> 'required|not_in:0',
            'bed_no'=>'required',
            'status'=> 'required',
        ],[
            'room_id.required'=>'Select a room',
            'room_id.not_in'=>'Select a valid room',
            'bed_no.required'=>'Enter a bed number',
        ])->validate();
        $data= $request->all();
        Bed::create($data);
        return redirect()->route('bed.index');
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
     $bed= Bed::find($id);
     $room=Room::all();
    //  dd($bed);
     return view('form.bededit',compact(['bed','room']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'room_id'=> 'required',
            'bed_no'=>'required',
            'status'=> 'required',
        ]);
        $data= $request->all();
        Bed::find($id)->update($data);
        return redirect()->route('bed.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
