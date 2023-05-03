<x-mail::message>
# {{trans('mail/login.title')}}

{{trans('mail/login.content', ['name' => $name, 'ip' => $ip , 'dateTime' => $dateTime ])}}

Thanks,<br> {{ config('app.name') }}
</x-mail::message>
