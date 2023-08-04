@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('room.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Room No.</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="room_no" id="fname" placeholder="Room No. Here" value="{{old('room_no')}}">
                    @error('room_no')
                         <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
               
            </div>
            
            <div class="form-group row">
               
                <label for="lname" class="col-sm-2 text-right control-label col-form-label">Room Charge</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="room_charge" id="lname" placeholder="room charge Here" {{old('room_charge')}}>
                    @error('room_charge')
                    <span class="text-danger">{{$message}}</span>
                   @enderror
                </div>
                       
            </div>
           
            {{-- radio button --}}          
                <div class="form-group row">
                                    <label class="col-sm-2 text-right control-label col-form-label">Category</label>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="category" value="standard" required>
                                            <label class="custom-control-label" for="customControlValidation1">Standard</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="category" value="deluxe" required>
                                            <label class="custom-control-label" for="customControlValidation2">Deluxe</label>
                                        </div>
                                    </div>
                                   
                </div>
         
        </div>
     
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Add Room</button>
            </div>
        </div>
    </form>
</div>
@endsection