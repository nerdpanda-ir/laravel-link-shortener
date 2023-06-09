@extends('layouts.dashboard')
@section('dashboard-title')
<h1> display all users ( total : {{$users->total()}} ) !!!</h1>
@endsection
@php
    #$users = $users->empty();
    /*
    "roles_count" => 0
     * */
@endphp
@section('dashboard-content')
    @if($users->isNotEmpty())
        <table class="table-hover table table-striped-columns table-sm table-bordered table-dark text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">full name</th>
                <th scope="col">id</th>
                <th scope="col">email</th>
                <th scope="col">email verified date</th>
                <th scope="col">role count</th>
                <th scope="col">create date</th>
                <th scope="col">update date</th>
                @canany(['edit-user','delete-user'])
                    <th scope="col">Actions</th>
                @endcanany
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->user_id}} </td>
                    <td> {{$user->email}} </td>
                    <td>
                        @if(is_null($user->email_verified_at))
                            <section class="text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-x" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-4.854-1.354a.5.5 0 0 0 0 .708l.647.646-.647.646a.5.5 0 0 0 .708.708l.646-.647.646.647a.5.5 0 0 0 .708-.708l-.647-.646.647-.646a.5.5 0 0 0-.708-.708l-.646.647-.646-.647a.5.5 0 0 0-.708 0Z"/>
                                </svg>
                            </section>
                        @else
                            {{$user->email_verified_at}}
                            <br>
                            {{DateServiceFacade::dateStrToCarbon($user->email_verified_at)->ago()}}
                        @endif
                    </td>
                    <td>{{$user->roles_count}}</td>
                    <td>
                        @unless(is_null($user->created_at))
                            {{$user->created_at}}
                            <br>
                            {{DateServiceFacade::dateStrToCarbon($user->created_at)->ago()}}
                        @endif
                    </td>
                    <td>
                        @unless(is_null($user->updated_at))
                            {{$user->updated_at}}
                            <br>
                            {{DateServiceFacade::dateStrToCarbon($user->updated_at)->ago()}}
                        @endif
                    </td>
                    @canany(['edit-user','delete-user'])
                        <td>
                            @can('edit-user')
                                <a href="{{route('dashboard.user.edit',[$user->id,$user->name])}}"
                                   class="btn-warning btn text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    </svg>
                                    Edit
                                </a>
                            @endcan
                            @can('delete-user')
                                <form action="{{route('dashboard.user.delete',[$user->id,$user->name])}}"
                                      method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn bg-danger text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            @endcan
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
    @if($users->total()>=1)
        {{$users->render('pagination::bootstrap-5')}}
    @endif
@endsection
