@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="contact-form">
                    <div class="form-group">
                        <h4 style="font-size:200%;" class="card-title">Edit Resturant</h4>
                    </div>
                    <form class="forms-sample" method="post" action="{{route('admin.update_rest')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$rest_view->id}}">

                        <div class="form-group">
                            <label for="password" class="col-sm-3 col-form-label">Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id">
                                {{-- <option value="{{ $rest_view->category->id }}" {{ $rest_view->category_id ==
                                    $rest_view->category->id ? 'selected' : ''}}>{{ $rest_view->category->name}}
                                </option> --}}
                                <option value="{{ $rest_view->category->id }}" {{ $rest_view->category_id ==
                                    $rest_view->category->id ? 'selected' :
                                    ''}}>Selected Meal Category is-- {{ $rest_view->category->category_name}}</option>
                                @foreach ($rest_cat as $value)
                                <option value="{{ $value->id }}">{{$value->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Rasturant Name</label>
                            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Resturant name"


                                value="{{$rest_view->name}}">
                                @error('name')


                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                                value="{{$rest_view->address}}">
                        </div>
                        <div class=" form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="email of Resturant" value="{{$rest_view->email}}">
                        </div>
                        <div class=" form-group">
                            <label for="contact">contact</label>
                            <input type="text" class="form-control" id="contact" name="contact"
                                placeholder="contact of Resturant" value="{{$rest_view->Contact}}">
                        </div>
                        <div class=" form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="description of Resturant" value="{{$rest_view->decription}}">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <h4>Resturant Image</h4>
                                <hr>
                                <input type="file"
                                    class=" form-input w-full input @error('image')  border-red-500 @enderror"
                                    id="image" name="image" value="{{ old('image') }}"><br><br>
                                <img src="{{asset('storage/Images/'.$rest_view['image'])}}" alt="image" width="70"
                                    height="70" />
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary"></input>
                        <a href="{{ route('admin.restaurant.index')}}"><button
                                class="btn btn-denger">Cancel</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection