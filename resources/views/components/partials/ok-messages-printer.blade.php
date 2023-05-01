@if(session()->has('system.messages.ok'))
    <section class="mt-2">
        @foreach(session('system.messages.ok') as $message)
            <x-alert class="alert-success" :message="$message"/>
        @endforeach
    </section>

@endif
