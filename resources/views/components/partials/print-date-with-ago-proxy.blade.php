@props(['date'])
@if(!is_null($date))
    {{ $date }}
    <br>
    {{ \App\Facades\DateServiceFacade::dateStrToCarbon($date)->ago() }}
@endif
