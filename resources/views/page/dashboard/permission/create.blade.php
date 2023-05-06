@extends('layouts.dashboard')
@section('dashboard-title')
    <h1>create new permission</h1>
@endsection
@section('dashboard-content')
    <x-alert class="bg-dark text-warning">
        <x-slot:message>
            name should be unique when you create a new permission care that !!!
        </x-slot:message>
    </x-alert>
    <hr class="my-4">
    <form class="needs-validation" novalidate="" action="{{route('dashboard.permission.store')}}" method="post">
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="name" placeholder="modify-something" name="name">
                    <div class="invalid-feedback">
                        Your username is required.
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
    </form>

@endsection
