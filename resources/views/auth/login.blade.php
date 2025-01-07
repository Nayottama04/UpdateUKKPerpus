@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f5f5f7;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        color: #1c1c1e;
        margin: 0;
        padding: 0;
    }

    .card {
        background-color: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 20px;
    }

    .form-control {
        background-color: #f2f2f7;
        border: 1px solid #d1d1d6;
        font-size: 16px;
        color: #1c1c1e;
        height: 50px;
        border-radius: 10px;
    }

    .form-control:focus {
        background-color: #ffffff;
        border-color: #007AFF;
        box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.3);
    }

    .form-check-input:checked {
        background-color: #007AFF;
        border-color: #007AFF;
    }

    .btn-primary {
        height: 50px;
        border-radius: 10px;
        background-color: #007AFF;
        border: none;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #005bb5;
    }

    .text-decoration-none {
        color: #007AFF;
    }

    .text-decoration-none:hover {
        text-decoration: underline;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow" style="width: 100%; max-width: 400px;">
        <div class="card-body p-5">
            <h2 class="text-center mb-4" style="font-weight: 600;">Sign in to your account</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="form-label" style="font-weight: 500;">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label" style="font-weight: 500;">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember" style="font-size: 14px;">
                            Remember me
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none" href="{{ route('password.request') }}" style="font-size: 14px;">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
