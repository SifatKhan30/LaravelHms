@extends('layouts.layout2')
@section('content')

<div class="card">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="font-weight: 900">SL.</th>
                <th style="font-weight: 900">Income Name</th>
                <th style="font-weight: 900">Amount</th>
                <th style="font-weight: 900">Date</th>
                <th style="font-weight: 900">Month</th>
                <th style="font-weight: 900">Action</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($food as $k=>$l)
          <tr>
            <td>{{$k+1}}</td>
            <td>{{"Food Orders"}}</td>
            <td style="text-align: right">{{number_format($l->stotal,2)}}</td>
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
          @foreach($payment as $k=>$l)
          <tr>
            <td>{{$k+1}}</td>
            <td>{{"Payment"}}</td>
            <td style="text-align: right">{{number_format($l->stotal,2)}}</td>
            <td>{{$l->ldate}}</td>
            <td>{{$l->month->month_name}}</td>
          </tr>
           @endforeach
           
           @foreach($service as $k=>$s)
           <tr>
            <td>{{$k+1}}</td>
            <td>{{"Service"}}</td>
            <td style="text-align: right">{{number_format($s->stotal,2)}}</td>
            <td>{{$s->ldate}}</td>
            <td>{{$s->month->month_name}}</td>
           </tr>
           @endforeach
        </tbody>
    </table>
   
</div>
@endsection