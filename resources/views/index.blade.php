@extends('layouts.default')
{{-- Page title --}}
@section('title')
    Dashboard @parent
@stop
{{-- page level styles --}}
@section('header_styles')

@stop
@section('content')



<style>
.custom-card {
    background: linear-gradient(135deg, #13007D, #3819e7);
    border-radius: 15px;
    color: #fff;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.custom-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
}

/* Card content */
.card-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Card title and value */
.card-title {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    font-weight: bold;
    color: #ffffffdd;
}

.card-value {
    font-size: 2.5rem;
    font-weight: 900;
    color: #ffffff;
}

/* Card subtitle */
.card-subtitle {
    font-size: 0.9rem;
    margin-top: 0.5rem;
    opacity: 0.9;
    color: #ffffffcc;
}

/* Icon container */
.icon-container {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    font-size: 1.5rem;
}

.icon-container i {
    color: #fff;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .custom-card {
        margin-bottom: 1.5rem;
    }
}
</style>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        {{--<div aria-label="breadcrumb" class="card-breadcrumb">
            <h1>Dashboard</h1>

        </div>
        <div class="separator-breadcrumb border-top"></div>--}}
    </section>
    <!-- /.content -->

   {{-- // @if(can('dashboard')) --}}
    <section class="content">
        <div class="container-lg col-md-12">
            <div class="row">
                <?php
                $metrics = [
                    'Total Users' => DB::table('users')
                        ->count(),
                ];

                $icons = [
                    'Total Users' => 'fas fa-users',

                ];

                $subtitles = [
                    'Total Users' => 'Total Users',
                ];
                $permissions=[
                    'Total Users' => 'total_users',
                ];
                ?>

                    @foreach ($metrics as $title => $value)
                    {{-- @if(!can($permissions[$title]))
                    @continue
                    @endif --}}
                    <div class="col-12 col-md-4 col-xxl-3 mb-10">
                        <div class="custom-card">
                            <div class="card-body">
                                <div class="card-content d-flex align-items-center">
                                    <div>
                                        <h5 class="card-title">{{ $title }}</h5>
                                        <h3 class="card-value">{{ number_format($value) }}</h3>
                                    </div>
                                    <div class="icon-container">
                                        <i class="{{ $icons[$title] }}"></i>
                                    </div>
                                </div>
                                <p class="card-subtitle">{{ $subtitles[$title] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

        </div>
    </section>
    {{-- @endif --}}

@stop
@section('footer_scripts')
    <!--   page level js ----------->
    <script language="javascript" type="text/javascript" src="{{ asset('vendors/chartjs/js/Chart.js') }}"></script>
    <script src="{{ asset('js/pages/dashboard.js') }}"></script>

    <!-- end of page level js -->
@stop
