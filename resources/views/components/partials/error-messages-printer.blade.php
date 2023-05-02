@if(session()->has('system.messages.error'))
    @foreach(session()->get('system.messages.error') as $systemErrorItem)
        <x-alert class="alert-danger" :message="$systemErrorItem" />
    @endforeach
@endif
