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
            <form class="needs-validation mt-5" novalidate="" action="{{route('link.save')}}"
                  method="post">
                @csrf
                <div class="col-sm-10 d-inline-block mx-4">
                    <label for="url" class="form-label">Links : </label>
                    <input type="text" class="form-control" id="url" placeholder="https://google.com"
                           value="{{old('url')}}" name="url">
                </div>
                <button class="btn btn-primary position-relative" type="submit" style="bottom: 4px"> Generate </button>
                <x-partials.field-error-printer name="url" class="mt-2 mx-4"/>
            </form>
        </section>
    </main>
@endsection