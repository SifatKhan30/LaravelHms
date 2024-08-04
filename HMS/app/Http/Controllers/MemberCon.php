<?php

namespace App\Http\Controllers;

use App\Models\BedAssign;
use App\Models\Food_order;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Payment;
use App\Models\Room;
use App\Models\Service_sell;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MemberCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Member::all();
        // dd($list);
        return view('admin.member', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.member');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'=> 'required',
        //     'email'=>'required|email',
        //     'phone'=> 'required',
        //     'photo'=> 'required|image|mimes:jpg,jpeg,png',
        //     'status'=> 'required',
        //     'admit_date'=>'required',
        // ]);
        $data=Validator::make($request->all(),[
            'name'=> 'required',
            'email'=>'required|email',
            'phone'=> 'required|numeric| regex:/^[0-9]+$/',
            'photo'=> 'required|image|mimes:jpg,jpeg,png',
            'status'=> 'required',
            'admit_date'=>'required',
        ],[
            'name.required'=>'Name is mandatory',
            'email.required'=>'Email is mandatory',
            'email.email'=>'Insert a valid email',
            'phone.required'=>'Phone number is mandatory',
            'phone.numeric'=>'Phone number must be numeric digit',
            'phone.regex'=>'Phone number must be numeric digit',
            'admit_date.required'=>'Date is mandatory',
            'photo.required'=>'Photo is mandatory',
            'photo.image'=>'Insert an image',
            'photo.mimes'=>'Insert a valid file'

        ])->validate();
       $data = $request->all();
       if ($image = $request->file('photo')){
        $destinationPath = 'uploads/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $data['photo']= "$profileImage";
       }

       Member::create($data);
       return redirect()->route('m.index')->with('msg', 'Successfully Inserted!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $room=Room::all();
        $member=Member::find($id);
        $assign=BedAssign::select('*')
        ->where('member_id','=', $member->id)
        ->get();

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $crntmonth = Carbon::now()->format('Y-m');
        $food = Food_order::select('member_id', DB::raw('SUM(total) as stotal'), DB::raw('MAX(date) as ldate'))
        ->where(DB::raw('DATE_FORMAT(date, "%Y-%m")'), '=', $crntmonth)
        ->where('member_id', '=', $member->id)
        ->groupBy('member_id')
        ->get();
        $foodReport = Food_order::select('date', 'member_id', DB::raw('SUM(total) as stotal'))
        ->whereBetween('date', [$startDate, $endDate])
        ->where('member_id', '=', $member->id)
        ->groupBy('date', 'member_id')
        ->get();

        $service = Service_sell::select('member_id', DB::raw('SUM(total) as stotal'), DB::raw('MAX(date) as ldate'))
        ->where(DB::raw('DATE_FORMAT(date, "%Y-%m")'), '=', $crntmonth)
        ->where('member_id', '=', $member->id)
        ->groupBy('member_id')
        ->get();

        $payment = Payment::select('member_id', 'paid_amount')
        ->where('member_id','=', $member->id)
        ->get();

        // all data from query will go to this details array

        $details =[];
        foreach ($assign as $value) {
            $details['ass'] = $value;
        }
        foreach ($food as $value) {
            $details['foods'] = $value->stotal;
        }
        foreach ($service as $value) {
            $details['service'] = $value->stotal;
        }
        foreach ($payment as $value){
            $details['paid'] = $value->paid_amount;
        }
        return view('details.member_detail', compact('member','details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member=Member::find($id);
        // dd($member);
        return view('form.memberedit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'phone'=> 'required',
            'photo'=> 'required|image|mimes:jpg,jpeg,png',
            'status'=> 'required',
            'admit_date'=>'required',
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

        Member::find($id)->update($data);
        return redirect()->route('m.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Member::find($id)->delete();
        return redirect()->route('m.index')->with('msg','Successfully Deleted!');
    }
}
