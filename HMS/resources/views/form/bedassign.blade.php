@extends('layouts.layout2')
@section('content')

<div class="card">
   
    <form class="form-horizontal" action="{{route('assign.store')}}" method="post">
        @csrf
        
            
            <div class="form-group row">
               
                
                    <label class="col-sm-2 text-right control-label col-form-label">Member</label>
                    <div class="col-md-3">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="member_id">
                            <option>Select member</option>
                            @foreach($member as $m)
                                <option value="{{$m->id}}">{{$m->name}}</option>
                            @endforeach
                        </select>
                    
                </div>
            </div>
            <div class="form-group row">
               
                    <label class="col-sm-2 text-right control-label col-form-label">Room No.</label>
                    <div class="col-md-3">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="room_id" id="room">
                            <option>Select Room</option>
                            @foreach($room as $r)
                                <option value="{{$r->id}}">{{$r->room_no}}</option>
                            @endforeach
                        </select>
                    
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-sm-2 text-right control-label col-form-label">Category</label>
                    <div class="col-md-3">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="category">
                            <option>Select category</option>
                            @foreach($room as $c)
                                <option value="{{$c->category}}">{{$c->category}}</option>
                            @endforeach
                        </select>
                    
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-sm-2 text-right control-label col-form-label">Bed No.</label>
                <div class="col-md-3" id="b">
                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="bed_id">
                            <option>Select Bed</option>
                    </select> 
                </div>
            </div>
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Assign Date</label>
                <div class="col-sm-3">
                    <input type="date"  class="form-control" name="date" id="fname" placeholder="Room No. Here">
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
                <button type="submit" class="btn btn-primary">Bed Assign</button>
            </div>
        </div>
    </form>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function() {
      $('#room').change(function() {
        let roomID = $(this).val();
        $.ajax({
          url: '{{route("getbed")}}',
          method: 'post',
          data: {
            id: roomID,
            _token:'{{ csrf_token() }}'
          },
          success: function(data) {
            let ht=`<select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="bed_id" id="bed">
                <option>Select Bed</option>`
                          data.map((d,i)=>{
                            ht+=`<option value="${d.id}">${d.bed_no}</option>`
                          })
                        ht+=`</select> `
                          $('#b').html(ht)
          }
        });
      });

    });
  </script>

