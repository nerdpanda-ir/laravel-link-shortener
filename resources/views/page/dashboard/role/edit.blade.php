@extends('layouts.dashboard')
@php
    $hasOldPermissions = !is_null(old('permissions'));
    if ($hasOldPermissions)
        $oldPermissions = old('permissions');
@endphp
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
    <x-partials.unique-warning field="name" />
    <x-partials.form-error-printer />
    <form method="post" action="{{route('dashboard.role.update',[$role->id,$role->name])}}">
        @method('PUT')
        @csrf
        <label for="name" class="form-label">Name</label>
        <div class="input-group has-validation mb-4">
            <span class="input-group-text">@</span>
            <input value="{{old('name',$role->name)}}" type="text" class="form-control"
                   id="name" placeholder="modify-something" name="name">

            @error('name')
                <div class="invalid-feedback d-block">
                    {{$message}}
                </div>
            @enderror
        </div>
        <label for="basic-url" class="form-label d-block">Permissions</label>
        <section class="input-group has-validation">
            <select class="form-select bg-dark text-primary" multiple=""
                    aria-label="multiple select example" name="permissions[]" id="permissions">
                @unless($hasOldPermissions)
                    @foreach($role->permissions as $permission)
                        <option selected>{{$permission->name}}</option>
                    @endforeach
                    @foreach($permissions as $permission)
                        <option>{{$permission->name}}</option>
                    @endforeach
                @else
                    @php
                        $permissionsList = array_merge(
                            $role->getRelation('permissions')->pluck('name')->toArray(),
                            $permissions->pluck('name')->toArray()
                        );
                    @endphp
                    @foreach($permissionsList as $permissionItem)
                        @php
                            $shouldSelect = in_array($permissionItem,$oldPermissions);
                        @endphp
                        <option @selected($shouldSelect)>{{$permissionItem}}</option>
                    @endforeach
                @endunless
            </select>
        </section>
        <section class="d-flex mt-5 justify-content-around">
            <button class="btn btn-success btn-lg px-5" type="submit">Save</button>
            <button class="btn btn-danger btn-lg  px-5" type="reset">Reset</button>
        </section>
    </form>
@endsection
