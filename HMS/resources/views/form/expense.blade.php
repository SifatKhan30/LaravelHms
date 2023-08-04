@extends('layouts.layout2')
@section('content')
<div class="card">
    <div class="card-body">
    <button class="btn btn-lg btn-success"><a href="{{route('category.create')}}" style="color:aliceblue">Add Category</a></button>
    </div>
    <form class="form-horizontal" action="{{route('expense.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 text-right control-label col-form-label">Cost Category</label>
                <div class="col-md-3">
                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="expense_category_id">
                        <option>Select Category</option>
                        @foreach($category as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Cost Amount</label>
                <div class="col-sm-2">
                    <input type="text"  class="form-control" name="cost" id="fname" placeholder="amount">
                </div>
                
               
            </div>
        
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Date</label>
                <div class="col-sm-3">
                    <input type="date"  class="form-control" name="date" id="fname" placeholder="Enter cost here">
                </div>
                <label class="col-sm-2 text-right control-label col-form-label">Month</label>
                <div class="col-md-3">
                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="month_id">
                        <option>Select Month</option>
                        @foreach($month as $m)
                            <option value="{{$m->id}}">{{$m->month_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
           
            {{-- radio button --}}          
                     
                </div>
         
        </div>
        @if($message =  Session::get('msg'))
        <div class="alert alert-success">
            <h3>{{$message}}</h3>
        </div>
        @endif
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Add Cost</button>
            </div>
        </div>
    </form>
</div>
@endsection