@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Role</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.role.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('admin.role.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Role-Name</label>
                <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror " name="name" placeholder="Name">
            </div>
            <table class="table table-striped">
                <thead>
                    <th scope="col" width="1%"><input type="checkbox" name="all_permission" id="main">Module-Name
                    </th>
                    <th scope="col" width="20%">Create</th>
                    <th scope="col" width="20%">Update</th>
                    <th scope="col" width="20%">View</th>
                    <th scope="col" width="20%">Delete</th>
                </thead>
                @php $n=1; @endphp
                @foreach($permission as $permission)
                @if($n == 1)
                <tr>
                    <td>
                        <input type="checkbox" name="module[{{ $permission->permission_module_name }}]" value="{{ $permission->permission_module_name }}" class=" permission @error('all_permission') is-invalid @enderror " id="module_per">{{
                            $permission->permission_module_name }}
                    </td>
                    @error('permission')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @endif
                    <td>
                        <input type="checkbox" class="permision_check" name="permission[]" value="{{$permission->id}}" id="per">
                        {{
                            $permission->name
                            }}
                    </td>
                    @if($n == 4)
                </tr>
                @php $n=0; @endphp
                @endif
                @php $n++; @endphp
                @endforeach
            </table>
            <button type="submit" class="btn btn-primary">Save user</button>
        </form>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#main').on('click', function() {
            if ($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked', true);
                });
                $.each($('.permision_check'), function() {
                    $(this).prop('checked', true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked', false);
                });
                $.each($('.permision_check'), function() {
                    $(this).prop('checked', false);
                });
            }

        });
    });
    $(document).ready(function() {
        $('.permission').on('click', function() {

            if ($(this).is(':checked')) {
                $(this).closest('tr').find('td #per').prop('checked', true);

            } else {
                $(this).closest('tr').find('td #per').prop('checked', false);

            }

        });
    });

</script>
@endpush
