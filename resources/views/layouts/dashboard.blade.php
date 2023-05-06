@extends('layouts.bootstrap')
@section('title')
    Dashboard |
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('css/layouts/dashboard.css')}}">
@endsection
@section('content')
    <x-partials.dashboard.header />
    <div class="container-fluid">
        <div class="row">
            <x-partials.dashboard.nav />
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <x-partials.system-messages-printer />
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    @section('dashboard-title')
                        <h1 class="h2">Dashboard</h1>
                    @show
                </div>
                @yield('dashboard-content')
            </main>
        </div>
    </div>
@endsection
