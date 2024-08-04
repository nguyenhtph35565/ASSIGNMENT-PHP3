@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center min-vh-100"
        style="background: linear-gradient(to bottom right, #ff7e5f, #feb47b);">
        <div class="row w-100 justify-content-center">
            <div class="col-lg-5 col-md-7 col-10">
                <div class="card border-0 shadow-lg rounded-lg overflow-hidden">
                    <div class="card-header text-white text-center py-5"
                        style="background: linear-gradient(to right, #ff4b1f, #ff9068);">
                        <h2 class="mb-0">{{ __('Login') }}</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-check mb-4">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-lg btn-block"
                                    style="background: linear-gradient(to right, #36d1dc, #5b86e5); color: white; transition: background-color 0.3s, transform 0.3s;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="btn btn-link text-decoration-none text-primary"
                                        href="{{ route('password.request') }}"
                                        style="transition: color 0.3s, text-decoration 0.3s;">{{ __('Forgot Your Password?') }}</a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .form-control-lg:hover,
    .form-control-lg:focus {
        border-color: #ff7e5f;
        box-shadow: 0 0 8px rgba(255, 126, 95, 0.5);
    }

    .btn:hover {
        background: linear-gradient(to right, #5b86e5, #36d1dc);
        transform: scale(1.05);
    }

    .btn-link:hover {
        color: #ff4b1f;
        text-decoration: underline;
    }
</style>
