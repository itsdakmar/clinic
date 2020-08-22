@component('mail::message')
# Hello, {{ $fullName }}

Welcome to UTeM Clinic Management System.
Please click the button below to verify your account.
<br>

@component('mail::button', ['url' => $url])
Login now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
