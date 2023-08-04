@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('bed.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Bed No.</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="bed_no" id="fname" placeholder="Room No. Here" value="{{old('bed_no')}}">
                        @error('bed_no')
                         <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
               
            </div>
            
            <div class="form-group row">
               
                
                    <label class="col-sm-2 text-right control-label col-form-label">Room No.</label>
                    <div class="col-md-3">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="room_id">
                            <option value="0">Select Room</option>
                            @foreach($room as $r)
                                <option value="{{$r->id}}" {{old('room_id') == $r->id ? 'selected' : ''}}>{{$r->room_no}}</option>
                            @endforeach
                        </select>
                            @error('room_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                    
                </div>
            </div>
           
            {{-- radio button --}}          
                <div class="form-group row">
                                    <label class="col-sm-2 text-right control-label col-form-label">Status</label>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="status" value="available" required>
                                            <label class="custom-control-label" for="customControlValidation1">Available</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="status" value="unavailable" required>
                                            <label class="custom-control-label" for="customControlValidation2">Unavailable</label>
                                        </div>
                                    </div>
                                   
                </div>
         
        </div>
      
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Add Bed</button>
            </div>
        </div>
    </form>
</div>
@endsection