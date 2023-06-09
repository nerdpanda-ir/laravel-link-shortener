@extends('layouts.dashboard')
@section('dashboard-title')
    <h1>create new permission</h1>
@endsection
@section('dashboard-content')
    <x-partials.unique-warning field="permission name"></x-partials.unique-warning>
    <hr class="my-4">
    <x-partials.form-error-printer />
    <form class="needs-validation" novalidate="" action="{{route('dashboard.permission.store')}}" method="post">
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input value="{{old('name')}}" type="text" class="form-control" id="name" placeholder="modify-something" name="name">
                    @error('name')
                    <div class="invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
    </form>
@endsection
