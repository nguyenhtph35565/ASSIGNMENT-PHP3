@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row w-100 justify-content-center">
            <div class="col-lg-6 col-md-8 col-11">
                <div class="card border-0 shadow-lg rounded-lg overflow-hidden">
                    <div class="card-header bg-gradient-primary text-white text-center py-4">
                        <h2 class="mb-0">{{ __('Verify Your Email Address') }}</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <p class="mb-4">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                        <p>{{ __('If you did not receive the email') }},</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
