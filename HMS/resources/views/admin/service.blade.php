@extends('layouts.layout2')
@section('content')

<div class="card">
    
<div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('s.create')}}" style="color:aliceblue">Add New</a></button>
</div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Service Name</th>
                <th>Price</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $k => $serv)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$serv -> name}}</td>
                    <td>{{$serv -> price}}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-success">Edit</a>

                        <form action="" method="post">
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