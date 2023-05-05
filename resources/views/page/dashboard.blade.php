@extends('layouts.dashboard')
@section('css')
    @parent
    <style>
    .feature-icon {
    width: 5rem;
    height: 5rem;
    border-radius: .75rem;
    }

    .icon-square {
    width: 3rem;
    height: 3rem;
    border-radius: .75rem;
    }

    .text-shadow-1 { text-shadow: 0 .125rem .25rem rgba(0, 0, 0, .25); }
    .text-shadow-2 { text-shadow: 0 .25rem .5rem rgba(0, 0, 0, .25); }
    .text-shadow-3 { text-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .25); }

    .card-cover {
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    }

    .feature-icon-small {
    width: 3rem;
    height: 3rem;
    }
    </style>
@endsection
@section('dashboard-content')
    <section class="row justify-content-evenly">
        <div class="feature col-4 shadow-lg text-center p-4 rounded-4 bg-dark text-bg-warning text-light ">
            <div class="mb-4 feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" style="height: 36px ; width: 36px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home align-text-bottom" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            </div>
            <h1>Memory Usage</h1>
            <h2 class="mb-3">2GB of 4GB</h2>
            <h3>25%</h3>
        </div>
        <div class="feature col-4 shadow-lg text-center p-4 rounded-4 bg-dark text-bg-warning text-light ">
            <div class="mb-4 feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" style="height: 36px ; width: 36px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home align-text-bottom" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            </div>
            <h1>Disk Usage</h1>
            <h2 class="mb-3">2GB of 4GB</h2>
            <h3>25%</h3>
        </div>
    </section>
@endsection
