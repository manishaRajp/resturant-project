@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
    <div class="content-wrapper">
        <div class="container-fluid">
            <h3>Discount On meal by Resturant</h3>
            <div class="card">
                <div class="card-header">
                    <form method="get" action="{{url('admin.copun.create')}}">
                        @csrf
                        <h5>Add PromoCode(Discount Voucher)</h5>
                        <button type="submit" class="btn btn-primary">Add PromoCode Here</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{!! $dataTable->scripts() !!}
<script>
    $(document).on('click', '#status', function() {
        // alert('manisha');
        var id = $(this).data('id');
        swal({
            title: "change the status!"
            , icon: "warning"
            , buttons: true
            , dangerMode: true
        , }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('admin.discount_status') }}"
                    , type: "get"
                    , data: {
                        id: id
                    , }
                    , dataType: "json"
                    , success: function(data) {
                        if (data) {
                            swal("Updated!", "Status Change Successfully.", "success");
                            window.LaravelDataTables["discountcoupon-table"].draw();
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