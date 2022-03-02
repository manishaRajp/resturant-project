@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Permission</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.permission.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <form method="POST" id="form" action="{{ route('admin.permission.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="module" class="form-label">Permission Module Name</label>
                    <input value="{{ old('module') }}" type="text" class="form-control @error('module') is-invalid @enderror " name="module" placeholder="Module name">
                    @error('module')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                
                <div class="mb-3">
                    <label for="gaurd" class="form-label">Permission Gaurd</label>
                    <input value="{{ old('gaurd') }}" type="text" class="form-control  @error('gaurd') is-invalid @enderror " name="gaurd" placeholder="gaurd name">
                    @error('gaurd')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save Role</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
    $('#form').validate({
        rules: {
            module: {
                required: true
            }
            , permission: {
                required: true
            }
            , gaurd: {
                required: true
            }
        , }
        , message: {
            'email': {
                required: 'please enterr    .......'
            , }
        },
        highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        }
        , unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
    });

</script>
@endpush
