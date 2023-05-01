@extends('layouts.bootstrap', ['bodyAttributes'=>['class'=>'text-center']])
@section('title')
    login
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('css/page/login.css')}}">
@endsection
@section('content')
    <main class="form-signin w-100 m-auto">
        <form action="{{route('login')}}" method="post">
            @csrf
            <img class="mb-4" src="{{asset('img/bootstrap-logo.svg')}}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me" name="remember"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
        </form>
    </main>
@endsection
