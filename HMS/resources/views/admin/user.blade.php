@extends('layouts.layout2')
@section('content')
<div class="card">
    <form class="form-horizontal">
        <div class="card-body">
           
            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">First Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="fname" placeholder="First Name Here">
                </div>
                <label for="lname" class="col-sm-2 text-right control-label col-form-label">Last Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="lname" placeholder="Last Name Here">
                </div>
            </div>
            <div class="form-group row">
                
            </div>
            <div class="form-group row">
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="lname" placeholder="Password Here">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Company</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="email1" placeholder="Company Name Here">
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="cono1" placeholder="Contact No Here">
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Message</label>
                <div class="col-sm-4">
                    <textarea class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection