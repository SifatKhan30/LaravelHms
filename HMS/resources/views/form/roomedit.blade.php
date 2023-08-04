@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('room.update',$room->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Room No.</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="room_no" value="{{$room->room_no}}" id="fname" placeholder="Room No. Here">
                </div>
               
            </div>
            
            <div class="form-group row">
               
                <label for="lname" class="col-sm-2 text-right control-label col-form-label">Room Charge</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="room_charge" value="{{$room->room_charge}}" id="lname" placeholder="room charge Here">
                </div>
            </div>
           
            {{-- radio button --}}          
                <div class="form-group row">
                                    <label class="col-sm-2 text-right control-label col-form-label">Category</label>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="category" value="standard" {{$room->category === 'standard' ? 'checked' : ''}} required>
                                            <label class="custom-control-label" for="customControlValidation1">Standard</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="category" value="deluxe" {{$room->category === 'deluxe' ? 'checked' : ''}} required>
                                            <label class="custom-control-label" for="customControlValidation2">Deluxe</label>
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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection