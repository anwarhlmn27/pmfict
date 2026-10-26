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
            padding: 20px 0;
        }
        .login-card {
            border: 1px solid #e1e7ec;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            background: #ffffff;
        }
        .login-logo {
            max-height: 52px;
            width: auto;
        }
        .btn-login {
            background-color: #086ad7;
            border-color: #086ad7;
            color: #ffffff;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background-color: #0652a5;
            border-color: #0652a5;
            color: #ffffff;
        }
        .input-group-text {
            background-color: #f8fafc;
            border-color: #ced4da;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                <div class="card login-card p-4 p-sm-5">
                    
                    <!-- 1. LOGO -->
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/fict.png') }}" alt="PM FICT Logo" class="login-logo mb-2">
                        </a>
                        <h4 class="font-weight-bold text-dark mt-2 mb-1">Login Admin</h4>
                        <p class="text-muted small mb-0">Penjaminan Mutu FICT</p>
                    </div>

                    <!-- Alert Notifikasi / Pesan Error -->
                    @if (session('status'))
                        <div class="alert alert-success py-2 px-3 small" role="alert">
                            <i class="fal fa-check-circle mr-1"></i> {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 px-3 small" role="alert">
                            <i class="fal fa-exclamation-triangle mr-1"></i> {{ $errors->first() }}
                        </div>
                    @endif

                    <!-- Form Login -->
                    <form action="{{ route('login.submit') }}" method="POST" novalidate>
                        @csrf

                        <!-- 2. EMAIL -->
                        <div class="form-group mb-3">
                            <label for="email" class="small font-weight-bold text-secondary">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fal fa-envelope"></i></span>
                                </div>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    placeholder="admin@horizon.ac.id" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus
                                >
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 3. PASSWORD -->
                        <div class="form-group mb-3">
                            <label for="password" class="small font-weight-bold text-secondary">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fal fa-lock"></i></span>
                                </div>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    placeholder="••••••••" 
                                    required
                                >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Toggle password">
                                        <i class="fal fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 4. REMEMBER ME -->
                        <div class="form-group form-check mb-4">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label small text-secondary" for="remember">Remember me</label>
                        </div>

                        <!-- 5. BUTTON LOGIN -->
                        <button type="submit" class="btn btn-login btn-block">
                            <i class="fal fa-sign-in-alt mr-1"></i> Login
                        </button>
                    </form>

                    <!-- Kembali ke Beranda -->
                    <div class="text-center mt-4">
                        <a href="{{ route('home') }}" class="text-muted small">
                            <i class="fal fa-arrow-left mr-1"></i> Kembali ke Beranda
                        </a>
                    </div>

                </div>

                <div class="text-center text-muted small mt-3">
                    &copy; {{ date('Y') }} PM FICT - Horizon University
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts Bawaan Template di public/js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        $('#togglePassword').on('click', function () {
            var passwordInput = $('#password');
            var icon = $('#toggleIcon');
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordInput.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    </script>
</body>
</html>
