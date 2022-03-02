@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3>Add Resturant Meal By Category</h3>
                    <form method="get" action="{{route('admin.meal.create')}}">
                        @csrf
                        <button type="submit" class="btn btn-primary float-left">Add Meal</button>
                    </form>
                    <br><br><hr>
                    <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <h3> Import and Export</h3>
                            <div class="custom-file text-left">
                                <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror"
                                    id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary">Import Meal</button>
                        <a class="btn btn-success" href="{{ route('admin.export-meal') }}">Export Meal</a>
                    </form>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
                        </div>
                    </div>
                
            </div>
        </div>
       
    </div>
</div>
@endsection
@push('scripts')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{!! $dataTable->scripts() !!}
<script>
    $(document).on('click', '#stock', function() {
        var id = $(this).data('id');
        swal({
            title: "change the status!"
            , icon: "warning"
            , buttons: true
            , dangerMode: true
        , }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('admin.meal_quantity') }}"
                    , type: "get"
                    , data: {
                        id: id
                    , }
                    , dataType: "json"
                    , success: function(data) {
                        if (data) {
                            swal("Updated!", "Status Change Successfully.", "success");
                            window.LaravelDataTables["meal-table"].draw();
                        }
                    }
                });
            } else {
                swal("Cancelled", "Your Status is safe :)", "error");
            }
        });
    });
    $(document).on('click', '#delete', function() {
        var id = $(this).data('id');
        swal({
            title: "Do u want to delete Records !"
            , icon: "warning"
            , buttons: true
            , dangerMode: true
        , }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('admin.delete_meal') }}"
                    , type: "get"
                    , data: {
                        id: id
                    , }
                    , dataType: "json"
                    , success: function(data) {
                        if (data) {
                            swal("Deleted !", "Your Records are deleted.", "success");
                            window.LaravelDataTables["meal-table"].draw();
                        }
                    }
                });
            } else {
                swal("Cancelled", "Your Status is safe :)", "error");
            }
        });
    });

</script>
@endpush
