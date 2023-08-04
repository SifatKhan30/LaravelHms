<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Food_order;
use App\Models\Payment;
use App\Models\Service_sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrossReportCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expend= Expense::select( DB::raw('SUM(cost) as tcost'), 'month_id')
        ->groupBy('month_id')
        ->get();

        $food = Food_order::select('month_id', DB::raw('SUM(total) as stotal'), DB::raw('MAX(date) as ldate'))
        ->groupBy('month_id')
        ->get();
        $payment = Payment::select('month_id', DB::raw('SUM(paid_amount) as stotal'), DB::raw('MAX(date) as ldate'))
        ->groupBy('month_id')
        ->get();
        $service = Service_sell::select('month_id', DB::raw('SUM(total) as stotal'), DB::raw('MAX(date) as ldate'))
        ->groupBy('month_id')
        ->get();

        $grossReport = [];

        foreach ($expend as $value) {
            $monthId = $value->month_id;
            $grossReport[$monthId]['expense'] = $value;
        }
        foreach ($food as $value) {
            $monthId = $value->month_id;
            $grossReport[$monthId]['food'] = $value->stotal;
        }
        foreach ($payment as $value) {
            $monthId = $value->month_id;
            $grossReport[$monthId]['payment'] = $value->stotal;
        }
        foreach ($service as $value) {
            $monthId = $value->month_id;
            $grossReport[$monthId]['service'] = $value->stotal;
        }
        // dd($grossReport);
        return view('admin.gross',compact('grossReport'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
