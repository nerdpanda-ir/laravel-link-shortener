@props([
    'message'=> null
])
<div {!! $attributes->class(['alert'])->toHtml() !!} role="alert" {{$attributes->except('role')->toHtml()}}>
    {{$message}}
</div>
