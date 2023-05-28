@extends('layouts.dashboard')
@section('dashboard-title')
    <h1>create a new user </h1>
@endsection
@section('dashboard-content')
    <x-partials.form-error-printer />
    <div class="row g-5">
        <div class="col-md-10 col-lg-10 m-auto mt-5">
            <form class="needs-validation" novalidate="" action="{{route('dashboard.user.save')}}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="full_name" class="form-label">full name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="mr nerd panda"
                               value="{{old('full_name')}}" name="full_name">
                        <x-partials.field-error-printer name="full_name" />
                    </div>


                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" id="username"
                                   placeholder="Username" value="{{old('username')}}" name="username">
                            <x-partials.field-error-printer name="username" />
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="you@example.com"
                               value="{{old('email')}}" name="email">
                        <x-partials.field-error-printer name="email" />
                    </div>
                    @php
                        $shouldBeDisable = !$can_set_password_for_user;
                    @endphp
                    <div class="col-sm-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="password"
                               name="password" @disabled($shouldBeDisable)>
                        <x-partials.field-error-printer name="password" />
                    </div>
                    <div class="col-sm-6">
                        <label for="password" class="form-label">Password Repeat</label>
                        <input type="password" class="form-control" id="password" placeholder="password"
                               name="password_confirmation" @disabled($shouldBeDisable)>
                        <x-partials.field-error-printer name="password_confirmation" />
                    </div>
                    <div class="col-sm-12">
                        <label for="basic-url" class="form-label d-block">Roles</label>
                        <x-partials.field-error-printer name="roles" />
                        @if($can_attach_role_to_user and $roles->isEmpty())
                            <x-partials.warning-alert>
                                <x-slot:message>
                                    no found any role in system !!!
                                </x-slot:message>
                            </x-partials.warning-alert>
                        @else
                                <section class="input-group has-validation">
                                    <select class="form-select bg-dark text-primary" multiple="" aria-label="multiple select example"
                                            name="roles[]" id="permissions" @disabled(!$can_attach_role_to_user)>
                                        @if($can_attach_role_to_user)
                                            @php
                                                $oldRoles = old('roles',[]);
                                            @endphp
                                            @foreach($roles as $role)
                                                @php
                                                    $shouldSelected = in_array($role->name,$oldRoles);
                                                @endphp
                                                <option @selected($shouldSelected)>{{$role->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </section>
                            </div>
                        @endif
                </div>

                <hr class="my-4">

                <div class="form-check">
                    @php
                        $shouldChecked = $can_verify_user_email && !is_null(old('email_verified'));
                    @endphp
                    <input type="checkbox" class="form-check-input" id="email_verified"
                           name="email_verified" @checked($shouldChecked) @disabled(!$can_verify_user_email)>
                    <label class="form-check-label" for="email_verified">verified email</label>
                    <x-partials.field-error-printer name="email_verified"/>
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
