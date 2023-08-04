@extends('layouts.layout2')
@section('content')

<style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }
   .circle{
        height: 40vh;
        width: 239%;
        display: flex;
        justify-content: center;
        align-items: center;
        
   }
   .circle img{
    height: 230px;
    width: 230px;
    border-radius: 50%;
    border: 5px solid black;
   }
   .info{
    font-weight: 900;
   }
   
</style>
<div class="card">
<div class="container col-md-10">
   <table class="table table-bordered" width:70%>
    <thead>
    <tr>
        <td colspan="3" class="circle"><img src="/uploads/{{$member->photo}}" alt=""></td>
    </tr>
    <tr>
        <td colspan="3" >
            <div class="row">
                <div class="col-md-4" style="text-align: left; color:rgb(10, 34, 170); margin-top:32px;">
                    <span>Phone: {{$member->phone}}</span>
                </div>
                <div class="col-md-4">
                    <p style="text-align: center; font-size:27px; font-weight:900;">{{$member->name}}</p>
                </div>
                <div class="col-md-4" style="text-align: right; color:rgb(10, 34, 170); margin-top:32px;">
                    <span>Email: {{$member->email}}</span>
                </div>
            
        </div>
            
        </td>
    </tr>
</thead>
<tbody>
    <tr >
       <th style="font-weight: 700; color:black; font-size:20px; ">Hostel Info</th>
       <th colspan="2" style="font-weight: 700; color:black; font-size:20px; ">Transaction</th>
    </tr>
    @foreach ($details as $k=> $item)
        
    @if(isset($item->room))
    
    <tr>
        <td class="info">Room No.: {{$item->room->room_no}}</td>
        @if(isset($details['foods']))
        <td class="info" colspan="2">Food consumption: {{$details['foods']}}</td>
        @endif
    </tr>
    <tr>
        <td class="info" >Bed No: {{$item->bed->bed_no}}</td>
        @if(isset($details['paid']))
        <td class="info" colspan="2">Status: Paid ({{ $details['paid']}})</td>
        @else
        <td class="info text-danger" colspan="2">Status: Not Paid</td>
        @endif
        
    </tr>
    <tr>
        <td class="info">
            Admition Date: {{$item->date}}
        </td>
        @if(isset($details['service']))
        <td class="info" colspan="2">Service Taken: {{$details['service']}}</td>
        @else
        <td class="info text-danger" colspan="2">Service: not received yet</td>
        @endif
    </tr>
    @endif
   
    @endforeach
    <tr>
        <td style="text-align: center; font-size:20px; font-weight:900;" colspan="3">Report Generate Section</td>
    </tr>
    <form action="">
    <tr>
        
        <td>
            <div class="col-md-6">
                <label for="" class="form-label">Date From</label>
                <input type="date" class="form-control" id="inputPassword4" name="start_date">
              </div>
        </td>

        <td> 
            <div class="col-md-8">
                <label for="" class="form-label">Date To</label>
                <input type="date" class="form-control" id="inputPassword4" name="end_date">
            </div>
        </td>
       <td>
        <div class="col-md-6" style="margin-top: 50px">   
            <button type="submit" class="btn btn-primary">Report Generate</button>
          </div>
       </td>
    </tr>
    <tr>
        <th>Food</th>
        <th>Monthly Fee</th>
        <th>Service</th>
    </tr>
</form>
</tbody>
   </table>
    
</div>
</div>
@endsection