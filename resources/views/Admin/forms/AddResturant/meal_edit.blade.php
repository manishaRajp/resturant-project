@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="contact-form">
                    <div class="form-group">
                        <h4 style="font-size:200%;" class="card-title">Edit Meal item</h4>
                    </div>
                    <form class="forms-sample" method="post" action="{{route('admin.update_meal')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$meal_view->id}}">
                        <div class="form-group">
                            <label for="password" class="col-sm-3 col-form-label">Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                <option value="{{ $meal_view->meal->id }}" {{ $meal_view->category_id == $meal_view->meal->id ? 'selected' : ''}}>Selected Meal Category is-- {{ $meal_view->meal->meal_cat_name}}</option>
                                @foreach ($meal_cat as $value)
                                <option value="{{ $value->id }}">{{$value->meal_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 col-form-label">Resturant </label>
                            <select class="form-control @error('rest_id') is-invalid @enderror" id="rest_id" name="rest_id">
                                <option value="{{ $meal_view->rest->id }}" {{ $meal_view->rest_id == $meal_view->rest->id ? 'selected' : ''}}>Selected Resturant is-- {{ $meal_view->rest->name}}</option>
                                @foreach ($rest_view as $value)
                                <option value="{{ $value->id }}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Meal Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Meal name" value="{{$meal_view->meal_name}}">
                            @error('meal_name')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="sub_name">Sub Name</label>
                            <input type="text" class="form-control" id="sub_name" name="sub_name" @error('sub_name') is-invalid @enderror placeholder="meal sub name" value="{{$meal_view->sub_name}}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" @error('price') is-invalid @enderror placeholder="price of meal" value="{{$meal_view->price}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" @error('quantity') is-invalid @enderror placeholder="quantity of meal" value="{{$meal_view->quantity}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="file" class=" form-input w-full input @error('profile')  border-red-500 @enderror" id="image" name="image" value="{{ old('image') }}">
                            <img src="{{asset('storage/Food/'.$meal_view['image'])}}" alt="image" width="50" height="50" />
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary"></input>
                        <input type="button" class="btn btn-dabger"><a href="{{route('admin.meal.index')}}">Cancel</a></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection