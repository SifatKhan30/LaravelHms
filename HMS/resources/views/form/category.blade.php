@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('category.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Expense Category</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="name" id="fname" placeholder="Category Here">
                </div>
               
            </div>
           
            {{-- radio button --}}
         
        </div>
        @if($message =  Session::get('msg'))
        <div class="alert alert-success">
            <h3>{{$message}}</h3>
        </div>
        @endif
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection