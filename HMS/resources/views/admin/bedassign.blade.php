@extends('layouts.layout2')
@section('content')

<div class="card">
    
<div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('assign.create')}}" style="color:aliceblue">Add New</a></button>
</div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="font-weight: 900">SL.</th>
                <th style="font-weight: 900">Member Name</th>
                <th style="font-weight: 900">Bed No.</th>
                <th style="font-weight: 900">Room No.</th>
                <th style="font-weight: 900">Assign Date</th>
                <th style="font-weight: 900">Action</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($list as $k=>$l)
          <tr>
            <td>{{$k+1}}</td>
            <td>{{$l->member->name}}</td>
            <td>{{$l->bed->bed_no}}</td>
            <td>{{$l->room->room_no}}</td>
            <td>{{$l->date}}</td>
            <td>
                <a href="{{route('assign.edit',$l->id)}}" class="btn btn-sm btn-success">Edit</a>

                <form action="{{route('bed.destroy',$l->id)}}" method="post">
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