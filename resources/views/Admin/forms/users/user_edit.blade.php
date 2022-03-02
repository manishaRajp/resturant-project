@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="contact-form">
                    <div class="form-group">
                        <h4 style="font-size:200%;" class="card-title">Edit User</h4>
                    </div>
                    <form class="forms-sample" method="post" action="{{route('admin.user_update')}}" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="id" value="{{$users_edit->id}}"> 
                        <div class="form-group">
                            <label for="name">Meal Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Meal name" value="{{$users_edit->name}}">

                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="meal sub name" value="{{$users_edit->email}}">

                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="meal sub name" value="{{$users_edit->phone}}">

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="address of meal" value="{{$users_edit->address}}">
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary"></input>
                        <input type="button" class="btn btn-dabger"><a href="{{route('admin.user.index')}}">Cancel</a></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
