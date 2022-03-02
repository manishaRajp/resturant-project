@extends('admin.layouts.master')
@section('content')
{{-- @dd($order_view) --}}
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h1>The User View</h1>
                <div class="contact-form">
                    <div class="form-group">
                        <br>
                        <h3>Order no.</h3>
                        <label>{{$order_view->order_id}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Resturant</h3>
                        <label>{{$order_view->Rest->name}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>User_name</h3>
                        <label>{{$order_view->user->name}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Selected item</h3>
                        <label>{{$order_view->restfood->name}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Total Amount</h3>
                        <label>{{$order_view->total}}</label>
                    </div>
                  
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection