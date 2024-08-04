@extends('layouts.layout2')
@section('content')

<style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }
   .circle{
        display: flex;
        justify-content: center;
        align-items: center;  
   }
   .circle img{
    height: 200px;
    width: 200px;
    border-radius: 50%;
    border: 5px solid black;
   }

   .info{
    font-weight: 900;
   }
   
</style>
<div class="card">
<div class="container col-md-10">
   <table class="table table-bordered" width:100%>
    <thead>
    <tr>
        <td colspan="6"
        >
           <div class="circle"><img src="/uploads/{{$member->photo}}" alt=""></div>
        </td>
    </tr>
    <tr>
        <td colspan="6" >
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
       <th colspan="3" style="font-weight: 700; color:black; font-size:20px; ">Hostel Info</th>
       <th colspan="3" style="font-weight: 700; color:black; font-size:20px; ">Transaction</th>
    </tr>
    @foreach ($details as $k=> $item)
        
    @if(isset($item->room))
    
    <tr>
        <td  colspan="3" class="info">Room No.: {{$item->room->room_no}}</td>
        @if(isset($details['foods']))
        <td  colspan="3" class="info" colspan="2">Food consumption: {{$details['foods']}}</td>
        @endif
    </tr>
    <tr>
        <td  colspan="3" class="info" >Bed No: {{$item->bed->bed_no}}</td>
        @if(isset($details['paid']))
        <td  class="info" colspan="3">Status: Paid ({{ $details['paid']}})</td>
        @else
        <td class="info text-danger" colspan="3">Status: Not Paid</td>
        @endif
        
    </tr>
    <tr>
        <td  colspan="3" class="info">
            Admition Date: {{$item->date}}
        </td>
        @if(isset($details['service']))
        <td class="info" colspan="3">Service Taken: {{$details['service']}}</td>
        @else
        <td class="info text-danger" colspan="3">Service: not received yet</td>
        @endif
    </tr>
    @endif
   
    @endforeach
    <tr>
        <td style="text-align: center; font-size:20px; font-weight:900;" colspan="6">Report Generate Section</td>
    </tr>
    <form action="">
    <tr>
        
        <td  colspan="2">
            <div class="col-md-6">
                <label for="" class="form-label">Date From:</label>
                <input type="date" class="form-control" id="inputPassword4" name="start_date">
              </div>
        </td>

        <td  colspan="2"> 
            <div class="col-md-8">
                <label for="" class="form-label">Date To:</label>
                <input type="date" class="form-control" id="inputPassword4" name="end_date">
            </div>
        </td>
       <td  colspan="2">
        <div class="col-md-6" style="margin-top: 10px">   
            <button type="submit" class="btn btn-primary">Report Generate</button>
          </div>
       </td>
    </tr>
    <tr>
        <th>Date</th>
        <th>Food Item</th>
        <th>Food Quantity</th>
        <th>Food Total</th>
        <th>Service Name</th>
        <th>Service Total</th>
    </tr>
    @foreach($data as $order)
    <tr>
        <td style="max-width: 142px">{{ $order->date }}</td>
        <td style="max-width: 152px">{{ $order->food_item ?? 'N/A' }}</td>
        <td>{{ $order->food_quantity ?? 'N/A' }}</td>
        <td>{{ $order->food_total ?? 'N/A' }}</td>
        <td style="max-width: 152px">{{ $order->service_name ?? 'N/A' }}</td>
        <td>{{ $order->service_total ?? 'N/A' }}</td>
    </tr>
@endforeach
</form>
</tbody>
   </table>
    
</div>
</div>
@endsection