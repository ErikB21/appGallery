
@component('mail::message')
    # Welcome {{$user->name}}

    Sei già registrato? Fai il Login

    @component('mail::button', ['url' => route('login')])
       Login
    @endcomponent

    Altrimenti registrati..è gratis!

    @component('mail::button', ['url' => route('register')])
       Register
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
