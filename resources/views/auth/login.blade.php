@extends('templates.userLayout')
@section('title', 'Login Page - Arahin Media Kreasi')
@section('content')

<div class="row justify-content-center m-5">
  <div class="col-lg-4">
    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Arahin - Sign In</h1>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-floating mb-1">
          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username or Email" autofocus required value="{{old('username')}}">
          @error('username') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" required>
          @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <button class="w-100 btn btn-lg btn-dark rounded" type="submit">Sign in</button>
        <small class="text-center d-block mt-3">Not Registered ? <a href="/register">Register Now!</a></small>
        @if (Route::has('password.request'))
          <small class="text-center d-block mt-3">
            Or
            <a href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
            </a>
          </small>
        @endif
      </form>
    </main>

  </div>
</div>

@endsection
