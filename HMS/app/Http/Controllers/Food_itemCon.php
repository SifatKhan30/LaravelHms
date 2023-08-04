<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food_item;
use Illuminate\Support\Facades\Validator;

class Food_itemCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Food_item::all();
        return view('admin.food_item', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.food_item');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'item' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image|mimes:jpg,jpeg,png',
        ],[
            'item.required' => 'Please enter an item',
            'price.required' => 'Please enter the price',
            'price.numeric' => 'Price must be numeric digit',
            'photo.required' => 'Please choose a photo',
            'photo.image' => 'Must be an image',
            'photo.mimes' => 'Please select a valid file',
        ])->validate();

        $data = $request->all();
        if ($image = $request->file('photo')) {
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        }

        Food_item::create($data);
        return redirect()->route('item.index')->with('msg', 'Successfully Inserted!!');
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
        $item= Food_item::find($id);
        return view('form.itemedit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        
       $data = $request->all();
       if ($image = $request->file('photo')){
        $destinationPath = 'uploads/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $data['photo']= "$profileImage";
       }else{
        unset($data['photo']);
       }

        Food_item::find($id)->update($data);
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
  
}
