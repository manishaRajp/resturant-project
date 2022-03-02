@extends('admin.layouts.master')
@section('content')

    <body>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3>View Meal</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="restaurant">Restaurant Name</label>
                                <input type="text" name="restaurant" id="restaurant" value="{{ $meal_view->rest->name }}"
                                    class="form-control" placeholder="Resturant name" readonly>
                            </div>
                            <div class="form-group col-md-6">

                                <label for="restaurant">Meal's Category</label>

                                <input type="text" name="restaurant" id="restaurant"
                                    value="{{ $meal_view->meal->meal_cat_name }}" class="form-control"
                                    placeholder="Resturant name" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="restaurant">Resturant's Meal Name</label>

                                <input type="text" name="restaurant" id="restaurant" value="{{ $meal_view->meal_name }}"
                                    class="form-control" placeholder="Resturant name" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="restaurant">Meal sub name</label>
                                <input type="text" name="restaurant" id="restaurant" value="{{ $meal_view->sub_name }}"
                                    class="form-control" placeholder="Resturant name" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="restaurant">Resturant's Meal Price</label>
                                <input type="text" name="restaurant" id="restaurant" value="{{ $meal_view->price }}"
                                    class="form-control" placeholder="Resturant name" readonly>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="restaurant">Meal Quantity</label>

                                <input type="text" name="restaurant" id="restaurant" value="{{ $meal_view->quantity }}"
                                    class="form-control" placeholder="Resturant name" readonly>
                            </div>
                        </div>
                        <center>
                            <div class="form-group">
                                <label for="restaurant">Restaurant Image</label><br>
                                <img src="{{ asset('storage/Food/' . $meal_view['image']) }}"
                                    class=" img-thumbnail float-center" width="100px" height="100px" alt="">
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
