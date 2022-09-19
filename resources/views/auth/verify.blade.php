@extends('templates.userLayout')
@section('title', 'Verify Page')
@section('content')
<div class="row justify-content-center m-5">
    <div class="col-lg-8">
        <main class="border border-danger rounded p-3">
            <h1 class="h3 mb-3 fw-normal text-center">{{ __('Verify Your Email Address') }}</h1>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-dark mt-3 rounded">{{ __('Resend Link') }}</button>
                    </form>

            </div>
        </div>
    </div>
@endsection
