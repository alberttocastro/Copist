@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
        {{ __('Verify Your Email Address') }}

        @if (session('resent'))
        {{ __('A fresh verification link has been sent to your email address.') }}
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}, <a
            href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
    </div>
</div>
@endsection