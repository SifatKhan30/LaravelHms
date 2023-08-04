@extends('layouts.layout2')
@section('content')

<div class="card">
    
<div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('m.create')}}" style="color:aliceblue">Add New</a></button>
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
                <th style="font-weight: 900">Name</th>
                <th style="font-weight: 900">Admit Date</th>
                <th style="font-weight: 900">Email</th>
                <th style="font-weight: 900">Phone</th>
                <th style="font-weight: 900">Photo</th>
                <th style="font-weight: 900">Status</th>
                <th style="font-weight: 900">Action</th>
               
                
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $k=> $item)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->admit_date}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td><img src="/uploads/{{$item->photo}}" width="120px" alt=""></td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="{{route('m.show',$item->id)}}" class="btn btn-sm btn-primary">view</a>
                        <a href="{{route('m.edit',$item->id)}}" class="btn btn-sm btn-success">Edit</a>

                        <form action="{{route('m.destroy',$item->id)}}" method="post">
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