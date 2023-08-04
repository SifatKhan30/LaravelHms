@extends('layouts.layout2')
@section('content')

<div class="card">
    
<div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('month.create')}}" style="color:aliceblue">Add New</a></button>
</div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="font-weight: 900">SL.</th>
                <th style="font-weight: 900">Month Name</th>
                <th style="font-weight: 900">Action</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach ($list as $k=> $m)
              <tr>
                <td>{{$k+1}}</td>
                <td>{{$m->month_name}}</td>
                <td></td>
              </tr>
          @endforeach
    
        </tbody>
    </table>
   
</div>
@endsection