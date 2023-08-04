@extends('layouts.layout2')
@section('content')

<div class="card">
    
<div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('bed.create')}}" style="color:aliceblue">Add New</a></button>
</div>
<div>
    @if($message =  Session::get('msg'))
    <div class="alert alert-success">
        <h3>{{$message}}</h3>
    </div>
    @endif
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="font-weight: 900">SL.</th>
                <th style="font-weight: 900">Bed No.</th>
                <th style="font-weight: 900">Room No.</th>
                {{-- <th style="font-weight: 900">Date</th> --}}
                <th style="font-weight: 900">Availability</th>
                <th style="font-weight: 900">Action</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($list as $k=>$l)
          <tr>
            <td>{{$k+1}}</td>
            <td>{{$l->bed_no}}</td>
            {{-- <td>{{$l->bedassign->date}}</td> --}}
            <td>{{$l->room->room_no}}</td>
            <td>{{$l->status}}</td>
            <td>
                <a href="{{route('bed.edit',$l->id)}}" class="btn btn-sm btn-success">Edit</a>

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