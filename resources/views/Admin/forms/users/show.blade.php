@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h1>The User View</h1>
                <div class="contact-form">
                    <div class="form-group">
                        <br>
                        <h3>Name</h3>
                        <label>{{$user_view->name}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Email</h3>
                        <label>{{$user_view->email}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Phone No.</h3>
                        <label>{{$user_view->phone}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Adress</h3>
                        <label>{{$user_view->address}}</label>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
