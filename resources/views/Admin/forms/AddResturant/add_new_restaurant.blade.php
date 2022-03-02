@extends('admin.layouts.master')
@section('content')
<!DOCTYPE html>

<body>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3>Create Resturant</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.restaurant.store')}}" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        {{-- <input type="hidden" value="{{$request->category_id}}" name="category_id"> --}}
                        <div class=" form-group">
                        <label for="restaurant">Restaurant Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                            id="category">
                            <option value="">Choose Category</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                       <div class=" form-group">
                        <label for="restaurant">Restaurant Name</label>
                        <input type="text" name="restaurant" id="restaurant" value="{{ old('restaurant') }}"
                            class="form-control @error('restaurant') is-invalid @enderror" placeholder="Resturant name">
                        @error('restaurant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class=" form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" value="{{ old('address') }}" placeholder="enter your resturant address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contact">Customer care no.</label>
                                <input type="number" class="form-control @error('contact') is-invalid @enderror"
                                    name="contact" id="contact" value="{{ old('contact') }}"
                                    placeholder="Costomer Care number">
                                @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control  @error('description') is-invalid @enderror"
                                id="description" name="description" value="{{ old('description') }}"
                                placeholder="About The Resturant">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Profile</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="video">Upload Resturant Video</label>
                            <input type="file" class="form-control @error('video') is-invalid @enderror" id="video"
                                name="video">
                            @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <br>
                        {{-- <input type="submit" class="btn btn-primary" /> --}}
                        <input type="submit" name="submit" value="Submit"  class="btn btn-primary"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
        $('#form').validate({ 
            rules: {
                restaurant: {
                    required: true
                },
                category_id: {
                    required: true
                },
                address: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                contact: {
                    required: true,
                },
                description: {
                    required: true,
                },
                image: {
                    required: true,
                },
                video: {
                    required: true,
                },
            },
            message:{
               'email':{
                   required: 'please enterr    .......',
               }
            },
           highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
        });
</script>
@endpush