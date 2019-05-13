@extends('layouts.auth')

@section('content')

<div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
        <h3>{{ __('Reset Password') }}</h3>


        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password">

            @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" name="password_confirmation" required
                autocomplete="new-password">

            <button type="submit">
                {{ __('Reset Password') }}
            </button>
        </form>
    </div>
</div>

@endsection