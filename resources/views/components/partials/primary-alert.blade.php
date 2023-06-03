@props(['message'])
<x-alert {{$attributes->class('alert-primary')}}>
    <x-slot:message>
        {!! $message !!}
    </x-slot:message>
</x-alert>
