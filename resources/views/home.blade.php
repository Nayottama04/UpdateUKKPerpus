@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); background-color: #fff;">
                <div class="card-header" style="background-color: #333; color: #fff; border-radius: 8px 8px 0 0; text-align: center; padding: 16px;">
                    <h3>{{ __('Dashboard') }}</h3>
                </div>

                <div class="card-body" style="padding: 32px; font-family: 'Arial', sans-serif;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="background-color: #28a745; color: white; border-radius: 4px; padding: 10px; margin-bottom: 20px;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="text-align: center; margin-top: 30px;">
                        <h2 style="font-size: 2rem; color: #333; font-weight: 600;">Kamu Sudah Masuk OOOMAGAAA.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f4f7fa;
        font-family: 'Roboto', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #333;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 16px;
        text-align: center;
    }

    .card-body {
        padding: 32px;
    }

    h2 {
        font-size: 2rem;
        font-weight: 600;
        color: #333;
    }

    .alert {
        padding: 12px;
        background-color: #28a745;
        color: white;
        border-radius: 4px;
        margin-bottom: 20px;
    }
</style>

@endsection
