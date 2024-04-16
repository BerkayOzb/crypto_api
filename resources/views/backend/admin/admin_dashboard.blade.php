@extends('backend.backend_dashboard')
@section('content')
    <!-- Content -->

    <div class="row">
        @include('backend.dashboard.cards1')
        <!-- Total Revenue -->
        @include('backend.dashboard.total_revenue')
        <!--/ Total Revenue -->
        @include('backend.dashboard.cards2')
    </div>
    <div class="row">
        <!-- Order Statistics -->
        @include('backend.dashboard.order_statistic')
        <!--/ Order Statistics -->

        <!-- Expense Overview -->
        @include('backend.dashboard.expense')
        <!--/ Expense Overview -->

        <!-- Transactions -->
        @include('backend.dashboard.transactions')
        <!--/ Transactions -->
    </div>
    <!-- / Content -->
@endsection
