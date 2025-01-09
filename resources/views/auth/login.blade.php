@extends('layouts.app')

@section('content')
<style>
    body {
        background: url('https://wallpapers.com/images/hd/cozy-library-evening-jpg-85ys19olhyvt4ysm.jpg') no-repeat center center fixed;
        background-size: cover;
        color: #1c1c1e;
        margin: 0;
        padding: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        position: relative;
        height: 100vh;
    }

    /* Overlay for darkening the background */
    .background-overlay {
        position: fixed;
        /* Tetap mengikuti layar meskipun di-scroll */
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        /* Menutupi seluruh tinggi viewport */
        background-color: rgba(0, 0, 0, 0.6);
        z-index: -1;
        /* Tetap di belakang konten utama */
    }


    .welcome-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        position: relative;
        z-index: 1;
    }

    .welcome-text {
        text-align: center;
        color: #ffffff;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 40px;
        text-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
    }

    .card {
        background-color: rgba(255, 255, 255, 0.85);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        border: none;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        width: 100%;
        max-width: 400px;
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

<div class="background-overlay"></div>

<div class="welcome-container">
    <div class="welcome-text">
        Selamat Datang Di Web Perpustakaan Nusantara
    </div>
    <div class="card shadow">
        <div class="card-body p-5">
            <h2 class="text-center mb-4" style="font-weight: 600;">Sign in to your account</h2>
            <form method="POST" action="/proseslogin">
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