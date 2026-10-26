<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Penjaminan Mutu FICT</title>

    <!-- Favicon Icon Bawaan Template -->
    <link rel="shortcut icon" href="{{ asset('img/logo_college.png') }}">

    <!-- Stylesheet Bawaan Template di public/css -->
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .admin-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 12px 0;
        }
        .admin-logo {
            max-height: 42px;
            width: auto;
        }
        .dashboard-hero {
            background: linear-gradient(135deg, #0f2942 0%, #086ad7 100%);
            color: #ffffff;
            border-radius: 8px;
            padding: 30px;
        }
        .admin-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            background: #ffffff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .admin-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }
        .card-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            background-color: #e8f2fc;
            color: #086ad7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="admin-navbar shadow-sm">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-decoration-none">
                    <img src="{{ asset('img/fict.png') }}" alt="PM FICT Logo" class="admin-logo mr-2">
                    <div class="d-none d-sm-block">
                        <span class="font-weight-bold text-dark d-block" style="line-height: 1.2;">PM FICT</span>
                        <small class="text-primary font-weight-bold">Dashboard Admin</small>
                    </div>
                </a>

                <div class="d-flex align-items-center">
                    <span class="text-muted small mr-3 d-none d-md-inline">
                        <i class="fal fa-user-circle mr-1"></i> {{ $user->name ?? 'Administrator' }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fal fa-sign-out-alt mr-1"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-4 flex-grow-1">
        <div class="dashboard-hero mb-4 shadow-sm">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h3 class="font-weight-bold mb-2">Selamat Datang, {{ $user->name ?? 'Admin' }}!</h3>
                    <p class="mb-0 text-light opacity-75">
                        Anda telah berhasil login ke Dashboard Admin Penjaminan Mutu FICT. Akses data dan sistem terpadu SPMI, SPME, serta siklus mutu PPEPP.
                    </p>
                </div>
                <div class="col-md-3 text-md-right mt-3 mt-md-0">
                    <a href="{{ route('home') }}" class="btn btn-light btn-sm font-weight-bold text-primary">
                        <i class="fal fa-globe mr-1"></i> Lihat Website
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card admin-card h-100 p-4">
                    <div class="card-icon-box">
                        <i class="fal fa-sync-alt"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark">Siklus PPEPP</h5>
                    <p class="text-muted small mb-0">Kelola pilar Penetapan, Pelaksanaan, Evaluasi, Pengendalian, dan Peningkatan standar mutu.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card admin-card h-100 p-4">
                    <div class="card-icon-box">
                        <i class="fal fa-file-alt"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark">Dokumen Mutu</h5>
                    <p class="text-muted small mb-0">Kelola arsip Dokumen Standar Mutu dan Dokumen Manual Mutu untuk program studi FICT.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card admin-card h-100 p-4">
                    <div class="card-icon-box">
                        <i class="fal fa-award"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark">Akreditasi SPME</h5>
                    <p class="text-muted small mb-0">Informasi dan evaluasi akreditasi eksternal BAN-PT dan LAMINFOKOM institusi.</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-top py-3 text-center text-muted small mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} Penjaminan Mutu FICT - Horizon University. All rights reserved.
        </div>
    </footer>

    <!-- Scripts Bawaan Template di public/js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
