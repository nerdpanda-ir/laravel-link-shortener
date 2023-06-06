@extends('layouts.dashboard')
@php
    /** @var \App\Models\Link $link */
@endphp
@section('dashboard-title')
    <h1>Edit Link {{$link->original}}</h1>
@endsection
@section('dashboard-content')
    <section class="container col-11">
        <x-partials.form-error-printer />
        <form action="{{route('dashboard.admin_link.update',[$link->id])}}?link={{$link->original}}" method="post">
            @csrf
            @method('PUT')
            <div class="row g-3 mb-3">
                <div class="col-sm-12">
                    <label for="url" class="form-label">url</label>
                    <input type="text" class="form-control" id="url" value="{{old('url',$link->original)}}" name="url">
                </div>
                <x-partials.field-error-printer name="url" class="mt-3"/>
            </div>
            <div class="col-12 mb-3">
                <label for="summary" class="form-label">Summary</label>
                <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="summary" value="{{old('summary',$link->summary)}}"
                           name="summary">
                </div>
                <x-partials.field-error-printer name="summary" class="mt-3"/>

            </div>
            <div class="row g-3 mb-3">
                <div class="col-sm-12">
                    <label for="view_count" class="form-label">View count</label>
                    <input type="text" class="form-control" id="view_count" value="{{old('view_count',$link->view_count)}}"
                           name="view_count">
                </div>
                <x-partials.field-error-printer name="view_count" class="mt-3"/>
            </div>
            <section class="d-flex justify-content-around mt-5">
                <button type="submit" class="btn btn-success col-3 d-block">
                    Update
                </button>
                <button type="reset" class="btn btn-dark text-danger col-3 d-block"> Reset </button>
            </section>
        </form>

    </section>
@endsection
