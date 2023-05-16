@props(['message'])
<x-alert class="bg-dark text-warning">
    <x-slot:message>
        {{$message}}
    </x-slot:message>
</x-alert>
