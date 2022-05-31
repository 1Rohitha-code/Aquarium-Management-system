@extends('layouts.landing_page')

@section('content')

<div class="signup-form">
    <form action="{{ route('login') }}" method="POST">
        @csrf
		<h2>Login</h2>


        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>



		<div class="form-group">

            <button type="submit" class="btn btn-success btn-block btn-lg">{{ __('Login') }}</button>

        </div>
        @if (Route::has('password.request'))
        <div class="text-center">
        <a class="text-primary" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    </div>
    @endif
    </form>

</div>



@endsection

