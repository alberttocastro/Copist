@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
        <div class="container">
            <h3>Log in</h3>
            <form method="POST" action="{{ route('login') }}">
                <div class="row">
                    <div class="col s12">
                        <div class="field">
                            <label for="email">Email</label><br/>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="field">
                            <label for="password">Password</label><br />
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col s12">
                        <label for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>{{ __('Remember Me') }}</span>
                        </label>
                    </div>
                    <div class="col s12" style="margin-top: 2em">
                        <div class="actions">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="col s12" style="margin-top: 1em">
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </div>        
            </form>
        </div>
    </div>
</div>
@endsection
