<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food_item;
use App\Models\Food_order;
use App\Models\Member;
use App\Models\Month;
use Illuminate\Support\Facades\DB;

class Food_orderCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $list = Food_order::all();
        $list = Food_order::select('member_id', DB::raw('SUM(total) as atotal'), DB::raw('MAX(date) as ldate'))
        ->groupBy('member_id')
        ->get();
        return view('admin.pos', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $food=Food_item::all();
        $member=Member::all();
        $month=Month::all();
      
        return view('form.pos',compact('food','member','month'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'member_id'=>'required',
            'date'=>'required',
            'month_id'=>'required',
            'food_item_id'=>'required',
            'quantity'=>'required',
            'total'=>'required'
        ]);
        // dd($request);
      $data=$request->all();
      $order = Food_order::selectRaw('max(orderId) as i ')
      ->get();
    //   dd($data);
    
      $orderId = $order[0]['i']+1 ;
      foreach ($data['quantity'] as $i => $qt) {
        $sqt =$qt;
        $stot =$data['tot'][$i];
        $item_id = $data['food_item_id'][$i];
       
        Food_order::create([
            'member_id'=> $data['member_id'],
            'date'=> $data['date'],
            'month_id'=> $data['month_id'],
           'quantity'=> $sqt,
            'food_item_id'=>$item_id,
            'total'=> $stot,
            'orderId' => $orderId
        ]);
    
      }
      return redirect()->route('order.index');
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
    function pos(Request $request) {
        $data=Food_item::where('id',$request->id)->get();
        return response()->json($data);
    }
}
