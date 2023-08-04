<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Expense_category;
use App\Models\Month;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Expense::select('expense_category_id', DB::raw('SUM(cost) as tcost'), DB::raw('MAX(date) as ldate'),'month_id')
        ->groupBy('month_id','expense_category_id')
        ->get();
        return view('admin.expense', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $month = Month::all();
        $category = Expense_category::all();
        return view('form.expense', compact('month','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'month_id'=>'required',
            'expense_category_id'=>'required',
            'cost'=>'required',
            'date'=>'required'
        ]);
        $data = $request->all();
        Expense::create($data);
        return redirect()->route('expense.index');
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
