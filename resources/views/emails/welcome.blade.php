@component('mail::message')
# Welcome, {{ $data['name'] }}

Thanks for registering at our store.

**Email:** {{ $data['email'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
