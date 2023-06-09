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
                            <x-partials.creator-name-printer-proxy :creator="$permission->creator" />
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
