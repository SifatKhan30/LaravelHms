@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('month.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Month</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="month_name" id="fname" placeholder="Month No. Here">
                </div>
               
            </div>
           
            {{-- radio button --}}          
                <div class="form-group row">
                                    <label class="col-sm-2 text-right control-label col-form-label">Current Month</label>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="current_month" value="yes" id="customControlValidation1" name="status" value="available" required>
                                            <label class="custom-control-label" for="customControlValidation1">Yes</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="current_month" value="no" id="customControlValidation2" name="status" value="unavailable" required>
                                            <label class="custom-control-label" for="customControlValidation2">NO</label>
                                        </div>
                                    </div>
                                   
                </div>
         
        </div>
        @if($message =  Session::get('msg'))
        <div class="alert alert-success">
            <h3>{{$message}}</h3>
        </div>
        @endif
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Add Bed</button>
            </div>
        </div>
    </form>
</div>
@endsection