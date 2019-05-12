@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col s5" background="background.jpg">
        {{-- <%#= image_tag "background.jpg", class:"background"%> --}}
    </div>
    <div class="col s6">
        <div class="container">
            <h3>Log in</h3>
    
            <form method="POST" action="{{ route('login') }}">
                <div class="field">
                    <label for="email">Email</label><br/>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="field">
                    <label for="password">Password</label><br />
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
                </label>
        
                <div class="actions">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
        
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
    <div class="col s1">
    </div>
</div>
@endsection
