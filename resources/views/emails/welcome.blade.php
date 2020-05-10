@component('mail::message')
# Hello, {{ $fullName }}

Welcome to UTeM Clinic Management System.
Here is your password to login out system : <b>{{ $password }}.</b>
<br>
<small>Please change it to a new one once you logon to our system.</small>

@component('mail::button', ['url' => $loginUrl])
Login now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
