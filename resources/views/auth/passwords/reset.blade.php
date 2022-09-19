@extends('templates.userLayout')
@section('title', 'Arahin - Login Page')

@section('content')
    <div class="row justify-content-center m-5">
        <div class="col-lg-6">
            <main class="border border-danger rounded p-3">
                <h1 class="h3 mb-3 fw-normal text-center">Arahin - {{ __('Reset Password') }}</h1>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->token }}">

                        <div class="form-floating mb-1">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" readonly value="{{ $request->email ?? old('email') }}">
                            @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-floating mb-1">
                            <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" name="password" autofocus placeholder="New Password" required>
                            @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                          </div>
                  
                          <div class="form-floating">
                            <input type="password" class="form-control rounded-bottom" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required>         
                          </div>

                        <button class="w-100 btn btn-lg btn-dark mt-3 rounded" type="submit">{{ __('Reset Password') }}</button>
                    </form>

            </div>
        </div>
    </div>
</div>
@endsection
