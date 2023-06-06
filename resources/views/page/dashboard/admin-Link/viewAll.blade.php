@extends('layouts.dashboard')
@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $links */
@endphp
@section('dashboard-title')
    <h1>view links (total:{{$links->total()}})</h1>
@endsection
@section('dashboard-content')
    @if($links->isNotEmpty())
        <table class="table-hover table table-striped-columns table-sm table-bordered table-dark text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Original</th>
                <th scope="col">Summary</th>
                <th scope="col">creator</th>
                <th scope="col">View Count</th>
                <th scope="col">Created</th>
                <th scope="col">updated</th>
                @canany(['edit-link','delete-link'])
                    <th scope="col">actions</th>
                @endcanany
            </tr>
            </thead>
            <tbody>
                @php
                    /** @var \App\Models\Link $link */
                @endphp
                @foreach($links as $link)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td>
                            <a href="{{$link->original}}" class="text-warning"> {{$link->original}} </a>
                        </td>
                        <td>
                            <a href="{{$link->summaryUrl}}" class="text-danger"> {{$link->summary}} </a>
                        </td>
                        <td>
                            <a href="user-links/" class="text-warning">{{$link->getRelation('creator')->name}}</a>
                        </td>
                        <td>{{$link->view_count}}</td>
                        <td>
                            <x-partials.print-date-with-ago-proxy :date="$link->created_at" />
                        </td>
                        <td>
                            <x-partials.print-date-with-ago-proxy :date="$link->updated_at" />
                        </td>
                        @canany(['edit-link','delete-link'])
                            <td>
                                @can('edit-link')
                                   <a class="btn btn-warning text-dark mb-2"
                                      href="{{route('dashboard.admin_link.edit',[$link->id])}}?link={{$link->original}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
                                        </svg>
                                        Edit
                                    </a>
                                @endcan
                                @can('delete-link')
                                   <form action="{{route('dashboard.admin_link.delete',[$link->id])}}?link={{$link->original}}"
                                         method="post">
                                       @csrf
                                       @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
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
        <x-partials.warning-alert>
            <x-slot:message> {{trans('messages.not_found', ['item' => 'link'])}} </x-slot:message>
        </x-partials.warning-alert>
    @endif
    @if($links->total()>0)
        {{$links->render('pagination::bootstrap-5')}}
    @endif
@endsection
