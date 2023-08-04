@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('s.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Service Name</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="name" id="fname" placeholder="Service name Here">
                </div>
                <label for="lname" class="col-sm-2 text-right control-label col-form-label">Price</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name="price" id="lname" placeholder="Cost of service">
                </div>
            </div>
            
            
           
            
         
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection