@props(['field'])
<x-alert class="bg-dark text-warning">
    <x-slot:message>
        {{ __('components.unique-warning', ['field' => $field]) }}
    </x-slot:message>
</x-alert>
