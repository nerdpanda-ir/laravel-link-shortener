@extends('layouts.dashboard')
@php
    $hasOldPermissions = !is_null(old('permissions'));
    if ($hasOldPermissions)
        $oldPermissions = old('permissions');
@endphp
@section('dashboard-title')
    <h1> create a new role </h1>
@endsection
@section('dashboard-content')
    <x-partials.unique-warning field="role name"/>
    <hr>
    <x-partials.form-error-printer />
    <form method="post" action="{{route('dashboard.role.save')}}">
        @csrf
        <label for="name" class="form-label">Name</label>
        <div class="input-group has-validation mb-4">
            <span class="input-group-text">@</span>
            <input value="{{old('name')}}" type="text" class="form-control" id="name" placeholder="modify-something" name="name">
            @error('name')
            <div class="invalid-feedback d-block">
                {{$message}}
            </div>
            @enderror
        </div>

        <label for="basic-url" class="form-label d-block">Permissions</label>
        @if($permissions->isEmpty())
            <x-partials.warning-alert>
                <x-slot:message>
                    no found any permission for attach to role !!!
                    <a href='{{ route('dashboard.permission.create') }}' class="text-warning">create one</a>
                </x-slot:message>
            </x-partials.warning-alert>
        @endif
        <section class="input-group has-validation">
            <select class="form-select bg-dark text-primary" multiple aria-label="multiple select example"
                    name="permissions[]" id="permissions">
                @foreach($permissions as $permission)
                    @php
                        $shouldSelect = $hasOldPermissions && in_array($permission->name,$oldPermissions);
                    @endphp
                    <option value="{{$permission->name}}" @selected($shouldSelect)>{{$permission->name}}</option>
                @endforeach
            </select>
            @error('permissions')
            <div class="invalid-feedback d-block">
                {{$message}}
            </div>
            @enderror
        </section>
        <section class="d-flex mt-5 justify-content-around">
            <button class="btn btn-success btn-lg px-5" type="submit">Save</button>
            <button class="btn btn-danger btn-lg  px-5" type="reset">Reset</button>
        </section>
    </form>
@endsection
