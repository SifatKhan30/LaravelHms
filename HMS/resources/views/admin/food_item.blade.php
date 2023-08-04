@extends('layouts.layout2')
@section('content')

<div class="card">
    
<div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('item.create')}}" style="color:aliceblue">Add New</a></button>
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
                <th style="font-weight: 900">Food Item</th>
                <th style="font-weight: 900">Price</th>
                <th style="font-weight: 900">Photo</th>
                <th style="font-weight: 900">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $k=>$item)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$item->item}}</td>
                    <td>{{$item->price}}</td>
                    <td><img src="/uploads/{{$item->photo}}" width="70px" alt=""></td>
                    <td>
                        <a href="{{route('item.edit',$item->id)}}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{route('item.destroy',$item->id)}}" method="post">
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