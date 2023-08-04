@extends('layouts.layout2')
@section('content')

<div class="card">
    <div class="card-body">

    </div>
<form action="{{route('m.update',$member->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="card-body">
    <div class="form-group row">
        <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Name</label>
        <div class="col-sm-3">
            <input type="text"  class="form-control" name="name" value="{{$member->name}}" id="fname" placeholder="Name Here">
        </div>
        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Email</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="email" value="{{$member->email}}" id="lname" placeholder="Email Here">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Phone</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="phone" value="{{$member->phone}}" id="lname" placeholder="Phone Number Here">
        </div>

         <label for="email1" class="col-sm-2 text-right control-label col-form-label">Photo</label>
        <div class="col-sm-3">
            <input type="file" class="form-control" name="photo"  value="{{$member->photo}}" id="email1" placeholder="Company Name Here"><img src="/uploads/{{$member->photo}}" width="120px" alt="" 
            value=""
            >
        </div>
    </div>

    {{-- radio button --}}          
        <div class="form-group row">
                            <label class="col-sm-2 text-right control-label col-form-label">Status</label>
                            <div class="col-md-3">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="customControlValidation1" name="status" value="active" {{$member->status === 'active' ? 'checked' : ''}} required>
                                    <label class="custom-control-label" for="customControlValidation1">Active</label>
                                </div>
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="customControlValidation2" name="status" value="inactive" 
                                    {{$member->status === 'inactive' ? 'checked' : ''}} required>
                                    <label class="custom-control-label" for="customControlValidation2">Inactive</label>
                                </div>
                            </div>
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Admit Date</label>
                            <div class="col-sm-3">
                                <input type="date" name="admit_date" value="{{$member->admit_date}}" class="form-control" id="lname" placeholder="Phone Number Here">
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>

</div>
@endsection