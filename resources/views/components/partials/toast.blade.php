@props([
    'title' => 'Bootstrap' ,
    'dateTime' => 'just now' ,
    'logo' => asset('img/bootstrap-logo.svg') ,
    'content' => ''
])
@php($toastAttributes = $attributes->except(['role','aria-live','aria-atomic','class'])->toHtml())
<div {!! $attributes->class(['toast'])->toHtml() !!} role="alert" aria-live="assertive" aria-atomic="true" {!! $toastAttributes !!}>
    <div class="toast-header">
        <img src="{{$logo}}" class="rounded me-2" width="24" height="24">
        <strong class="me-auto">{{$title}}</strong>
        <small class="text-body-secondary">{{ $dateTime }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        {{ $content }}
    </div>
</div>
