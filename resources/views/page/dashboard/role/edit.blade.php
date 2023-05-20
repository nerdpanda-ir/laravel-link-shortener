@extends('layouts.dashboard')
@section('dashboard-title')
    <section class="w-100">
        <x-partials.primary-alert>
            <x-slot:message>
                ``{{$role->name}}`` role has {{$role->permissions_count}} Permissions and attached to {{$role->users_count}} Users !!!
            </x-slot:message>
        </x-partials.primary-alert>
        <h1>edit role ``{{$role->name}}``</h1>
    </section>
@endsection
@section('dashboard-content')
    <h1>hellow</h1>
@endsection
