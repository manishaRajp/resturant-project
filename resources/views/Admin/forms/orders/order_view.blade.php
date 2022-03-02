@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
    <div class="content-wrapper">
        <div class="container-fluid">
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3>User Orders View</h3>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
              ></script>
{!! $dataTable->scripts() !!}
<script>
    $(document).on('click', '#status', function() {
        var id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "you want to Change Status",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Save!',
            cancelButtonText: "No, cancel plx!",
            reverseButtons: true
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "{{route('admin.order_status')}}",
                    type: "get",
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            swal("Updated!",
                                "Status Change Successfully.",
                                "success");
                                   window.LaravelDataTables["order-table"].draw();
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