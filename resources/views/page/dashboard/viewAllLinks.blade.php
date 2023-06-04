@extends('layouts.dashboard')
@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $links*/
@endphp
@section('dashboard-title')
    <h1>Display Your Links (total:{{$links->total()}})</h1>
@endsection
@section('dashboard-content')
    @if($links->isNotEmpty())
        <table class="table-hover table table-striped-columns table-sm table-bordered table-dark text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Real Url</th>
                <th scope="col">Summary Url</th>
                <th scope="col">View Count</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
                @foreach($links->all() as $link)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td>
                            <a href="{{ $link->original  }}" class="text-warning">{{ $link->original  }}</a>
                        </td>
                        <td>
                            <a href="{{$link->summary_url}}" class="text-danger">
                                {{$link->summary}}
                            </a>
                        </td>
                        <td> {{ $link->view_count  }} </td>
                        <td>
                            {{$link->created_at}}
                            <br>
                            {{ DateServiceFacade::dateStrToCarbon($link->created_at)->ago() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <x-partials.warning-alert>
            <x-slot:message> no found any link for display here !!! </x-slot:message>
        </x-partials.warning-alert>
    @endif
    @if($links->total()>0)
        {{$links->render('pagination::bootstrap-5')}}
    @endif
@endsection

