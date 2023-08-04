@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('ss.store')}}" method="post">
        @csrf
        <div class="card-body">
            
            <div class="form-group row">
                    <label class="col-sm-2 text-right control-label col-form-label">Member</label>
                    <div class="col-md-3">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="member_id">
                            <option>Select Member</option>
                            @foreach($member as $m)
                                <option value="{{$m->id}}">{{$m->name}}</option>
                            @endforeach
                        </select>
                    
                        <input type="hidden" name="date" value="{{date('Y-m-d')}}" id="">
                </div>
                    <label class="col-sm-2 text-right control-label col-form-label">Month</label>
                    <div class="col-md-3">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="month_id">
                            <option>Select Month</option>
                            @foreach($month as $m)
                                <option value="{{$m->id}}">{{$m->month_name}}</option>
                            @endforeach
                        </select>
                    
                        <input type="hidden" name="date" value="{{date('Y-m-d')}}" id="">
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-sm-2 text-right control-label col-form-label">Service Item</label>
                    <div class="col-md-3">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="service_id" id="food">
                            <option>Select Service</option>
                          @foreach($service as $k=>$s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                          @endforeach
                        </select>
                    </div>
            </div>
                    
                <div class="form-group row">
                    <div class="col-md-7">
                        <table class="table table-bordered">
                            <thead >
                                 <tr >
                                    <th style="font-weight: 900">Name</th>
                                    <th style="font-weight: 900">Price</th>
                                    <th style="font-weight: 900">QTY</th>
                                    <th style="font-weight: 900">Total</th>
                                    <th style="font-weight: 900">Action</th>
                                </tr>
                            </thead>
                            <tbody id="pd">
                            </tbody>
                            <tr >
                                <th style="font-weight: 900" colspan="4">Sub Total</th>
                                <td colspan="2">
                                  <input type="text" style="font-weight:800; color:darkgreen; font-size:23px;" name="total" class="form-control" id="stt" readonly value="0">
                                </td>
                            </tr>
                        </table>
                </div>
            </div>     
        
        @if($message =  Session::get('msg'))
        <div class="alert alert-success">
            <h3>{{$message}}</h3>
        </div>
        @endif
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Add Service</button>
            </div>
        </div>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        let i = 1
      $('#food').change(function() {
        
        let id = $(this).val();
        // console.log(id)
        $.ajax({
          url: '{{route("sell")}}',
          method: 'post',
          data: {
            id: id,
            _token:'{{ csrf_token() }}'
          },
          success: function(data) {
            let ht = ``
            data.map((d,l)=>{
                ht+=`<tr id="rem_${i}" style="font-weight: 600">
                            <td>${d.name}</td>
                            <td  >
                              <input type="text" id="p_${i}" class="form-control" readonly value="${d.price}">
                              <input type="hidden" id="pk_${i}" name="service_id[]" readonly value="${d.id}" >
                            </td>
                            <td> <input type="number" id="q_${i}" name="quantity[]" class="form-control" onkeyup="payable(${i})" onchange="payable(${i})" value="1" ></td>
                            <td> <input type="text" id="st_${i}" name="tot[]" class="total form-control" onclick="r_(${i})" readonly value="${d.price}"></td>
                            <td>
                                <input type="button" style="border:none; name="" id="r_${i}" onclick="r_(${i})" value="Delete" class="btn btn-sm btn-danger">
                            </td>
                    </tr>`
            })
          $('#pd').append(ht)
          i +=1;
          let subtotal = 0;
          $('.total').each(function(e) {
        let v = parseInt($(this).val());
        
        subtotal += v;

        $('#stt').val(subtotal);
      });
          }
        });
      });
    });

    function r_(i) {
      $('#rem_' + i).remove()

      let qty = $('#q_' + i).val();
        let price = $('#p_' + i).val();
        let total = qty * price;
        
        
      
        let subtotal = 0;
          $('.total').each(function(e) {
        let v = parseInt($(this).val());
        
        subtotal += v;

        $('#stt').val(subtotal);
      });
    }

    function payable(d){
        
        let qty = $('#q_' + d).val();
        let price = $('#p_' + d).val();
        let total = qty * price;
        // console.log(total)
        $('#st_' + d).val(total);

        let subtotal = 0;
        $('.total').each(function(e) {
        let v = parseInt($(this).val());
        subtotal += v;
        
      });
      
      $('#stt').val(subtotal);
        
    }
</script>