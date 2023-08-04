@extends('layouts.layout2')
@section('content')

<div class="card">
    
<div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('order.create')}}" style="color:aliceblue">Go to POS</a></button>
</div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="font-weight: 900">SL.</th>
                <th style="font-weight: 900">Member Name</th>
                <th style="font-weight: 900">Total</th>
                <th style="font-weight: 900">Date</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                $gtotal = 0;
            ?>
          @foreach($list as $k=>$l)
          <?php $gtotal+=$l->atotal ?>
          <tr>
            <td>{{$k+1}}</td>
            <td>{{$l->member->name}}</td>
            <td style="text-align: right">{{number_format($l->atotal,2)}}</td>
            <td>{{$l->ldate}}</td>
          </tr>
           @endforeach
           <tr>
            <th colspan="2" style="font-weight: 900; font-size:20px; text-align:center">Sub Total (Taka)</th>
            <td  style="font-weight: 900; text-align:right"> {{number_format($gtotal,2)}}</td>
            <td></td>
           </tr>
        </tbody>
    </table>
</div>
@endsection