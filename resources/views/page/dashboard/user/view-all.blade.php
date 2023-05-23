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
                                <h1>edit user </h1>
                            @endcan
                            @can('delete-user')
                                <h1>delete user </h1>
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
