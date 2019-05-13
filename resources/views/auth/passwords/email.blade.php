@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
        <h3>{{ __('Reset Password') }}</h3>

        @if (session('status'))
        {{ session('status') }}
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
    </div>
</div>
@endsection