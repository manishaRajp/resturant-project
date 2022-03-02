@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('admin.restaurant.create') }}" method="get">
                                    @csrf
                                    <h3>Add Restaurant By Catogory</h3>
                                    <button type="submit" class="btn btn-primary float-left">Add Resturant</button>
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
        </div>
    </div>
</div>

<div class="modal fade" id="videoshow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id='myvideo'>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{!! $dataTable->scripts() !!}
<script>
    $(document).on('click', '#status', function() {
        var id = $(this).data('id');
        swal({
            title: "change the status!"
            , icon: "warning"
            , buttons: true
            , dangerMode: true
        , }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('admin.rest_status') }}"
                    , type: "get"
                    , data: {
                        id: id
                    , }
                    , dataType: "json"
                    , success: function(data) {
                        if (data) {
                            swal("Updated!", "Status Change Successfully.", "success");
                            window.LaravelDataTables["rest-table"].draw();
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
                    url: "{{ route('admin.delete') }}"
                    , type: "get"
                    , data: {
                        id: id
                    , }
                    , dataType: "json"
                    , success: function(data) {
                        if (data) {
                            swal("Deleted !", "Your Records are deleted.", "success");
                            window.LaravelDataTables["rest-table"].draw();
                        }
                    }
                });
            } else {
                swal("Cancelled", "Your Status is safe :)", "error");
            }
        });
    });
    $(document).on('click', '.showVideo', function() {
        var video = $(this).data('video');
        $('#videoshow').modal("show");
            var date = new Date();
             $("#myvideo").html('<video width="460" id="put-video" height="340" controls><source src="' + video  + '?' + date.getTime() + '" type="video/mp4"></video>');
    });
</script>

@endpush