@props([
    'icon' => null , 'uri' => null ,
    'name' ,
])
<h6 {!! $attributes->class('sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase')->toHtml()  !!}>
    <span>{{$name}}</span>
    <a class="link-secondary" href="{{$uri??'#'}}" aria-label="Add a new report">
        @unless(is_null($icon))
            {{$icon}}
        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle align-text-bottom" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
        @endunless
    </a>
</h6>
