@extends('layouts.bootstrap')
@section('title')
    Register
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('css/page/register.css')}}">
@endsection
@section('content')
    <div class="container">
        <main>
            <div class="row g-5 mt-4">
                <div class="col-md-10 col-lg-10 m-auto mt-5">
                    <h4 class="mb-3 text-center">Register now</h4>
                    <x-partials.form-error-printer />
                    <form class="needs-validation" novalidate action="{{route('do-register')}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="full_name" placeholder="john smith"
                                       value="{{old('full_name')}}" name="full_name">
                                <x-partials.field-error-printer name="full_name"/>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username"
                                           placeholder="Username" name="username" value="{{old('username')}}">
                                    <x-partials.field-error-printer name="username"/>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="you@example.com" value="{{old('email')}}">
                                <x-partials.field-error-printer name="email"/>
                            </div>

                            <div class="col-sm-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password"
                                       name="password" placeholder="1234">
                                <x-partials.field-error-printer name="password"/>
                            </div>
                            <div class="col-sm-6">
                                <label for="password_confirmation" class="form-label">Password Repeat</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       name="password_confirmation" placeholder="1234">
                                <x-partials.field-error-printer name="password_confirmation"/>
                            </div>

                        </div>

                        <div class="form-check mt-4">
                            @php
                                $shouldBeUncheck = session()->has('_old_input') && is_null(old('accept_rules'));
                            @endphp
                            <input type="checkbox" class="form-check-input" name="accept_rules"
                                   id="accept_rules" @checked(!$shouldBeUncheck)>
                            <label class="form-check-label" for="accept_rules"> accept rules </label>
                            <x-partials.field-error-printer name="accept_rules"/>
                        </div>

                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">&copy; 2017–2023 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

@endsection
