@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center min-vh-100"
        style="background: linear-gradient(to bottom right, #a1c4fd, #c2e9fb);">
        <div class="row w-100 justify-content-center">
            <div class="col-lg-6 col-md-8 col-11">
                <div class="card border-0 shadow-lg rounded-lg overflow-hidden">
                    <div class="card-header text-white text-center py-4"
                        style="background: linear-gradient(to right, #1c92d2, #f2fcfe);">
                        <h2 class="mb-0">{{ __('Register') }}</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control form-control-lg"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-lg btn-block"
                                    style="background: linear-gradient(to right, #36d1dc, #5b86e5); color: white; transition: background-color 0.3s, transform 0.3s;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control-lg:hover {
            border-color: #36d1dc;
            box-shadow: 0 0 8px rgba(54, 209, 220, 0.5);
        }

        .form-control-lg:focus {
            border-color: #5b86e5;
            box-shadow: 0 0 8px rgba(91, 134, 229, 0.5);
        }

        .btn:hover {
            background: linear-gradient(to right, #5b86e5, #36d1dc);
            transform: scale(1.05);
        }
    </style>
@endsection
