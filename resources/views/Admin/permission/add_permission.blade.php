@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Permission Management</h2>
                </div>
                <div class="pull-right">
                    {{-- @can('role-create') --}}
                    <a class="btn btn-success" href="{{ route('admin.permission.create') }}"> Create New permission</a>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Module Name</th>
                    <th>Create</th>
                    <th>Update</th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @php $n=1; @endphp
            @foreach($permission as $value)
            @if($n == 1)
            <tr>
                <td><b>{{$value->permission_module_name}}</b></td>
                @endif
                @if(isset($rolePermissions))
                <td>
                    <input type="radio" class="permision_check" name="permission[]" value="{{$value->id}}" {{in_array($value->id, $rolePermissions) ? 'checked' : ''}}>{{ $value->name }}

                </td>
                @else
                <td>
                    <input type="radio" class="permision_check" name="permission[]" value="{{$value->id}}"> {{ $value->name }}
                </td>
                @endif
                @if($n == 4)
            </tr>
            @php $n=0; @endphp
            @endif
            @php $n++; @endphp
            @endforeach
        </table>



    </div>
</div>
@endsection
