@extends('layouts.dashboard')
@section('dashboard-title')
    <h1>
        {{trans('theme.dashboard.actions.view_all.body_title', ['total' => $roles->total()])}}
    </h1>
@endsection
@section('dashboard-content')
    @if($roles->isNotEmpty())
        <table class="table-hover table table-striped-columns table-sm table-bordered table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">creator</th>
                    @php
                        //@todo create page for display show users has this role
                        //@todo create page for dispay show permissions has this role
                        //@todo and these todo can be apply to permission !!!
                    @endphp
                    <th scope="col">user count</th>
                    <th scope="col">permission count</th>
                    <th scope="col">created</th>
                    <th scope="col">updated</th>
                    @canany(['delete-role','edit-role'])
                        <th scope="col">Actions</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->creator->name}}</td>
                        <td><a href="">{{$role->users_count}}</a></td>
                        <td><a href="">{{$role->permissions_count}}</a></td>
                        <td>
                            @unless(is_null($role->created_at))
                                {{$role->created_at}}
                                <br>
                                {{\DateServiceFacade::dateStrToCarbon($role->created_at)->ago()}}
                            @endif
                        </td>
                        <td>
                            @unless(is_null($role->updated_at))
                                {{$role->updated_at}}
                                <br>
                                {{\DateServiceFacade::dateStrToCarbon($role->updated_at)->ago()}}
                            @endif
                        </td>
                        @canany(['delete-role','edit-role'])
                            <td>
                                <section class="justify-content-evenly d-flex">
                                    @can('edit-role')
                                        <a href="" class="btn btn-warning text-dark float-start">Edit</a>
                                    @endcan
                                    @can('delete-role')
                                        <form action="" method="post" class="float-start">
                                                <button class="bg-danger btn text-light">Delete</button>
                                        </form>
                                    @endcan
                                </section>
                            </td>
                        @endcanany
                    </tr>
                @endforeach

            </tbody>
        </table>
    @else
        <x-alert class="bg-dark text-danger">
            <x-slot:message>
                <b>{{trans('theme.dashboard.no_result_found')}}</b>
            </x-slot:message>
        </x-alert>
    @endif
    @if($roles->total()>=1)
        {{$roles->links('pagination::bootstrap-5')}}
    @endif
@endsection
