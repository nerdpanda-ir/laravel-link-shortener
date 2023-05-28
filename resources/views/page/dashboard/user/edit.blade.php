@extends('layouts.dashboard')
@section('dashboard-title')
    <h1> Edit User {{ $user->name }}</h1>
@endsection
@section('dashboard-content')
    @php
        /** @var \Illuminate\Database\Eloquent\Collection $roles*/
        /** @var \App\Models\User $user */
        dump(get_defined_vars());
    @endphp
    <x-partials.form-error-printer />
    <div class="row g-5">
        <div class="col-md-10 col-lg-10 m-auto mt-5">
            <form class="needs-validation" novalidate=""
                  action="{{route('dashboard.user.update',[$user->id,$user->name])}}" method="post">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="full_name" class="form-label">full name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="mr nerd panda"
                               value="{{old('full_name',$user->name)}}" name="full_name">
                        <x-partials.field-error-printer name="full_name" />
                    </div>
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" id="username"
                                   placeholder="Username" value="{{old('username',$user->user_id)}}" name="username">
                            <x-partials.field-error-printer name="username" />
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="you@example.com"
                               value="{{old('email',$user->email)}}" name="email">
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
                        @if(isset($roles) and $roles->isEmpty() and $user->roles->isEmpty())
                            <x-partials.warning-alert>
                                <x-slot:message>
                                    NO FOUND ANY ROLE IN SYSTEM ،‌ PLEASE CREATE ONE !!!
                                </x-slot:message>
                            </x-partials.warning-alert>
                        @else
                            <section class="input-group has-validation">
                                <select class="form-select bg-dark text-primary" multiple=""
                                        aria-label="multiple select example" name="roles[]"
                                        id="permissions" @disabled(!isset($roles))>
                                    @if(isset($roles))
                                        @php
                                            $hasOldRoles = !is_null(old('roles')) && is_array(old('roles'));
                                            if($hasOldRoles)
                                                $oldRoles = old('roles');
                                        @endphp
                                        @foreach($user->getRelation('roles') as $role)
                                            @php
                                                $shouldBeSelect = !$hasOldRoles xor ($hasOldRoles && in_array($role,$oldRoles));
                                            @endphp
                                            <option @selected($shouldBeSelect)>{{$role->name}}</option>
                                        @endforeach
                                        @foreach($roles as $role)
                                            @php
                                                $shouldBeSelect = $hasOldRoles && in_array($role->name,$oldRoles);
                                            @endphp
                                            <option @selected($shouldBeSelect)>{{$role->name}}</option>
                                        @endforeach
                                    @endif
                                    <option>test</option>
                                </select>
                            </section>
                        @endif
                    </div>
                </div>

                <hr class="my-4">

                <div class="form-check">
                    @php
                        $shouldBeDisable = !array_key_exists('email_verified_at',$user->getAttributes());
                        $shouldBeChecked = !$shouldBeDisable &&
                                           (!is_null($user->email_verified_at) || !is_null(old('email_verified')));
                    @endphp
                    <input type="checkbox" class="form-check-input" id="email_verified"
                           name="email_verified" @disabled($shouldBeDisable) @checked($shouldBeChecked)>
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
