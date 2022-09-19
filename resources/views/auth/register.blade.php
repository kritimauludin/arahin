@extends('templates.userLayout')
@section('title', 'Register Page - Arahin Media Kreasi')
@section('content')

<style>

</style>

<div class="row justify-content-center m-5">
  <div class="col-lg-4">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal text-center">Arahin - Registration</h1>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-floating mb-1">
          <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
          @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-floating mb-1">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
          @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-floating mb-1">
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{old('username')}}" required>
          @error('username')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div> 

        <div class="form-floating mb-1">
          <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
          @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-floating ">
          <input type="password" class="form-control rounded-bottom" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required>         
        </div>

        <button class="w-100 btn btn-lg btn-dark mt-3 rounded" type="submit">Register</button>
      </form>
      <small class="text-center d-block mt-3">Already Registered ? <a href="/login">Login Now!</a></small>
    </main>

  </div>
</div>

@endsection
