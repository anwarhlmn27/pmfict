<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Penjaminan Mutu FICT</title>

    <!-- Favicon Icon Bawaan Template -->
    <link rel="shortcut icon" href="{{ asset('img/logo_college.png') }}">

    <!-- Stylesheet Bawaan Template di public/css -->
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background-color: #f4f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 15px;
            font-size: 14.5px;
            line-height: 1.6;
        }
        .login-wrapper {
            width: 100%;
            max-width: 400px;
        }
        .login-card {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(15, 41, 66, 0.06);
            background: #ffffff;
            padding: 32px 28px;
        }
        .login-logo {
            max-height: 46px;
            width: auto;
        }
        .login-title {
            font-size: 20px !important;
            line-height: 1.3 !important;
            letter-spacing: -0.3px !important;
            color: #0f2942;
        }
        .form-label {
            font-size: 13.5px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
            display: block;
        }
        .form-control-login {
            height: 42px;
            font-size: 14px;
            border: 1px solid #cbd5e1 !important;
            border-radius: 6px;
            padding: 8px 12px;
            width: 100%;
            color: #1e293b;
            background-color: #fff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .form-control-login:focus {
            border-color: #086ad7 !important;
            box-shadow: 0 0 0 3px rgba(8, 106, 215, 0.12) !important;
        }
        .btn-submit {
            background-color: #086ad7;
            border: 1px solid #086ad7;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            height: 42px;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .btn-submit:hover {
            background-color: #0652a5;
            border-color: #0652a5;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <!-- Header & Logo -->
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="d-inline-block mb-2">
                    <img src="{{ asset('img/fict.png') }}" alt="PM FICT Logo" class="login-logo">
                </a>
                <h4 class="login-title font-weight-bold mb-1">Login Admin</h4>
                <p class="text-muted small mb-0">Penjaminan Mutu FICT</p>
            </div>

            <!-- Alert Notifikasi -->
            @if (session('status'))
                <div class="alert alert-success py-2 px-3 small mb-3" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger py-2 px-3 small mb-3" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form Login Sederhana: Username, Password, Remember Me, Button Submit -->
            <form action="{{ route('login.submit') }}" method="POST" novalidate>
                @csrf

                <!-- 1. Username -->
                <div class="form-group mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        class="form-control-login @error('username') is-invalid @enderror"
                        placeholder="Masukkan username"
                        value="{{ old('username') }}"
                        required
                        autofocus
                    >
                </div>

                <!-- 2. Password -->
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control-login @error('password') is-invalid @enderror"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <!-- 3. Remember Me -->
                <div class="form-group form-check mb-4">
                    <input
                        type="checkbox"
                        name="remember"
                        class="form-check-input"
                        id="remember"
                        value="1"
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label class="form-check-label small text-secondary" for="remember">Remember me</label>
                </div>

                <!-- 4. Button Submit -->
                <button type="submit" class="btn-submit">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <!-- Scripts Bawaan Template di public/js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
