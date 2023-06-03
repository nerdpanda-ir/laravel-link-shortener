@props([
    'message'=> null
])
<div {!! $attributes->class(['alert']) !!} role="alert" {{$attributes->except(['role','class'])->toHtml()}}>
    {{$message}}
</div>
