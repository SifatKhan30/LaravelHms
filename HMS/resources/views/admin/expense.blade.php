@extends('layouts.layout2')
@section('content')

<div class="card">
    
<div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('expense.create')}}" style="color:aliceblue">Add New</a></button>
</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="font-weight: 900">SL.</th>
                <th style="font-weight: 900">Cost Name</th>
                <th style="font-weight: 900">Cost</th>
                <th style="font-weight: 900">Date</th>
                <th style="font-weight: 900">Month</th>
                <th style="font-weight: 900">Action</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($list as $k=>$l)
          <tr>
            <td>{{$k+1}}</td>
            <td>{{$l->category->name}}</td>
            <td style="text-align: right">{{number_format($l->tcost,2)}}</td>
            <td>{{$l->ldate}}</td>
            <td>{{$l->month->month_name}}</td>
            
            {{-- <td>
                <a href="{{route('expense.edit',$l->id)}}" class="btn btn-sm btn-success">Edit</a>

                <form action="{{route('expense.destroy',$l->id)}}" method="post">
                @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                </form>
            </td> --}}
          </tr>
           @endforeach
        </tbody>
    </table>
   
</div>
@endsection