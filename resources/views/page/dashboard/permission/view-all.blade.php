@extends('layouts.dashboard')
@php
    // @todo
    $total = $permissions->total();
@endphp
@section('dashboard-title')
    <h1>{{trans('theme.dashboard.pages.permissions.view_all.body_title', ['total' => $total])}}</h1>
@endsection
@section('dashboard-content')
    @unless($permissions->isEmpty())
        <div class="table-responsive">
            <table class="table table-striped-columns table-sm table-bordered table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">user count</th>
                        <th scope="col">role count</th>
                        <th scope="col">creator</th>
                        <th scope="col">created</th>
                        <th scope="col">updated</th>
                        @canany(['edit-permission','delete-permission'])
                            <th scope="col">Actions</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                @foreach($permissions->all() as $permission)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$permission->name}}</td>
                        <td><a href="#">{{$permission->users_count}}</a> </td>
                        <td><a href="">{{$permission->roles_count}}</a></td>
                        <td>
                            @unless(is_null($role->creator))
                                {{$role->creator->name}}
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                            @endunless
                        </td>
                        <td>
                            @if(!is_null($permission->created_at))
                                {{$permission->created_at}}
                                <br>
                                {{\DateServiceFacade::dateStrToCarbon($permission->created_at)?->ago()}}
                            @endif
                        </td>
                        <td>
                            @if(!is_null($permission->updated_at))
                                {{$permission->updated_at}}
                                <br>
                                {{\DateServiceFacade::dateStrToCarbon($permission->updated_at)?->ago()}}
                            @endif
                        </td>
                        @canany(['edit-permission','delete-permission'])
                            <td class="">
                                <section class="d-flex justify-content-evenly">
                                    @can('edit-permission')
                                        <a href="{{route('dashboard.permission.edit',[$permission->id,$permission->name])}}"
                                           class="btn btn-warning text-dark">{{trans('theme.dashboard.edit_btn')}}</a>
                                    @endcan
                                    @can('delete-permission')
                                        <form action="{{route('dashboard.permission.delete' ,[$permission->id,$permission->name])}}" method="post">
                                            @csrf
                                            @method('DELETE')
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
        </div>
    @else
        <x-alert class="bg-black text-danger">
            <x-slot:message>
                <h1>no result found !!!</h1>
            </x-slot:message>
        </x-alert>
    @endunless
    @if($total>0)
        {{$permissions->links('pagination::bootstrap-5')}}
    @endif
@endsection
