@extends('layouts.frontPage')
@section('title')
    CREATE A NEW LINK
@endsection
@section('content')
    @parent
    <main class="mt-5">
        <section class="container">
            <h1>CREATE A NEW LINK</h1>
            <x-partials.form-error-printer class="mt-5 mb-5"/>
            <x-partials.create-link-form action="{{route('link.save')}}" />
        </section>
    </main>
@endsection
