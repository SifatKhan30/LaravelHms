<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;

class RoomCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=Room::all();
        return view('admin.room',compact('list'));
        // return response()->json($list);
        // dd($list);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.room');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'room_no'=> 'required|unique',
            'room_charge'=>'required|numeric|between:1000,1500',
            'category'=> 'required',
        ],[
            'room_no.required' => 'Please enter a room number',
            'room_no.unique' => 'The room number already exists',
            'room_charge.required' => 'Please enter the room charge',
            'room_charge.numeric' => 'Please enter a numeric digit',
            'room_charge.between' => 'The room charge should be within 1000 to 1500',
            'category.required'=>'Please select a category'

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $data = $request->all();
        Room::create($data);
        return response()->json(['data'=>$data, 'message' => 'Room created successfully'], 201);
    
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
        $room=Room::find($id);
        // dd($member);
        return view('form.roomedit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'room_no'=> 'required',
            'room_charge'=>'required|numeric',
            'category'=> 'required',
        ],[
            'room_no.required'=>'Please enter a room number',
            'room_charge.required'=>'Please enter the room charge',
            'room_charge.numeric'=>'Please enter a numeric digit',
            'category.required'=>'Please select a category'

        ])->validate();
        $data= $request->all();
        Room::find($id)->update($data);
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::find($id)->delete();
        return redirect()->route('room.index');
    }
    
    function getbed(Request $request) {
        
        $data=Bed::where(['room_id'=>$request->id,'status'=>'available'])->get();
        return response()->json($data);
    }
}
