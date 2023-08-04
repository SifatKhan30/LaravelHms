<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

class ServiceCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Service::all();
        return view('admin.service', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service= Service::all();
        return view('form.service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $data = $request->all();

        Service::create($data);
        return redirect()->route('s.index')->with('msg', 'Successfully Inserted!!');
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
        //
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
