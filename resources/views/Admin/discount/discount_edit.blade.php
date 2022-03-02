@extends('admin.layouts.master')
@section('content')
{{-- @dd($code_edit) --}}
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="contact-form">
                    <div class="form-group">
                        <h4 style="font-size:200%;" class="card-title">Edit Discount</h4>
                    </div>
                    <form class="forms-sample" method="post" action="{{route('admin.update_discount')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$code_edit->id}}">
                        <div class="form-group">
                            <label for="promo_code">Discount Code</label>
                            <input type="text" name="promo_code" class="form-control @error('promo_code') is-invalid @enderror"
                                value="{{$code_edit->promo_code}}">
                                @error('promo_code')

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" min="1" class="form-control" id="discount" name="discount"

                                value="{{$code_edit->discount}}">

                        </div>

                        <div class="form-group">
                            <label for="details">Details</label>
                            <input type="text" class="form-control" id="details" name="details"
                                value="{{$code_edit->details}}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="max_transaction">Max transaction</label>
                                <input type="text" class="form-control" id="max_transaction" name="max_transaction"
                                    value="{{$code_edit->max_transaction}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="min_transaction">Min transaction</label>
                                <input type="text" class="form-control" id="min_transaction" name="min_transaction"
                                    value="{{$code_edit->min_transaction}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time_of_applicable">Time of applicable</label>
                            <input type="text" class="form-control  @error('time_of_applicable') is-invalid @enderror"
                                id="time_of_applicable" name="time_of_applicable"
                                value="{{$code_edit->time_of_applicable}}">
                            @error('time_of_applicable')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>
                                    <h5 class="mt-2">Start Date</h5>
                                </label>
                                <input type='text'
                                    class="form-control datepicker @error('start_date') is-invalid @enderror"
                                    name="start_date" id="start_date" value="{{$code_edit->start_date}}">
                                @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>
                                    <h5 class="mt-2">End Date</h5>
                                </label>
                                <input type='text'
                                    class="form-control datepicker @error('end_date') is-invalid @enderror"
                                    name="end_date" id='end_date' value="{{$code_edit->end_date}}">
                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary">
                        <input type="button" class="btn btn-dabger"><a href="{{route('admin.user.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection