@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid center">
        <div class="visible-print text-center">
            <h1>Resturants Details with Menu</h1>
            {!! QrCode::size(250)->generate('My https://www.tripadvisor.in/Restaurants-g297612-Surat_Surat_District_Gujarat.html'); !!}
        </div>
    </div>
</div>

{{-- <div class="content-wrapper">
    {!! QrCode::size(255)->generate('FoodGardan : 09876543212') !!}
</div> --}}
@endsection