@extends('frontend_dashboard')
@section('main')
    <div class="mb-3 mb-md-4 d-flex justify-content-between">
        <div class="h3 mb-0">Dashboard</div>
    </div>
    @include('constants.card')
    @include('constants.country_card')
    @include('constants.other_card')
    @include('constants.orders')
@endsection
