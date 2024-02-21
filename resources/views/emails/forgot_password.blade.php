@component('mail::message')

Hi, {{ $user->name }}, Forgot YOur Password?

<p>It happens. click the link below to reset your password.</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
	Reset Your Password
@endcomponent

<p>In case you have any issue recovering your password, please contact us using the form from contact-us page
Thanks,</p>

{{ config('app.name') }}

@endcomponent