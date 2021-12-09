@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/log.css">
<div class="container">
  <div class="container__content">
  <div class="title">{{ __('Login') }}</div>
  <form method="POST" action="{{ route('login') }}" class="form">
      @csrf

      <label for="email" style="padding-top:13px">{{ __('E-Mail Address') }}</label>
      <input id="email" type="email" class="form-content" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <label for="password" style="padding-top:13px">{{ __('Password') }}</label>
      <input id="password" type="password" class="form-content" name="password" required autocomplete="current-password">

      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror


          <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                  </div>
              </div>
          </div>

          <button type="submit" class="btn btn-primary">
              {{ __('Login') }}
          </button>
          
          <a href="register">Create a new account</a>
      </form>
    </div>
</div>
@endsection
