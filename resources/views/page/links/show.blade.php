@extends('layouts.frontPage')
@section('content')
    @parent
    <section class="container mt-5">
        <x-partials.primary-alert>
            <x-slot:message>
                <h1> {{$summary}} => {{$original}} </h1>
            </x-slot:message>
        </x-partials.primary-alert>
        <a href="{{$original}}" class="btn btn-outline-primary mt-2">Go</a>
    </section>
@endsection
