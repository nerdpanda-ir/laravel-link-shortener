@extends('layouts.dashboard')
@section('dashboard-title')
    <h1>Generate a New Link</h1>
@endsection
@section('dashboard-content')
    <x-partials.form-error-printer />
    <x-partials.create-link-form action="{{route('dashboard.link.save')}}"/>
@endsection
