@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('bed.update',$bed->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Bed No.</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="bed_no" value="{{$bed->bed_no}}" id="fname" placeholder="Room No. Here">
                </div>
               
            </div>
            
            <div class="form-group row">
               
                
                    <label class="col-sm-2 text-right control-label col-form-label">Room No.</label>
                    <div class="col-md-3">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="room_id" value="">
                            
                            @foreach($room as $r)
                            
                                <option value="{{$r->id}}"  <?php if($bed->room_id == $r->id){ echo 'selected';} ?>>{{$r->room_no}}</option>
                            @endforeach
    
                        </select>
                    
                </div>
            </div>
           
            {{-- radio button --}}          
                <div class="form-group row">
                                    <label class="col-sm-2 text-right control-label col-form-label">Status</label>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="status" value="available" {{$bed->status ==='available' ? 'checked' : ''}} required>
                                            <label class="custom-control-label" for="customControlValidation1">Available</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="status" value="unavailable" {{$bed->status ==='unavailable' ? 'checked' : ''}} required>
                                            <label class="custom-control-label" for="customControlValidation2">Unavailable</label>
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