@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/log.css">
<div class="container">
    <div class="container__content">

    <div class="title">{{ __('Register') }}</div>

    <form method="POST" action="{{ route('register') }}" class="form">
        @csrf

        <label for="name" style="padding-top:13px">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-content" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="email" style="padding-top:13px">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-content" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="password" style="padding-top:13px">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-content" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="password-confirm" style="padding-top:13px">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-content" name="password_confirmation" required autocomplete="new-password">

        <hr>
        <button type="submit" class="btn">
            {{ __('Register') }}
        </button>
        
        <a href="login">Already have an account?</a>

    </form>

  </div>
</div>
@endsection
