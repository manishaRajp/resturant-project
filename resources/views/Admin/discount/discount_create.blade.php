@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3>Add Discount Code</h3>
                </div>
                <div class="card-body">
                    <form method="POST" id="form" action="{{route('admin.copun.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="promo_code">Promo Code</label>
                            <input type="text" id="promo_code" name="promo_code"
                                class="form-control @error('promo_code') is-invalid @enderror" placeholder="Promo code"
                                value="{{ old('promo_code') }}">
                            @error('promo_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" min="1" class="form-control @error('discount') is-invalid @enderror"

                                id="discount" name="discount" value="{{ old('discount') }}" placeholder="Meal Discount">
                            @error('discount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <input type="text" class="form-control @error('details') is-invalid @enderror" id="details"
                                name="details" value="{{ old('details') }}" placeholder="Discount Details">
                            @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="max_transaction">Max Transaction</label>
                                <input type="number" class="form-control @error('max_transaction') is-invalid @enderror"
                                    id="max_transaction" name="max_transaction" value="{{ old('max_transaction') }}"
                                    placeholder="max transaction" min="1">

                                @error('max_transaction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="min_transaction">Min Transaction</label>
                                <input type="number" class="form-control @error('min_transaction') is-invalid @enderror "

                                    id="min_transaction" name="min_transaction" value="{{ old('min_transaction') }}"
                                    placeholder="min transaction of meal" min="1">
                                @error('min_transaction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time_of_applicable">Time of applicable</label>
                            <input type="text" class="form-control  @error('time_of_applicable') is-invalid @enderror"
                                id="time_of_applicable" name="time_of_applicable"
                                value="{{ old('time_of_applicable') }}" placeholder="Avabality of the promo code">
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
                                    name="start_date" id="start_date" value="{{ old('start_date') }}"
                                    placeholder='Select Date' style='width: 180px;'>
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
                                    name="end_date" id='end_date' value="{{ old('end_date') }}"
                                    placeholder='Select Date' style='width: 180px;'>
                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $("#start_date").datepicker({
            minDate: 0
            , dateFormat: "yy-mm-dd"
            , onSelect: function(selected) {
                $("#end_date").datepicker("option", "minDate", selected)
            }
        });
        $("#end_date").datepicker({
            dateFormat: "yy-mm-dd"
            , onSelect: function(selected) {
                $("#start_date").datepicker("option", "maxDate", selected)
                maxDate + 1;
            }
        });
    });

    $('#form').validate({
        rules: {
            promo_code: {
                required: true,
            }
            , discount: {
                required: true,
            }
            , details: {
                required: true,
            }
            , max_transaction: {
                required: true,
                minlength: 5,

            }
            , min_transaction: {
                required: true,
                minlength: 2,

            }
            , time_of_applicable: {
                required: true
            , }
            , start_date: {
                required: true
            , }
            , end_date: {
                required: true
            , }
        , }
        , message: {
            'email': {
                required: 'please enterr .......'
            , }
        },
        // errorElement: 'span',
        // errorPlacement: function (error, element) {
        // error.addClass('invalid-feedback');
        // element.closest('.form-group').append(error);
        // },
        highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        }
        , unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
    });

</script>
@endpush