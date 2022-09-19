@extends('templates.userLayout')
@section('title', 'Arahin - Login Page')

@section('content')
    <div class="row justify-content-center m-5">
        <div class="col-lg-6">
            <main class="border border-danger rounded p-3">
                <h1 class="h3 mb-3 fw-normal text-center">Arahin - {{ __('Reset Password') }}</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row m-3">
                            <div class="col-md-12 mb-3">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Address" autofocus required value="{{old('email')}}">
                                    @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-dark rounded">
                                    {{ __('Send Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>

            </main>
        </div>
    </div>
@endsection
