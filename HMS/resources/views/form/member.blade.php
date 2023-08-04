@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('m.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Name</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="name" value="{{old('name')}}" id="fname" placeholder="Name Here">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <label for="lname" class="col-sm-2 text-right control-label col-form-label">Email</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="email" value="{{old('email')}}" id="lname" placeholder="Email Here">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    {{-- <div class="alert alert-danger">{{$message}}</div> --}}
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="lname" class="col-sm-2 text-right control-label col-form-label">Phone</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}" id="lname" placeholder="Phone Number Here">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                 <label for="email1" class="col-sm-2 text-right control-label col-form-label">Photo</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" name="photo" value="{{old('photo')}}" id="email1" placeholder="Company Name Here">
                    @error('photo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
           
            {{-- radio button --}}          
                <div class="form-group row">
                                    <label class="col-sm-2 text-right control-label col-form-label">Status</label>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="status" value="active" required>
                                            <label class="custom-control-label" for="customControlValidation1">Active</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="status" value="inactive" required>
                                            <label class="custom-control-label" for="customControlValidation2">Inactive</label>
                                        </div>
                                    </div>
                                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Admit Date</label>
                                    <div class="col-sm-3">
                                        <input type="date" name="admit_date" class="form-control" value="{{old('admit_date')}}" id="lname" placeholder="Phone Number Here">
                                        @error('admit_date')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
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