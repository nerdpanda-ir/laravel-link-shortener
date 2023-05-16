@props(['field'])
<x-partials.warning-alert>
    <x-slot:message>
        {{ __('components.unique-warning', ['field' => $field]) }}
    </x-slot:message>
</x-partials.warning-alert>
