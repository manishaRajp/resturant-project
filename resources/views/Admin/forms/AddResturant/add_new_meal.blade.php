@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3>Add Meal to your Resturant</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.meal.store')}}" enctype="multipart/form-data" id="form">
                        @csrf
                        {{-- <input type="hidden" value="{{$request->meal_category}}" name="meal_category"> --}}
                        <label for="name">Meal Category</label>
                        <select class="form-control @error('meal_category') is-invalid @enderror" name="meal_category" id="meal_category">
                            <option hidden value="">Choose Meal Category</option>
                            @foreach ($meal as $item)
                            <option value="{{ $item->id }}">{{ $item->meal_cat_name }}</option>
                            @endforeach
                        </select>
                        @foreach ($errors->all() as $error)
                        <alert class="alert-danger">{{ 'The Meal Category Selection is requrid...!!'}}</alert>
                        @endforeach
                        <div class=" form-group">
                            <label for="sub_name">Resturent</label>
                            <select class="form-control @error('rest_name') is-invalid @enderror" name="rest_name" id="rest_name">
                                <option value=""> Choose Restaurant</option>
                                @foreach ($rest as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('rest_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Meal Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Meal name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sub_name">Sub Name</label>
                            <input type="text" class="form-control @error('sub_name') is-invalid @enderror" id="sub_name" name="sub_name"
                                placeholder="meal sub name">
                                @error('sub_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                    placeholder="price of meal">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity"
                                    placeholder="quantity of meal">
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Profile</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
    $('#form').validate({ 
            rules: {
                meal_category: {
                    required: true
                },
                rest_name: {
                    required: true
                },
                name: {
                    required: true
                },
                sub_name: {
                    required: true,
                    email: true
                },
                price: {
                    required: true,
                },
                quantity: {
                    required: true,
                },
                image: {
                    required: true,
                },
            },
            message:{
               'email':{
                   required: 'please enterr    .......',
               }
            },
            // errorElement: 'span',
            //     errorPlacement: function (error, element) {
            //     error.addClass('invalid-feedback');
            //     element.closest('.form-group').append(error);
            // },
           highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
        });
</script>
@endpush