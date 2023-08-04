<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Illuminate\Http\Request;

class MonthCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list= Month::all();
        return view('admin.month',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.month');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'month_name'=>'required',
            'current_month'=>'required',
        ]);
        $data = $request->all();
        Month::create($data);
        return redirect()->route('month.index');
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
