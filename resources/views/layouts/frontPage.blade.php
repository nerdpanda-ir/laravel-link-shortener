@extends('layouts.bootstrap')
@section('content')
    <x-partials.nav />
    @if(session()->has('system.messages.error') || session()->has('system.messages.ok'))
        <section class="mt-5 mb-5 container">
            <x-partials.system-messages-printer />
        </section>
    @endif
@endsection
