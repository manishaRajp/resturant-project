@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
  <div class="content-wrapper">
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Role Management</h2>
    </div>
    <div class="pull-right">
      {{-- @can('role-create') --}}
      <a class="btn btn-success" href="{{ route('admin.role.create') }}"> Create New Role</a>
      {{-- @endcan --}}
    </div>
  </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Name</th>
    <th width="280px">Action</th>
  </tr>
  @foreach ($roles as $key => $role)
  <tr>
    <td>{{ $role->id }}</td>
    <td>{{ $role->name }}</td>
    <td>
      <a class="btn btn-info" href="{{ route('admin.role.show',$role->id) }}">Show</a>
      {{-- @can('role-edit') --}}
      <a class="btn btn-primary" href="{{ route('admin.role.edit',$role->id) }}">Edit</a>
      {{-- @endcan --}}
      {{-- @can('role-delete') --}}
      {!! Form::open(['method' => 'DELETE','route' => ['admin.role.destroy', $role->id],'style'=>'display:inline']) !!}
      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!}
      {{-- @endcan --}}
    </td>
  </tr>
  @endforeach
</table>


  </div>
</div>
@endsection