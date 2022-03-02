@extends('admin.layouts.master')
@section('content')
{{-- @dd($code_view) --}}
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h1>The Discount View</h1>
                <div class="contact-form">
                    <div class="form-group">
                        <br>
                        <h3>Discount code</h3>
                        <label>{{$code_view->promo_code}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Discount </h3>
                        <label>{{$code_view->discount}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Details</h3>
                        <label>{{$code_view->details}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Start at</h3>
                        <label>{{$code_view->start_date}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>End on</h3>
                        <label>{{$code_view->end_date}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>maxsimun price</h3>
                        <label>{{$code_view->max_transaction}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Minimum Price</h3>
                        <label>{{$code_view->min_transaction}}</label>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h3>Use time</h3>
                        <label>{{$code_view->time_of_applicable}}</label>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection