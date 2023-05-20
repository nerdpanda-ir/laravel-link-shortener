@props(['message'])
<x-alert class="alert-primary">
    <x-slot:message>
        {!! $message !!}
    </x-slot:message>
</x-alert>
