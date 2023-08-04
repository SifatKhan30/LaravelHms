@extends('layouts.layout2')
@section('content')
<div class="card">
   
    <form class="form-horizontal" action="{{route('item.update',$item->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                <label for="fname"  class="col-sm-2 text-right control-label col-form-label">Food item</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" name="item" id="fname" placeholder="Name Here" value="{{$item->item}}">
                    @error('item')
                         <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
              
            </div>
            
            <div class="form-group row">

                 <label for="email1" class="col-sm-2 text-right control-label col-form-label">Price</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="price" id="email1" placeholder="Enter Price Here" value="{{$item->price}}">
                    @error('price')
                         <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
            </div>
            <div class="form-group row">

                 <label for="email1" class="col-sm-2 text-right control-label col-form-label">Photo</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" name="photo" id="email1" placeholder="Company Name Here" value="{{$item->photo}}">
                    @error('photo')
                         <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
            </div>
           
            {{-- radio button --}}          
               
         
        </div>
    
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection