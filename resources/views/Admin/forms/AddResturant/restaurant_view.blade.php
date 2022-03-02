@extends('admin.layouts.master')
@section('content')
<body>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3>View Resturant</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="restaurant">Restaurant Name</label>
                        <input type="text" name="restaurant" id="restaurant" value="{{$rest_view->name}}" class="form-control" placeholder="Resturant name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="restaurant">Restaurant Address</label>
                        <textarea name="restaurant" id="restaurant" class="form-control" placeholder="Resturant name" readonly rows="5">{{$rest_view->address}}</textarea>

                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="restaurant">Restaurant email</label>
                        <input type="text" name="restaurant" id="restaurant" value="{{$rest_view->email}}" class="form-control" placeholder="Resturant name" readonly>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="restaurant">Restaurant Contact</label>
                        <input type="text" name="restaurant" id="restaurant" value="{{$rest_view->Contact}}" class="form-control" placeholder="Resturant name" readonly>

                    </div>
                    </div>
                    <center>
                    <div class="form-group">
                        <label for="restaurant">Restaurant Image</label><br>
                        <img src="{{asset('storage/images/'.$rest_view['image'])}}" class="img-thumbnail float-center" width="200px" height="200px" alt="">
                    </div>
                    </center>
                    <center>
                    <div class="form-group">
                        <label for="restaurant">Restaurant Video</label><br>
                        <video width="220" height="140" controls>
                            <source src="{{asset('storage/Videos/'.$rest_view['video'])}}" type="video/mp4">
                        </video>
                    </div>
                    </center>








                    <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
