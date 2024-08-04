@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center min-vh-100"
        style="background: linear-gradient(to bottom right, #a1c4fd, #c2e9fb);">
        <div class="row w-100 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg rounded-lg overflow-hidden">
                    <div class="card-header text-white text-center py-4"
                        style="background: linear-gradient(to right, #1c92d2, #f2fcfe);">
                        <h2 class="mb-0">{{ __('Reset Password') }}</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        @if (session('status'))
                            <div class="alert alert-success mb-4" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-4">
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

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="background: linear-gradient(to right, #36d1dc, #5b86e5); color: white; transition: background-color 0.3s, transform 0.3s;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    /* Hiệu ứng hover cho nút */
    .btn-primary:hover {
        background: linear-gradient(to right, #5b86e5, #36d1dc);
        transform: scale(1.05);
    }

    /* Hiệu ứng hover cho trường nhập liệu */
    .form-control-lg:hover,
    .form-control-lg:focus {
        border-color: #5b86e5;
        box-shadow: 0 0 8px rgba(91, 134, 229, 0.5);
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }
</style>
