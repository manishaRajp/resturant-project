@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid center">
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="card profile-card-2">
                    <div class="card-img-block">
                        <img class="img-fluid" src="{{asset('admin/assets/images/user_17.jpg')}}" alt="Card image cap">
                    </div>
                    <div class="card-body pt-5">
                        <img src="{{asset('admin/assets/images/user_17.jpg')}}" alt="profile-image" class="profile">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Profile</h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.profile_update')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{Auth::guard('admin')->user()->name}}" placeholder="1234 Main St">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{Auth::guard('admin')->user()->email}}" placeholder="1234 Main St">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="image">Profile</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="1234 Main St">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection