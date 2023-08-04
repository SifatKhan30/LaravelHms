<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Month;
use App\Models\Service;
use App\Models\Service_sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceSellCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Service_sell::select('member_id', DB::raw('SUM(total) as atotal'), DB::raw('MAX(date) as ldate'))
        ->groupBy('member_id')
        ->get();
        return view('admin.s_sell', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service= Service::all();
        $member=Member::all();
        $month=Month::all();
        return view('form.s_sell', compact('service','member','month'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id'=>'required',
            'date'=>'required',
            'month_id'=>'required',
            'service_id'=>'required',
            'quantity'=>'required',
            'total'=>'required'
        ]);
        // dd($request);
      $data=$request->all();
      $order = Service_sell::selectRaw('max(orderId) as i ')
      ->get();
    //   dd($data);
    
      $orderId = $order[0]['i']+1 ;
      foreach ($data['quantity'] as $i => $qt) {
        $sqt =$qt;
        $stot =$data['tot'][$i];
        $item_id = $data['service_id'][$i];
       
        Service_sell::create([
            'member_id'=> $data['member_id'],
            'date'=> $data['date'],
            'month_id'=> $data['month_id'],
           'quantity'=> $sqt,
            'service_id'=>$item_id,
            'total'=> $stot,
            'orderId' => $orderId
        ]);
    }
    return redirect()->route('ss.index');
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
    function s_sell(Request $request) {
        $data=Service::where('id',$request->id)->get();
        return response()->json($data);
    }
}
