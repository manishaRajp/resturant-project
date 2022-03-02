@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!--Start Dashboard Content-->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Payment Data List</h1>
                        <div class="card">
                            <div class="card-header card-header-primary">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-sg">
                                    {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->
</div>
@endsection
@push('scripts')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{!! $dataTable->scripts() !!}
<script>
    $(document).on('click', '#status', function() {
        // alert(436);
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
                    url: "{{route('admin.payment_status')}}",
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
                                   window.LaravelDataTables["payment-table"].draw();
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