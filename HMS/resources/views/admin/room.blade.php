@extends('layouts.layout2')
@section('content')

<div class="card">
    
<div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('room.create')}}" style="color:aliceblue">Add New</a></button>
</div>

@if($message =  Session::get('msg'))
<div class="alert alert-success">
    <h3>{{$message}}</h3>
</div>
@endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="font-weight: 900">SL.</th>
                <th style="font-weight: 900">Room No.</th>
                <th style="font-weight: 900">Category</th>
                <th style="font-weight: 900">Room Charge</th>
                <th style="font-weight: 900">Action</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($list as $k=>$l)
          <tr>
            <td>{{$k+1}}</td>
            <td>{{$l->room_no}}</td>
            <td>{{$l->room_charge}}</td>
            <td>{{$l->category}}</td>
            <td>
                <a href="{{route('room.edit',$l->id)}}" class="btn btn-sm btn-success">Edit</a>

                <form action="{{route('room.destroy',$l->id)}}" method="post">
                @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                </form>
            </td>
          </tr>
           @endforeach
        </tbody>
    </table>
   
</div>
@endsection