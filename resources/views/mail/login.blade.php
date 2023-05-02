<x-mail::message>
# Someone logged into your account

hey **{{$name}}** someOne with this ip **{{$ip}}** logged into your account
if you do this action ، ignore this email else change your password or contact
to help and support

Thanks,<br> {{ config('app.name') }}
</x-mail::message>
