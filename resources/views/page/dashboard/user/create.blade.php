@extends('layouts.dashboard')
@section('dashboard-title')
    <h1>create a new user </h1>
@endsection
@section('dashboard-content')
    <div class="row g-5">
        <div class="col-md-10 col-lg-10 m-auto mt-5">
            <form class="needs-validation" novalidate="">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="full_name" class="form-label">full name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="mr nerd panda"
                               value="{{old('full_name')}}">
                        <x-partials.field-error-printer name="name" />
                    </div>


                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" id="username"
                                   placeholder="Username" {{old('username')}}>
                            <x-partials.field-error-printer name="username" />
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="you@example.com" value="{{old('email')}}">
                        <x-partials.field-error-printer name="email" />
                    </div>
                    <div class="col-sm-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="password">
                        <x-partials.field-error-printer name="password" />
                    </div>
                    <div class="col-sm-6">
                        <label for="password" class="form-label">Password Repeat</label>
                        <input type="password" class="form-control" id="password" placeholder="password">
                        <x-partials.field-error-printer name="password" />
                    </div>
                    <div class="col-sm-12">
                        <label for="basic-url" class="form-label d-block">Roles</label>
                        <x-partials.field-error-printer name="password" />
                        <section class="input-group has-validation">
                            <select class="form-select bg-dark text-primary" multiple="" aria-label="multiple select example"
                                    name="roles[]" id="permissions">
                                <option value="test-role-2">test-role-1</option>
                            </select>
                        </section>
                    </div>
                </div>

                <hr class="my-4">

                <div class="form-check">
                    @php
                        $shouldChecked = !is_null(old('email_verified'));
                    @endphp
                    <input type="checkbox" class="form-check-input" id="email_verified"
                           name="email_verified" @checked($shouldChecked)>
                    <label class="form-check-label" for="email_verified">verified email</label>
                </div>
                <hr class="my-4">
                <section class="d-flex justify-content-around">
                    <button type="submit" class="btn px-5 btn-success">Save</button>
                    <button type="Reset" class="btn px-5 btn-danger">Reset</button>
                </section>
            </form>
        </div>
    </div>
@endsection
