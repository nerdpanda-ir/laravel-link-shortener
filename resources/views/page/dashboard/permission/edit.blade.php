@extends('layouts.dashboard')
@section('dashboard-title')
    <h1> Edit Permission `` {{$name}} ``</h1>
@endsection
@section('dashboard-content')
    <x-partials.form-error-printer />
    <form class="needs-validation" novalidate=""
          action="{{route('dashboard.permission.update',$name)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input value="{{old('name',$name)}}" type="text" class="form-control" id="name"
                           placeholder="modify-something" name="name">
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-dark btn-lg" type="submit">Update</button>
    </form>
@endsection
