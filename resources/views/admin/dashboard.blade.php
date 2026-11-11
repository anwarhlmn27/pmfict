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
            background-color: #f1f5f9;
            font-size: 14px;
            line-height: 1.6;
            color: #334155;
            overflow-x: hidden;
        }
        h1, h2, h3, h4, h5, h6 {
            letter-spacing: -0.2px !important;
            color: #0f2942;
        }
        /* Layout Wrapper */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }
        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            min-width: 260px;
            background-color: #0f2942;
            color: #cbd5e1;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            z-index: 1040;
        }
        .sidebar-brand {
            padding: 14px 20px;
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            border-right: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .sidebar-brand img {
            max-height: 44px;
            width: auto;
        }
        .sidebar-menu {
            padding: 16px 12px;
            flex-grow: 1;
            overflow-y: auto;
        }
        .sidebar-heading {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #64748b;
            padding: 10px 12px 6px;
        }
        .sidebar-nav .nav-link {
            color: #cbd5e1;
            font-size: 13.5px;
            font-weight: 500;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
            line-height: 1.4;
        }
        .sidebar-nav .nav-link i {
            width: 22px;
            font-size: 15px;
            margin-right: 8px;
            text-align: center;
        }
        .sidebar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.07);
            color: #ffffff;
        }
        .sidebar-nav .nav-link.active {
            background-color: #086ad7;
            color: #ffffff;
            font-weight: 600;
        }
        .sidebar-footer {
            padding: 14px 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background-color: rgba(0, 0, 0, 0.15);
        }

        /* Main Area */
        .admin-main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .admin-topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1020;
        }
        .admin-content {
            padding: 24px;
            flex-grow: 1;
        }

        /* Stat Cards */
        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 18px 20px;
            box-shadow: 0 2px 6px rgba(15, 41, 66, 0.03);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        /* Content Cards & Tables */
        .panel-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(15, 41, 66, 0.03);
            margin-bottom: 24px;
        }
        .panel-header {
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        .panel-body {
            padding: 20px;
        }
        .table-admin {
            margin-bottom: 0;
            font-size: 13.5px;
        }
        .table-admin thead th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border-top: none;
            border-bottom: 1px solid #e2e8f0;
            padding: 11px 14px;
        }
        .table-admin tbody td {
            padding: 12px 14px;
            vertical-align: middle;
            border-top: 1px solid #f1f5f9;
            color: #334155;
        }
        .form-control-admin {
            border: 1px solid #cbd5e1 !important;
            border-radius: 6px;
            font-size: 13.5px;
            padding: 8px 12px;
            height: auto;
        }
        .form-control-admin:focus {
            border-color: #086ad7 !important;
            box-shadow: 0 0 0 3px rgba(8, 106, 215, 0.12) !important;
        }
        .ck-editor__editable_inline {
            min-height: 180px;
            max-height: 360px;
            font-size: 13.5px;
        }
        .ck.ck-balloon-panel {
            z-index: 1060 !important;
        }

        /* Responsive Sidebar on Mobile */
        @media (max-width: 991px) {
            .admin-sidebar {
                position: fixed;
                left: -260px;
                top: 0;
                bottom: 0;
            }
            .admin-sidebar.show {
                left: 0;
            }
            .sidebar-backdrop {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(15, 41, 66, 0.5);
                z-index: 1035;
            }
            .sidebar-backdrop.show {
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="admin-wrapper">
    <!-- Backdrop Mobile -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <!-- ================= SIDEBAR NAVIGASI ADMIN ================= -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center justify-content-center text-decoration-none">
                <img src="{{ asset('img/fict.png') }}" alt="FICT Logo">
            </a>
            <button type="button" class="btn btn-sm text-dark d-lg-none" id="closeSidebar" style="position: absolute; right: 12px;">
                <i class="fal fa-times"></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-heading">Dashboard</div>
            <div class="nav flex-column nav-pills sidebar-nav" id="adminTab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="tab-overview-link" data-toggle="pill" href="#tab-overview" role="tab">
                    <i class="fal fa-tachometer-alt-fast"></i> Ringkasan Dashboard
                </a>

                <div class="sidebar-heading mt-2">Tabel Migration</div>
                <!-- 1. quality_documents -->
                <a class="nav-link" id="tab-dokumen-link" data-toggle="pill" href="#tab-dokumen" role="tab">
                    <i class="fal fa-file-alt"></i> Dokumen Mutu
                </a>
                <!-- 2. news -->
                <a class="nav-link" id="tab-berita-link" data-toggle="pill" href="#tab-berita" role="tab">
                    <i class="fal fa-newspaper"></i> Berita & Agenda
                </a>
                <!-- 3. galleries -->
                <a class="nav-link" id="tab-galeri-link" data-toggle="pill" href="#tab-galeri" role="tab">
                    <i class="fal fa-images"></i> Galeri Kegiatan
                </a>
                <!-- 4. accreditations -->
                <a class="nav-link" id="tab-spme-link" data-toggle="pill" href="#tab-spme" role="tab">
                    <i class="fal fa-award"></i> Akreditasi SPME
                </a>
                <!-- 5. organization_structures -->
                <a class="nav-link" id="tab-struktur-link" data-toggle="pill" href="#tab-struktur" role="tab">
                    <i class="fal fa-sitemap"></i> Struktur Organisasi
                </a>
                <!-- 6. hero_sliders -->
                <a class="nav-link" id="tab-slider-link" data-toggle="pill" href="#tab-slider" role="tab">
                    <i class="fal fa-presentation"></i> Hero Slider
                </a>
                <!-- 7. site_settings -->
                <a class="nav-link" id="tab-settings-link" data-toggle="pill" href="#tab-settings" role="tab">
                    <i class="fal fa-cog"></i> Pengaturan Web
                </a>
                <!-- 8. contact_messages -->
                <a class="nav-link d-flex justify-content-between align-items-center" id="tab-pesan-link" data-toggle="pill" href="#tab-pesan" role="tab">
                    <span><i class="fal fa-envelope-open-text"></i> Pesan Kontak</span>
                    @if(($stats['unread_messages'] ?? 0) > 0)
                        <span class="badge badge-danger badge-pill">{{ $stats['unread_messages'] }}</span>
                    @endif
                </a>
                <!-- 9. users -->
                <a class="nav-link" id="tab-users-link" data-toggle="pill" href="#tab-users" role="tab">
                    <i class="fal fa-users"></i> Data Users
                </a>
            </div>
        </div>

        <div class="sidebar-footer">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-light btn-sm btn-block mb-2" style="font-size: 12.5px;">
                <i class="fal fa-external-link mr-1"></i> Lihat Halaman Depan
            </a>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm btn-block" style="font-size: 12.5px;">
                    <i class="fal fa-sign-out-alt mr-1"></i> Keluar (Logout)
                </button>
            </form>
        </div>
    </aside>

    <!-- ================= KONTEN UTAMA ADMIN ================= -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-light btn-sm mr-3 d-lg-none border" id="openSidebar">
                    <i class="fal fa-bars"></i>
                </button>
                <div>
                    <h5 class="font-weight-bold mb-0" style="font-size: 16px;">Dashboard Admin Penjaminan Mutu FICT</h5>
                    <small class="text-muted d-none d-sm-inline">Sistem Pengelolaan SPMI, SPME, dan Siklus PPEPP</small>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <span class="badge badge-light border px-3 py-2 mr-2 text-dark" style="font-size: 12.5px;">
                    <i class="fal fa-user-circle text-primary mr-1"></i> {{ $user->name ?? 'Administrator' }}
                </span>
                <form action="{{ route('logout') }}" method="POST" class="m-0 d-none d-md-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm" style="font-size: 12.5px;">
                        <i class="fal fa-sign-out-alt mr-1"></i> Keluar
                    </button>
                </form>
            </div>
        </header>

        <!-- Content Body -->
        <main class="admin-content">
            <!-- 4 KPI Kartu Statistik -->
            <div class="row mb-2">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="stat-card">
                        <div>
                            <small class="text-muted font-weight-bold text-uppercase d-block mb-1">Dokumen Mutu</small>
                            <h3 class="font-weight-bold mb-0" style="font-size: 24px;">{{ $stats['documents'] ?? 20 }}</h3>
                            <small class="text-primary">4 Pilar Dokumen SPMI</small>
                        </div>
                        <div class="stat-icon" style="background: #e8f2fc; color: #086ad7;">
                            <i class="fal fa-folder-open"></i>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="stat-card">
                        <div>
                            <small class="text-muted font-weight-bold text-uppercase d-block mb-1">Berita & Agenda</small>
                            <h3 class="font-weight-bold mb-0" style="font-size: 24px;">{{ $stats['news'] ?? 3 }}</h3>
                            <small class="text-success">Artikel Terpublikasi</small>
                        </div>
                        <div class="stat-icon" style="background: #dcfce7; color: #16a34a;">
                            <i class="fal fa-newspaper"></i>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="stat-card">
                        <div>
                            <small class="text-muted font-weight-bold text-uppercase d-block mb-1">Galeri Kegiatan</small>
                            <h3 class="font-weight-bold mb-0" style="font-size: 24px;">{{ $stats['galleries'] ?? 10 }}</h3>
                            <small class="text-info">Foto Rapat & AMI</small>
                        </div>
                        <div class="stat-icon" style="background: #e0f2fe; color: #0284c7;">
                            <i class="fal fa-images"></i>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="stat-card">
                        <div>
                            <small class="text-muted font-weight-bold text-uppercase d-block mb-1">Pesan Masuk</small>
                            <h3 class="font-weight-bold mb-0" style="font-size: 24px;">{{ $stats['messages'] ?? 0 }}</h3>
                            <small class="text-warning">Form Kontak & Aspirasi</small>
                        </div>
                        <div class="stat-icon" style="background: #fef3c7; color: #d97706;">
                            <i class="fal fa-envelope-open-text"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content Panels -->
            <div class="tab-content" id="adminTabContent">

                <!-- ================= 1. TAB OVERVIEW (RINGKASAN) ================= -->
                <div class="tab-pane fade show active" id="tab-overview" role="tabpanel">
                    <div class="row">
                        <!-- Pintasan Halaman Dokumen Mutu -->
                        <div class="col-lg-8">
                            <div class="panel-card">
                                <div class="panel-header">
                                    <div>
                                        <h6 class="font-weight-bold mb-0">Manajemen Cepat 4 Halaman Dokumen Mutu</h6>
                                        <small class="text-muted">Kelola berkas pada halaman Kebijakan, Standar, Manual, dan Formulir Mutu</small>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahDokumen">
                                        <i class="fal fa-plus mr-1"></i> Upload Dokumen
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-admin">
                                        <thead>
                                            <tr>
                                                <th>Kategori Dokumen</th>
                                                <th>Kode Prefix</th>
                                                <th class="text-center">Jumlah Berkas</th>
                                                <th class="text-center">Halaman Publik</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold"><i class="fas fa-shield-alt text-primary mr-2"></i> Dokumen Kebijakan Mutu</td>
                                                <td><span class="badge badge-primary">KBJ-SPMI</span></td>
                                                <td class="text-center">{{ ($documents ?? collect())->where('category', 'kebijakan')->count() }} Dokumen</td>
                                                <td class="text-center">
                                                    <a href="{{ route('download.kebijakan-mutu') }}" target="_blank" class="btn btn-outline-primary btn-sm py-1 px-2" style="font-size: 12px;">
                                                        Lihat Halaman <i class="fal fa-external-link ml-1"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold"><i class="fas fa-file-alt text-primary mr-2"></i> Dokumen Standar Mutu</td>
                                                <td><span class="badge badge-primary">STD-SPMI</span></td>
                                                <td class="text-center">{{ ($documents ?? collect())->where('category', 'standar')->count() }} Dokumen</td>
                                                <td class="text-center">
                                                    <a href="{{ route('download.standar-mutu') }}" target="_blank" class="btn btn-outline-primary btn-sm py-1 px-2" style="font-size: 12px;">
                                                        Lihat Halaman <i class="fal fa-external-link ml-1"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold"><i class="fas fa-book text-info mr-2"></i> Dokumen Manual Mutu (PPEPP)</td>
                                                <td><span class="badge badge-info">MNL-PPEPP</span></td>
                                                <td class="text-center">{{ ($documents ?? collect())->where('category', 'manual')->count() }} Dokumen</td>
                                                <td class="text-center">
                                                    <a href="{{ route('download.manual-mutu') }}" target="_blank" class="btn btn-outline-info btn-sm py-1 px-2" style="font-size: 12px;">
                                                        Lihat Halaman <i class="fal fa-external-link ml-1"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold"><i class="fas fa-clipboard-list text-success mr-2"></i> Dokumen Formulir Mutu</td>
                                                <td><span class="badge badge-success">FRM-SPMI</span></td>
                                                <td class="text-center">{{ ($documents ?? collect())->where('category', 'formulir')->count() }} Dokumen</td>
                                                <td class="text-center">
                                                    <a href="{{ route('download.formulir-mutu') }}" target="_blank" class="btn btn-outline-success btn-sm py-1 px-2" style="font-size: 12px;">
                                                        Lihat Halaman <i class="fal fa-external-link ml-1"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Status Sistem & Siklus PPEPP -->
                        <div class="col-lg-4">
                            <div class="panel-card">
                                <div class="panel-header">
                                    <h6 class="font-weight-bold mb-0">Modul Database Aktif</h6>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled mb-0" style="font-size: 13px; line-height: 2;">
                                        <li class="d-flex justify-content-between border-bottom pb-1 mb-1">
                                            <span><i class="fas fa-check-circle text-success mr-2"></i> <code>quality_documents</code></span>
                                            <span class="badge badge-light border">Siap</span>
                                        </li>
                                        <li class="d-flex justify-content-between border-bottom pb-1 mb-1">
                                            <span><i class="fas fa-check-circle text-success mr-2"></i> <code>news</code></span>
                                            <span class="badge badge-light border">Siap</span>
                                        </li>
                                        <li class="d-flex justify-content-between border-bottom pb-1 mb-1">
                                            <span><i class="fas fa-check-circle text-success mr-2"></i> <code>galleries</code></span>
                                            <span class="badge badge-light border">Siap</span>
                                        </li>
                                        <li class="d-flex justify-content-between border-bottom pb-1 mb-1">
                                            <span><i class="fas fa-check-circle text-success mr-2"></i> <code>accreditations</code></span>
                                            <span class="badge badge-light border">Siap</span>
                                        </li>
                                        <li class="d-flex justify-content-between border-bottom pb-1 mb-1">
                                            <span><i class="fas fa-check-circle text-success mr-2"></i> <code>organization_structures</code></span>
                                            <span class="badge badge-light border">Siap</span>
                                        </li>
                                        <li class="d-flex justify-content-between border-bottom pb-1 mb-1">
                                            <span><i class="fas fa-check-circle text-success mr-2"></i> <code>hero_sliders</code></span>
                                            <span class="badge badge-light border">Siap</span>
                                        </li>
                                        <li class="d-flex justify-content-between border-bottom pb-1 mb-1">
                                            <span><i class="fas fa-check-circle text-success mr-2"></i> <code>site_settings</code></span>
                                            <span class="badge badge-light border">Siap</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <span><i class="fas fa-check-circle text-success mr-2"></i> <code>contact_messages</code></span>
                                            <span class="badge badge-light border">Siap</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= 2. TAB DOKUMEN MUTU (quality_documents) ================= -->
                <div class="tab-pane fade" id="tab-dokumen" role="tabpanel">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h6 class="font-weight-bold mb-0">Data Dokumen Mutu SPMI (<code>quality_documents</code>)</h6>
                                <small class="text-muted">Daftar berkas Kebijakan Mutu, Standar Mutu, Manual Mutu, dan Formulir Mutu</small>
                            </div>
                            <div class="d-flex flex-wrap align-items-center" style="gap: 8px;">
                                <select id="filterKategoriDokumen" class="form-control form-control-admin form-control-sm" style="width: auto; min-width: 175px;">
                                    <option value="all">Semua Kategori ({{ ($documents ?? collect())->count() }})</option>
                                    <option value="kebijakan">Kebijakan Mutu ({{ ($documents ?? collect())->where('category', 'kebijakan')->count() }})</option>
                                    <option value="standar">Standar Mutu ({{ ($documents ?? collect())->where('category', 'standar')->count() }})</option>
                                    <option value="manual">Manual Mutu ({{ ($documents ?? collect())->where('category', 'manual')->count() }})</option>
                                    <option value="formulir">Formulir Mutu ({{ ($documents ?? collect())->where('category', 'formulir')->count() }})</option>
                                </select>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahDokumen">
                                    <i class="fal fa-plus mr-1"></i> Tambah Dokumen Baru
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-admin" id="tabelDokumenMutu">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th>Kode</th>
                                        <th>Kategori</th>
                                        <th>Judul Dokumen</th>
                                        <th>Edisi / Format</th>
                                        <th>Ukuran</th>
                                        <th>Status</th>
                                        <th class="text-center" style="width: 110px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($documents ?? [] as $index => $doc)
                                        <tr data-category="{{ $doc->category }}">
                                            <td class="font-weight-bold">{{ $index + 1 }}</td>
                                            <td><span class="badge {{ $doc->badgeClass() }}">{{ $doc->code }}</span></td>
                                            <td>{{ $doc->categoryLabel() }}</td>
                                            <td>
                                                <div class="font-weight-bold text-dark">{{ $doc->title }}</div>
                                                @if(!empty($doc->file_path) && $doc->file_path !== '#')
                                                    <small class="text-muted">
                                                        <a href="{{ $doc->fileUrl() }}" target="_blank" class="text-primary">
                                                            <i class="fal fa-paperclip mr-1"></i>{{ $doc->file_path }}
                                                        </a>
                                                    </small>
                                                @endif
                                            </td>
                                            <td>{{ $doc->file_type }}{{ $doc->edition ? ' • ' . $doc->edition : '' }}</td>
                                            <td>{{ $doc->file_size ?? '-' }}</td>
                                            <td>
                                                @if($doc->is_active)
                                                    <span class="badge badge-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-secondary">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex align-items-center" style="gap: 4px;">
                                                    <button
                                                        type="button"
                                                        class="btn btn-outline-primary btn-sm py-1 px-2 btn-edit-dokumen"
                                                        data-toggle="modal"
                                                        data-target="#modalEditDokumen"
                                                        data-action="{{ route('admin.quality-documents.update', $doc) }}"
                                                        data-category="{{ $doc->category }}"
                                                        data-code="{{ $doc->code }}"
                                                        data-title="{{ $doc->title }}"
                                                        data-edition="{{ $doc->edition }}"
                                                        data-file_type="{{ $doc->file_type }}"
                                                        data-file_size="{{ $doc->file_size }}"
                                                        data-file_path="{{ $doc->file_path }}"
                                                        data-sort_order="{{ $doc->sort_order }}"
                                                        data-is_active="{{ $doc->is_active ? '1' : '0' }}"
                                                        title="Edit Dokumen"
                                                    >
                                                        <i class="fal fa-edit"></i>
                                                    </button>
                                                    <form
                                                        action="{{ route('admin.quality-documents.destroy', $doc) }}"
                                                        method="POST"
                                                        class="d-inline m-0 form-delete-dokumen"
                                                        data-title="{{ $doc->code }} - {{ $doc->title }}"
                                                    >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm py-1 px-2" title="Hapus Dokumen">
                                                            <i class="fal fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted py-4">Belum ada data dokumen mutu. Silakan klik <strong>Tambah Dokumen Baru</strong>.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ================= 3. TAB BERITA & AGENDA (news) ================= -->
                <div class="tab-pane fade" id="tab-berita" role="tabpanel">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h6 class="font-weight-bold mb-0">Manajemen Berita & Agenda Mutu (<code>news</code>)</h6>
                                <small class="text-muted">Kelola informasi kegiatan audit, RTM, dan workshop akreditasi</small>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahBerita">
                                <i class="fal fa-plus mr-1"></i> Tulis Berita
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-admin">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th style="width: 100px;">Thumbnail</th>
                                        <th>Judul & Ringkasan Berita</th>
                                        <th>Label</th>
                                        <th>Tanggal Terbit</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" style="width: 130px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($newsList ?? [] as $newsItem)
                                        <tr>
                                            <td class="font-weight-bold">{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ $newsItem->thumbnailUrl() }}" target="_blank" title="Lihat thumbnail penuh">
                                                    <img src="{{ $newsItem->thumbnailUrl() }}"
                                                         alt="{{ $newsItem->title }}"
                                                         style="width: 80px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1; display: block;">
                                                </a>
                                                <small class="d-block text-muted mt-1 text-truncate" style="max-width: 90px; font-size: 11px;" title="{{ $newsItem->thumbnail }}">
                                                    <code>{{ basename($newsItem->thumbnail ?: 'Meet1.jpeg') }}</code>
                                                </small>
                                            </td>
                                            <td>
                                                <div class="font-weight-bold text-dark">{{ $newsItem->title }}</div>
                                                @if($newsItem->excerpt)
                                                    <small class="text-muted d-block mt-1">{{ \Illuminate\Support\Str::limit($newsItem->excerpt, 90) }}</small>
                                                @endif
                                                <small class="text-muted d-block mt-1" style="font-size: 11px;">Slug: <code>{{ $newsItem->slug }}</code></small>
                                            </td>
                                            <td>
                                                <span class="badge {{ $newsItem->badgeClass() }} px-2 py-1">{{ $newsItem->category_badge }}</span>
                                            </td>
                                            <td>{{ $newsItem->formattedPublishedDate() }}</td>
                                            <td class="text-center">
                                                @if($newsItem->is_published)
                                                    <span class="badge badge-success">Published</span>
                                                @else
                                                    <span class="badge badge-secondary">Draft</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex align-items-center">
                                                    <button type="button"
                                                            class="btn btn-sm btn-outline-primary mr-1 btn-edit-berita"
                                                            title="Edit Berita"
                                                            data-toggle="modal"
                                                            data-target="#modalEditBerita"
                                                            data-action="{{ route('admin.news.update', $newsItem) }}"
                                                            data-title="{{ $newsItem->title }}"
                                                            data-category_badge="{{ $newsItem->category_badge }}"
                                                            data-excerpt="{{ $newsItem->excerpt }}"
                                                            data-content="{{ $newsItem->content }}"
                                                            data-thumbnail="{{ $newsItem->thumbnail }}"
                                                            data-published_at="{{ optional($newsItem->published_at)->format('Y-m-d') ?: date('Y-m-d') }}"
                                                            data-is_published="{{ $newsItem->is_published ? '1' : '0' }}">
                                                        <i class="fal fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('admin.news.destroy', $newsItem) }}"
                                                          method="POST"
                                                          class="d-inline m-0 form-delete-berita"
                                                          data-title="{{ $newsItem->title }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Berita">
                                                            <i class="fal fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                Belum ada data berita di tabel <code>news</code>. Klik tombol <strong>+ Tulis Berita</strong> untuk menambahkan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ================= 4. TAB GALERI KEGIATAN (galleries) ================= -->
                <div class="tab-pane fade" id="tab-galeri" role="tabpanel">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h6 class="font-weight-bold mb-0">Galeri Rapat & Kegiatan Mutu (<code>galleries</code>)</h6>
                                <small class="text-muted">Kelola dokumentasi foto rapat & kegiatan mutu yang tampil pada carousel halaman utama</small>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahGaleri">
                                <i class="fal fa-plus mr-1"></i> Tambah Foto Galeri
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-admin">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">Urutan</th>
                                        <th style="width: 110px;">Foto</th>
                                        <th>Judul Kegiatan</th>
                                        <th>Subjudul / Keterangan</th>
                                        <th>Badge</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" style="width: 130px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($galleries ?? [] as $gallery)
                                        <tr>
                                            <td class="font-weight-bold">#{{ $gallery->sort_order }}</td>
                                            <td>
                                                <a href="{{ $gallery->imageUrl() }}" target="_blank" title="Lihat foto penuh">
                                                    <img src="{{ $gallery->imageUrl() }}"
                                                         alt="{{ $gallery->title }}"
                                                         style="width: 84px; height: 52px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1; display: block;">
                                                </a>
                                                <small class="d-block text-muted mt-1 text-truncate" style="max-width: 100px; font-size: 11px;" title="{{ $gallery->image_path }}">
                                                    <code>{{ basename($gallery->image_path) }}</code>
                                                </small>
                                            </td>
                                            <td class="font-weight-bold text-dark">{{ $gallery->title }}</td>
                                            <td>{{ $gallery->subtitle ?: '-' }}</td>
                                            <td>
                                                <span class="badge {{ $gallery->badgeClass() }} px-2 py-1">{{ $gallery->badge }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($gallery->is_active)
                                                    <span class="badge badge-soft-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-secondary">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex align-items-center">
                                                    <button type="button"
                                                            class="btn btn-sm btn-outline-primary mr-1 btn-edit-galeri"
                                                            title="Edit Galeri"
                                                            data-toggle="modal"
                                                            data-target="#modalEditGaleri"
                                                            data-action="{{ route('admin.galleries.update', $gallery) }}"
                                                            data-title="{{ $gallery->title }}"
                                                            data-subtitle="{{ $gallery->subtitle }}"
                                                            data-badge="{{ $gallery->badge }}"
                                                            data-image_path="{{ $gallery->image_path }}"
                                                            data-sort_order="{{ $gallery->sort_order }}"
                                                            data-is_active="{{ $gallery->is_active ? '1' : '0' }}">
                                                        <i class="fal fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('admin.galleries.destroy', $gallery) }}"
                                                          method="POST"
                                                          class="d-inline m-0 form-delete-galeri"
                                                          data-title="{{ $gallery->title }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Galeri">
                                                            <i class="fal fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                Belum ada data foto di tabel <code>galleries</code>. Klik tombol <strong>+ Tambah Foto Galeri</strong> untuk menambahkan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ================= 5. TAB AKREDITASI SPME (accreditations) ================= -->
                <div class="tab-pane fade" id="tab-spme" role="tabpanel">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h6 class="font-weight-bold mb-0">Data Akreditasi Eksternal SPME (<code>accreditations</code>)</h6>
                                <small class="text-muted">Status pemenuhan instrumen akreditasi BAN-PT dan LAMINFOKOM</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-admin">
                                <thead>
                                    <tr>
                                        <th>Institusi / Program Studi</th>
                                        <th>Lembaga Akreditasi</th>
                                        <th>Target / Peringkat</th>
                                        <th>Status Instrumen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">Horizon University Indonesia (Institusi)</td>
                                        <td><span class="badge badge-primary">BAN-PT</span></td>
                                        <td>Baik Sekali / Unggul</td>
                                        <td>9 Kriteria SN-Dikti (IAPT)</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">S1 Informatika</td>
                                        <td><span class="badge badge-info">LAMINFOKOM</span></td>
                                        <td>Target: Unggul</td>
                                        <td>LED & LKPS Berbasis OBE</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">S1 Sistem Informasi</td>
                                        <td><span class="badge badge-info">LAMINFOKOM</span></td>
                                        <td>Target: Unggul</td>
                                        <td>LED & LKPS Berbasis OBE</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ================= 6. TAB STRUKTUR ORGANISASI (organization_structures) ================= -->
                <div class="tab-pane fade" id="tab-struktur" role="tabpanel">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h6 class="font-weight-bold mb-0">Struktur Organisasi Unit Mutu (<code>organization_structures</code>)</h6>
                                <small class="text-muted">Kelola susunan jabatan struktural & tanggung jawab tata kelola Penjaminan Mutu FICT</small>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahStruktur">
                                <i class="fal fa-plus mr-1"></i> Tambah Jabatan
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-admin">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">Urutan</th>
                                        <th>Jabatan Struktural</th>
                                        <th>Nama Pejabat / Personil</th>
                                        <th>Fungsi & Tanggung Jawab</th>
                                        <th>Ikon</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" style="width: 130px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($organizationStructures ?? [] as $org)
                                        <tr>
                                            <td class="font-weight-bold">#{{ $org->sort_order }}</td>
                                            <td class="font-weight-bold text-dark">{{ $org->position_title }}</td>
                                            <td>{{ $org->person_name ?: '-' }}</td>
                                            <td>{{ $org->role_description ?: '-' }}</td>
                                            <td>
                                                <span class="mr-1 text-primary"><i class="{{ $org->icon_class }}"></i></span>
                                                <code>{{ $org->icon_class }}</code>
                                            </td>
                                            <td class="text-center">
                                                @if($org->is_active)
                                                    <span class="badge badge-soft-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-secondary">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex align-items-center">
                                                    <button type="button"
                                                            class="btn btn-sm btn-outline-primary mr-1 btn-edit-struktur"
                                                            title="Edit Jabatan"
                                                            data-toggle="modal"
                                                            data-target="#modalEditStruktur"
                                                            data-action="{{ route('admin.organization-structures.update', $org) }}"
                                                            data-position_title="{{ $org->position_title }}"
                                                            data-person_name="{{ $org->person_name }}"
                                                            data-role_description="{{ $org->role_description }}"
                                                            data-icon_class="{{ $org->icon_class }}"
                                                            data-sort_order="{{ $org->sort_order }}"
                                                            data-is_active="{{ $org->is_active ? '1' : '0' }}">
                                                        <i class="fal fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('admin.organization-structures.destroy', $org) }}"
                                                          method="POST"
                                                          class="d-inline m-0 form-delete-struktur"
                                                          data-title="{{ $org->position_title }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Jabatan">
                                                            <i class="fal fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                Belum ada data struktur organisasi di tabel <code>organization_structures</code>. Klik tombol <strong>+ Tambah Jabatan</strong> untuk menambahkan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ================= 7. TAB HERO SLIDER (hero_sliders) ================= -->
                <div class="tab-pane fade" id="tab-slider" role="tabpanel">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h6 class="font-weight-bold mb-0">Hero Slider Halaman Utama (<code>hero_sliders</code>)</h6>
                                <small class="text-muted">Kelola banner slider utama (Tambah, Edit, Urutan, Status, & Hapus) pada landing page PM FICT</small>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahSlider">
                                <i class="fal fa-plus mr-1"></i> Tambah Slide
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-admin">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">Urutan</th>
                                        <th style="width: 110px;">Preview</th>
                                        <th>Tagline Badge</th>
                                        <th>Judul & Deskripsi</th>
                                        <th>Tombol CTA</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" style="width: 130px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($heroSliders ?? [] as $slider)
                                        <tr>
                                            <td class="font-weight-bold">#{{ $slider->sort_order }}</td>
                                            <td>
                                                <a href="{{ $slider->imageUrl() }}" target="_blank" title="Lihat gambar penuh">
                                                    <img src="{{ $slider->imageUrl() }}"
                                                         alt="{{ $slider->title }}"
                                                         style="width: 96px; height: 54px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1; display: block;">
                                                </a>
                                                <small class="d-block text-muted mt-1 text-truncate" style="max-width: 110px; font-size: 11px;" title="{{ $slider->image_path }}">
                                                    <code>{{ basename($slider->image_path) }}</code>
                                                </small>
                                            </td>
                                            <td>
                                                @if($slider->badge_text)
                                                    <span class="badge badge-primary px-2 py-1">{{ $slider->badge_text }}</span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="font-weight-bold text-dark">{{ $slider->title }}</div>
                                                @if($slider->description)
                                                    <small class="text-muted d-block mt-1">{{ \Illuminate\Support\Str::limit($slider->description, 95) }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if($slider->primary_btn_text)
                                                    <div class="small">
                                                        <span class="font-weight-bold">1:</span> {{ $slider->primary_btn_text }}
                                                        <code class="ml-1">{{ $slider->primary_btn_url }}</code>
                                                    </div>
                                                @endif
                                                @if($slider->secondary_btn_text)
                                                    <div class="small mt-1">
                                                        <span class="font-weight-bold">2:</span> {{ $slider->secondary_btn_text }}
                                                        <code class="ml-1">{{ $slider->secondary_btn_url }}</code>
                                                    </div>
                                                @endif
                                                @if(!$slider->primary_btn_text && !$slider->secondary_btn_text)
                                                    <span class="text-muted small">-</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($slider->is_active)
                                                    <span class="badge badge-soft-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-secondary">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex align-items-center">
                                                    <button type="button"
                                                            class="btn btn-sm btn-outline-primary mr-1 btn-edit-slider"
                                                            title="Edit Slide"
                                                            data-toggle="modal"
                                                            data-target="#modalEditSlider"
                                                            data-action="{{ route('admin.hero-sliders.update', $slider) }}"
                                                            data-badge_text="{{ $slider->badge_text }}"
                                                            data-title="{{ $slider->title }}"
                                                            data-description="{{ $slider->description }}"
                                                            data-image_path="{{ $slider->image_path }}"
                                                            data-primary_btn_text="{{ $slider->primary_btn_text }}"
                                                            data-primary_btn_url="{{ $slider->primary_btn_url }}"
                                                            data-secondary_btn_text="{{ $slider->secondary_btn_text }}"
                                                            data-secondary_btn_url="{{ $slider->secondary_btn_url }}"
                                                            data-sort_order="{{ $slider->sort_order }}"
                                                            data-is_active="{{ $slider->is_active ? '1' : '0' }}">
                                                        <i class="fal fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('admin.hero-sliders.destroy', $slider) }}"
                                                          method="POST"
                                                          class="d-inline m-0 form-delete-slider"
                                                          data-title="{{ $slider->title }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Slide">
                                                            <i class="fal fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                Belum ada data slide di tabel <code>hero_sliders</code>. Klik tombol <strong>+ Tambah Slide</strong> untuk menambahkan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ================= 8. TAB PESAN KONTAK (contact_messages) ================= -->
                <div class="tab-pane fade" id="tab-pesan" role="tabpanel">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h6 class="font-weight-bold mb-0">Pesan Masuk & Aspirasi Mutu (<code>contact_messages</code>)</h6>
                                <small class="text-muted">Daftar pesan yang dikirim melalui formulir pada halaman Kontak Kami</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-admin">
                                <thead>
                                    <tr>
                                        <th>Pengirim</th>
                                        <th>Email / Telepon</th>
                                        <th>Subjek</th>
                                        <th>Isi Pesan</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($messages as $msg)
                                        <tr>
                                            <td class="font-weight-bold">{{ $msg->name }}</td>
                                            <td>{{ $msg->email }}<br><small class="text-muted">{{ $msg->phone }}</small></td>
                                            <td>{{ $msg->subject }}</td>
                                            <td>{{ $msg->message }}</td>
                                            <td>{{ $msg->created_at }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                Belum ada pesan masuk di tabel <code>contact_messages</code>.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ================= 9. TAB PENGATURAN WEB (site_settings) ================= -->
                <div class="tab-pane fade" id="tab-settings" role="tabpanel">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h6 class="font-weight-bold mb-0">Pengaturan Profil, Visi-Misi, & Kontak (<code>site_settings</code>)</h6>
                                <small class="text-muted">Konfigurasi informasi umum Unit Penjaminan Mutu FICT</small>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form onsubmit="event.preventDefault(); alert('Pengaturan disimpan!');">
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="font-weight-bold small">Email Resmi Unit Mutu</label>
                                        <input type="email" class="form-control form-control-admin" value="pm.fict@horizon.ac.id">
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="font-weight-bold small">Nomor Telepon / WhatsApp</label>
                                        <input type="text" class="form-control form-control-admin" value="(0267) 845-8888">
                                    </div>
                                    <div class="col-12 form-group mb-3">
                                        <label class="font-weight-bold small">Alamat Kampus / Gedung FICT</label>
                                        <input type="text" class="form-control form-control-admin" value="Gedung FICT, Kampus Horizon University Indonesia, Jl. Pangkal Perjuangan By Pass KM. 1, Karawang">
                                    </div>
                                    <div class="col-12 form-group mb-3">
                                        <label class="font-weight-bold small">Tautan Google Maps</label>
                                        <input type="url" class="form-control form-control-admin" value="https://maps.app.goo.gl/DDstLPTdgou3sE1q7">
                                    </div>
                                    <div class="col-12 form-group mb-3">
                                        <label class="font-weight-bold small">Visi Penjaminan Mutu FICT</label>
                                        <textarea class="form-control form-control-admin" rows="3">Menjadi unit penjaminan mutu fakultas yang unggul, profesional, dan berintegritas tinggi dalam mengawal perwujudan budaya mutu Tridharma Perguruan Tinggi di bidang teknologi informasi dan komputasi yang berdaya saing nasional maupun internasional.</textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-sm px-4 py-2 font-weight-bold">
                                            <i class="fal fa-save mr-1"></i> Simpan Pengaturan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ================= 10. TAB DATA USERS (users) ================= -->
                <div class="tab-pane fade" id="tab-users" role="tabpanel">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h6 class="font-weight-bold mb-0">Data Pengguna / Admin (<code>users</code>)</h6>
                                <small class="text-muted">Daftar akun pengguna pada tabel migration <code>users</code></small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-admin">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">ID</th>
                                        <th>Username / Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users ?? [] as $u)
                                        <tr>
                                            <td>{{ $u->id }}</td>
                                            <td class="font-weight-bold">{{ $u->name }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td><span class="badge badge-primary">{{ $u->role ?? 'admin' }}</span></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">Belum ada data pengguna.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <!-- Footer Admin -->
        <footer class="bg-white border-top py-3 px-4 text-center text-muted small mt-auto">
            &copy; {{ date('Y') }} Penjaminan Mutu FICT - Horizon University Indonesia. All rights reserved.
        </footer>
    </div>
</div>

<!-- ================= MODAL TAMBAH DOKUMEN MUTU ================= -->
<div class="modal fade" id="modalTambahDokumen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-file-alt text-primary mr-1"></i> Tambah Dokumen Mutu Baru</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.quality-documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_tab" value="dokumen">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Kategori Dokumen <span class="text-danger">*</span></label>
                            <select name="category" id="create_dokumen_category" class="form-control form-control-admin" required>
                                <option value="kebijakan" {{ old('category') === 'kebijakan' ? 'selected' : '' }}>Dokumen Kebijakan Mutu</option>
                                <option value="standar" {{ old('category') === 'standar' ? 'selected' : '' }}>Dokumen Standar Mutu</option>
                                <option value="manual" {{ old('category') === 'manual' ? 'selected' : '' }}>Dokumen Manual Mutu (PPEPP)</option>
                                <option value="formulir" {{ old('category') === 'formulir' ? 'selected' : '' }}>Dokumen Formulir Mutu</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Kode Dokumen <span class="text-danger">*</span></label>
                            <input type="text" name="code" id="create_dokumen_code" class="form-control form-control-admin" value="{{ old('code') }}" placeholder="Contoh: KBJ-SPMI-06 / STD-SPMI-06" required>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Nama / Judul Dokumen <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control form-control-admin" value="{{ old('title') }}" placeholder="Masukkan judul dokumen mutu" required>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Format Berkas</label>
                            <select name="file_type" class="form-control form-control-admin">
                                @foreach(['PDF', 'DOCX', 'XLSX', 'DOCX / PDF', 'XLSX / PDF'] as $formatOpt)
                                    <option value="{{ $formatOpt }}" {{ old('file_type', 'PDF') === $formatOpt ? 'selected' : '' }}>{{ $formatOpt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Edisi / Versi</label>
                            <input type="text" name="edition" class="form-control form-control-admin" value="{{ old('edition', 'Versi 2026') }}" placeholder="Contoh: Revisi 2026 / Versi 2026">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Ukuran Berkas</label>
                            <input type="text" name="file_size" class="form-control form-control-admin" value="{{ old('file_size') }}" placeholder="Contoh: 1.8 MB / 850 KB">
                            <small class="text-muted">Otomatis terisi jika upload berkas</small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Upload Berkas Dokumen (Opsional)</label>
                            <input type="file" name="document_file" class="form-control-file form-control-admin p-1" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            <small class="text-muted">Format: PDF, DOC, DOCX, XLS, XLSX (Maks. 10MB)</small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Atau Tautan / Path Berkas</label>
                            <input type="text" name="file_path" class="form-control form-control-admin" value="{{ old('file_path', '#') }}" placeholder="Contoh: # atau URL Google Drive">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Urutan Tampil (Sort Order)</label>
                            <input type="number" name="sort_order" class="form-control form-control-admin" value="{{ old('sort_order', 6) }}" min="0">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Status Dokumen</label>
                            <select name="is_active" class="form-control form-control-admin">
                                <option value="1" selected>Aktif (Tampilkan di Halaman Unduhan)</option>
                                <option value="0">Nonaktif (Sembunyikan)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Simpan Dokumen
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL EDIT DOKUMEN MUTU ================= -->
<div class="modal fade" id="modalEditDokumen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-edit text-primary mr-1"></i> Edit Dokumen Mutu</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditDokumen" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_tab" value="dokumen">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Kategori Dokumen <span class="text-danger">*</span></label>
                            <select name="category" id="edit_dokumen_category" class="form-control form-control-admin" required>
                                <option value="kebijakan">Dokumen Kebijakan Mutu</option>
                                <option value="standar">Dokumen Standar Mutu</option>
                                <option value="manual">Dokumen Manual Mutu (PPEPP)</option>
                                <option value="formulir">Dokumen Formulir Mutu</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Kode Dokumen <span class="text-danger">*</span></label>
                            <input type="text" name="code" id="edit_dokumen_code" class="form-control form-control-admin" required>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Nama / Judul Dokumen <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="edit_dokumen_title" class="form-control form-control-admin" required>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Format Berkas</label>
                            <select name="file_type" id="edit_dokumen_file_type" class="form-control form-control-admin">
                                @foreach(['PDF', 'DOCX', 'XLSX', 'DOCX / PDF', 'XLSX / PDF'] as $formatOpt)
                                    <option value="{{ $formatOpt }}">{{ $formatOpt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Edisi / Versi</label>
                            <input type="text" name="edition" id="edit_dokumen_edition" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Ukuran Berkas</label>
                            <input type="text" name="file_size" id="edit_dokumen_file_size" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Ganti Berkas Dokumen (Opsional)</label>
                            <input type="file" name="document_file" class="form-control-file form-control-admin p-1" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti berkas</small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Tautan / Path Berkas Saat Ini</label>
                            <input type="text" name="file_path" id="edit_dokumen_file_path" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Urutan Tampil (Sort Order)</label>
                            <input type="number" name="sort_order" id="edit_dokumen_sort_order" class="form-control form-control-admin" min="0">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Status Dokumen</label>
                            <select name="is_active" id="edit_dokumen_is_active" class="form-control form-control-admin">
                                <option value="1">Aktif (Tampilkan di Halaman Unduhan)</option>
                                <option value="0">Nonaktif (Sembunyikan)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL TAMBAH BERITA ================= -->
<div class="modal fade" id="modalTambahBerita" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-newspaper text-primary mr-1"></i> Tulis Berita & Agenda Baru</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahBerita" action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_tab" value="berita">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 form-group mb-3">
                            <label class="font-weight-bold small">Judul Berita <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control form-control-admin" value="{{ old('title') }}" placeholder="Contoh: Pelaksanaan Audit Mutu Internal Semester Ganjil" required>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Label / Kategori Badge <span class="text-danger">*</span></label>
                            <select name="category_badge" class="form-control form-control-admin" required>
                                @foreach(['SPMI', 'LAMINFOKOM', 'BAN-PT', 'RTM', 'AMI', 'GKM', 'CPL', 'SOP', 'MONEV', 'AKREDITASI'] as $newsBadge)
                                    <option value="{{ $newsBadge }}" {{ old('category_badge', 'SPMI') === $newsBadge ? 'selected' : '' }}>{{ $newsBadge }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Path Gambar Thumbnail (Pilih / Ketik Path)</label>
                            <input type="text" name="thumbnail" list="presetFotoList" class="form-control form-control-admin" value="{{ old('thumbnail', 'img/foto/Meet1.jpeg') }}" placeholder="Contoh: img/foto/Meet1.jpeg">
                            <small class="text-muted">Bisa pilih dari <code>img/foto/Meet1.jpeg</code> s/d <code>Meet10.jpeg</code></small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Atau Upload Thumbnail Baru (Opsional)</label>
                            <input type="file" name="thumbnail_file" class="form-control-file form-control-admin p-1" accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">Format: JPG, PNG, WEBP (Maks. 4MB)</small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Tanggal Terbit</label>
                            <input type="date" name="published_at" class="form-control form-control-admin" value="{{ old('published_at', date('Y-m-d')) }}">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Status Publikasi</label>
                            <select name="is_published" class="form-control form-control-admin">
                                <option value="1" selected>Published (Tampilkan di Halaman Utama)</option>
                                <option value="0">Draft (Sembunyikan)</option>
                            </select>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Ringkasan Singkat (Excerpt)</label>
                            <textarea name="excerpt" class="form-control form-control-admin" rows="2" placeholder="Ringkasan singkat yang tampil di kartu berita halaman depan (opsional)">{{ old('excerpt') }}</textarea>
                        </div>
                        <div class="col-12 form-group mb-0">
                            <label class="font-weight-bold small">Isi Lengkap Berita <span class="text-danger">*</span></label>
                            <textarea name="content" id="create_berita_content" class="form-control form-control-admin" rows="5" placeholder="Tuliskan isi lengkap berita atau agenda kegiatan mutu...">{{ old('content') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Publikasikan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL EDIT BERITA ================= -->
<div class="modal fade" id="modalEditBerita" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-edit text-primary mr-1"></i> Edit Berita & Agenda</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditBerita" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_tab" value="berita">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 form-group mb-3">
                            <label class="font-weight-bold small">Judul Berita <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="edit_berita_title" class="form-control form-control-admin" required>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Label / Kategori Badge <span class="text-danger">*</span></label>
                            <select name="category_badge" id="edit_berita_category_badge" class="form-control form-control-admin" required>
                                @foreach(['SPMI', 'LAMINFOKOM', 'BAN-PT', 'RTM', 'AMI', 'GKM', 'CPL', 'SOP', 'MONEV', 'AKREDITASI'] as $newsBadge)
                                    <option value="{{ $newsBadge }}">{{ $newsBadge }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Path Gambar Thumbnail Saat Ini</label>
                            <input type="text" name="thumbnail" id="edit_berita_thumbnail" list="presetFotoList" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Ganti Thumbnail Baru (Opsional)</label>
                            <input type="file" name="thumbnail_file" class="form-control-file form-control-admin p-1" accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti thumbnail</small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Tanggal Terbit</label>
                            <input type="date" name="published_at" id="edit_berita_published_at" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Status Publikasi</label>
                            <select name="is_published" id="edit_berita_is_published" class="form-control form-control-admin">
                                <option value="1">Published (Tampilkan di Halaman Utama)</option>
                                <option value="0">Draft (Sembunyikan)</option>
                            </select>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Ringkasan Singkat (Excerpt)</label>
                            <textarea name="excerpt" id="edit_berita_excerpt" class="form-control form-control-admin" rows="2"></textarea>
                        </div>
                        <div class="col-12 form-group mb-0">
                            <label class="font-weight-bold small">Isi Lengkap Berita <span class="text-danger">*</span></label>
                            <textarea name="content" id="edit_berita_content" class="form-control form-control-admin" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL TAMBAH HERO SLIDER ================= -->
<div class="modal fade" id="modalTambahSlider" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-presentation text-primary mr-1"></i> Tambah Hero Slider Baru</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.hero-sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_tab" value="slider">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Tagline Badge Atas</label>
                            <input type="text" name="badge_text" class="form-control form-control-admin" value="{{ old('badge_text', 'SISTEM PENJAMINAN MUTU INTERNAL (SPMI)') }}" placeholder="Contoh: SISTEM PENJAMINAN MUTU INTERNAL (SPMI)">
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Judul Utama Slide <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control form-control-admin" value="{{ old('title') }}" placeholder="Masukkan judul utama hero slider" required>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Deskripsi Singkat</label>
                            <textarea name="description" class="form-control form-control-admin" rows="2" placeholder="Masukkan sub-judul atau deskripsi singkat">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Path Gambar Latar (Pilih / Ketik Path)</label>
                            <input type="text" name="image_path" list="presetFotoList" class="form-control form-control-admin" value="{{ old('image_path', 'img/foto/Meet1.jpeg') }}" placeholder="Contoh: img/foto/Meet1.jpeg">
                            <datalist id="presetFotoList">
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="img/foto/Meet{{ $i }}.jpeg">
                                @endfor
                            </datalist>
                            <small class="text-muted">Bisa pilih dari <code>img/foto/Meet1.jpeg</code> s/d <code>Meet10.jpeg</code></small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Atau Upload Gambar Baru (Opsional)</label>
                            <input type="file" name="image_file" class="form-control-file form-control-admin p-1" accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">Format: JPG, PNG, WEBP (Maks. 4MB)</small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Teks Tombol Utama (CTA 1)</label>
                            <input type="text" name="primary_btn_text" class="form-control form-control-admin" value="{{ old('primary_btn_text', 'Siklus PPEPP') }}" placeholder="Contoh: Siklus PPEPP">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">URL Tombol Utama (CTA 1)</label>
                            <input type="text" name="primary_btn_url" class="form-control form-control-admin" value="{{ old('primary_btn_url', '#ppepp') }}" placeholder="Contoh: #ppepp">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Teks Tombol Kedua (CTA 2)</label>
                            <input type="text" name="secondary_btn_text" class="form-control form-control-admin" value="{{ old('secondary_btn_text', 'Unduh Dokumen Mutu') }}" placeholder="Contoh: Unduh Dokumen Mutu">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">URL Tombol Kedua (CTA 2)</label>
                            <input type="text" name="secondary_btn_url" class="form-control form-control-admin" value="{{ old('secondary_btn_url', '#dokumen-standar-mutu') }}" placeholder="Contoh: #dokumen-standar-mutu">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Urutan Tampil (Sort Order)</label>
                            <input type="number" name="sort_order" class="form-control form-control-admin" value="{{ old('sort_order', ($heroSliders->count() ?? 0) + 1) }}" min="0">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Status Aktif</label>
                            <select name="is_active" class="form-control form-control-admin">
                                <option value="1" selected>Aktif (Tampilkan di Halaman Utama)</option>
                                <option value="0">Nonaktif (Sembunyikan)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Simpan Slide
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL EDIT HERO SLIDER ================= -->
<div class="modal fade" id="modalEditSlider" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-edit text-primary mr-1"></i> Edit Hero Slider</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditSlider" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_tab" value="slider">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Tagline Badge Atas</label>
                            <input type="text" name="badge_text" id="edit_badge_text" class="form-control form-control-admin">
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Judul Utama Slide <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="edit_title" class="form-control form-control-admin" required>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Deskripsi Singkat</label>
                            <textarea name="description" id="edit_description" class="form-control form-control-admin" rows="2"></textarea>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Path Gambar Latar Saat Ini</label>
                            <input type="text" name="image_path" id="edit_image_path" list="presetFotoList" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Ganti Gambar Baru (Opsional)</label>
                            <input type="file" name="image_file" class="form-control-file form-control-admin p-1" accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Teks Tombol Utama (CTA 1)</label>
                            <input type="text" name="primary_btn_text" id="edit_primary_btn_text" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">URL Tombol Utama (CTA 1)</label>
                            <input type="text" name="primary_btn_url" id="edit_primary_btn_url" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Teks Tombol Kedua (CTA 2)</label>
                            <input type="text" name="secondary_btn_text" id="edit_secondary_btn_text" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">URL Tombol Kedua (CTA 2)</label>
                            <input type="text" name="secondary_btn_url" id="edit_secondary_btn_url" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Urutan Tampil (Sort Order)</label>
                            <input type="number" name="sort_order" id="edit_sort_order" class="form-control form-control-admin" min="0">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Status Aktif</label>
                            <select name="is_active" id="edit_is_active" class="form-control form-control-admin">
                                <option value="1">Aktif (Tampilkan di Halaman Utama)</option>
                                <option value="0">Nonaktif (Sembunyikan)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL TAMBAH GALERI KEGIATAN ================= -->
<div class="modal fade" id="modalTambahGaleri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-images text-primary mr-1"></i> Tambah Foto Galeri Kegiatan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_tab" value="galeri">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 form-group mb-3">
                            <label class="font-weight-bold small">Judul Kegiatan <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control form-control-admin" value="{{ old('title') }}" placeholder="Contoh: Rapat Koordinasi Tim Mutu FICT" required>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Badge Kategori <span class="text-danger">*</span></label>
                            <select name="badge" class="form-control form-control-admin" required>
                                @foreach(['SPMI', 'GKM', 'CPL', 'RTM', 'SOP', 'MONEV', 'AMI', 'PTK', 'SARPRAS', 'AKREDITASI'] as $badgeOpt)
                                    <option value="{{ $badgeOpt }}" {{ old('badge', 'SPMI') === $badgeOpt ? 'selected' : '' }}>{{ $badgeOpt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Subjudul / Keterangan</label>
                            <input type="text" name="subtitle" class="form-control form-control-admin" value="{{ old('subtitle') }}" placeholder="Contoh: Pemetaan Standar Mutu Akademik">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Path Foto (Pilih / Ketik Path)</label>
                            <input type="text" name="image_path" list="presetFotoList" class="form-control form-control-admin" value="{{ old('image_path', 'img/foto/Meet1.jpeg') }}" placeholder="Contoh: img/foto/Meet1.jpeg">
                            <small class="text-muted">Bisa pilih dari <code>img/foto/Meet1.jpeg</code> s/d <code>Meet10.jpeg</code></small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Atau Upload Foto Baru (Opsional)</label>
                            <input type="file" name="image_file" class="form-control-file form-control-admin p-1" accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">Format: JPG, PNG, WEBP (Maks. 4MB)</small>
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Urutan Tampil (Sort Order)</label>
                            <input type="number" name="sort_order" class="form-control form-control-admin" value="{{ old('sort_order', ($galleries->count() ?? 0) + 1) }}" min="0">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Status Aktif</label>
                            <select name="is_active" class="form-control form-control-admin">
                                <option value="1" selected>Aktif (Tampilkan di Carousel)</option>
                                <option value="0">Nonaktif (Sembunyikan)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Simpan Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL EDIT GALERI KEGIATAN ================= -->
<div class="modal fade" id="modalEditGaleri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-edit text-primary mr-1"></i> Edit Foto Galeri Kegiatan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditGaleri" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_tab" value="galeri">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 form-group mb-3">
                            <label class="font-weight-bold small">Judul Kegiatan <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="edit_galeri_title" class="form-control form-control-admin" required>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="font-weight-bold small">Badge Kategori <span class="text-danger">*</span></label>
                            <select name="badge" id="edit_galeri_badge" class="form-control form-control-admin" required>
                                @foreach(['SPMI', 'GKM', 'CPL', 'RTM', 'SOP', 'MONEV', 'AMI', 'PTK', 'SARPRAS', 'AKREDITASI'] as $badgeOpt)
                                    <option value="{{ $badgeOpt }}">{{ $badgeOpt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Subjudul / Keterangan</label>
                            <input type="text" name="subtitle" id="edit_galeri_subtitle" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Path Foto Saat Ini</label>
                            <input type="text" name="image_path" id="edit_galeri_image_path" list="presetFotoList" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Ganti Foto Baru (Opsional)</label>
                            <input type="file" name="image_file" class="form-control-file form-control-admin p-1" accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto</small>
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Urutan Tampil (Sort Order)</label>
                            <input type="number" name="sort_order" id="edit_galeri_sort_order" class="form-control form-control-admin" min="0">
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="font-weight-bold small">Status Aktif</label>
                            <select name="is_active" id="edit_galeri_is_active" class="form-control form-control-admin">
                                <option value="1">Aktif (Tampilkan di Carousel)</option>
                                <option value="0">Nonaktif (Sembunyikan)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL TAMBAH STRUKTUR ORGANISASI ================= -->
@php
    $presetOrgIcons = [
        'fas fa-user-tie' => 'fas fa-user-tie (Pimpinan / Dekan)',
        'fas fa-award' => 'fas fa-award (Ketua Gugus Mutu)',
        'fas fa-clipboard-check' => 'fas fa-clipboard-check (Auditor AMI)',
        'fas fa-laptop-code' => 'fas fa-laptop-code (GKM Prodi ICT)',
        'fas fa-users-cog' => 'fas fa-users-cog (Koordinator / Tim)',
        'fas fa-sitemap' => 'fas fa-sitemap (Struktur / Unit)',
        'fas fa-shield-alt' => 'fas fa-shield-alt (Penjaminan Mutu)',
        'fas fa-graduation-cap' => 'fas fa-graduation-cap (Akademik)',
        'fas fa-chalkboard-teacher' => 'fas fa-chalkboard-teacher (Dosen / Pengajar)',
        'fas fa-check-double' => 'fas fa-check-double (Evaluasi & Pengendalian)',
    ];
@endphp
<div class="modal fade" id="modalTambahStruktur" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-sitemap text-primary mr-1"></i> Tambah Jabatan Struktur Organisasi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.organization-structures.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_tab" value="struktur">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Jabatan Struktural <span class="text-danger">*</span></label>
                            <input type="text" name="position_title" class="form-control form-control-admin" value="{{ old('position_title') }}" placeholder="Contoh: Dekan FICT / Ketua Gugus Mutu" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Nama Pejabat / Personil (Opsional)</label>
                            <input type="text" name="person_name" class="form-control form-control-admin" value="{{ old('person_name') }}" placeholder="Contoh: Dr. Nama Lengkap, M.Kom.">
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Fungsi & Tanggung Jawab</label>
                            <input type="text" name="role_description" class="form-control form-control-admin" value="{{ old('role_description') }}" placeholder="Contoh: Pengarah & Penanggung Jawab SPMI Fakultas">
                        </div>
                        <div class="col-md-4 form-group mb-0">
                            <label class="font-weight-bold small">Ikon Jabatan <span class="text-danger">*</span></label>
                            <select name="icon_class" class="form-control form-control-admin" required>
                                @foreach($presetOrgIcons as $iconVal => $iconLabel)
                                    <option value="{{ $iconVal }}" {{ old('icon_class', 'fas fa-user-tie') === $iconVal ? 'selected' : '' }}>{{ $iconLabel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group mb-0">
                            <label class="font-weight-bold small">Urutan Tampil (Sort Order)</label>
                            <input type="number" name="sort_order" class="form-control form-control-admin" value="{{ old('sort_order', ($organizationStructures->count() ?? 0) + 1) }}" min="0">
                        </div>
                        <div class="col-md-4 form-group mb-0">
                            <label class="font-weight-bold small">Status Aktif</label>
                            <select name="is_active" class="form-control form-control-admin">
                                <option value="1" selected>Aktif (Tampilkan)</option>
                                <option value="0">Nonaktif (Sembunyikan)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Simpan Jabatan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL EDIT STRUKTUR ORGANISASI ================= -->
<div class="modal fade" id="modalEditStruktur" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold"><i class="fal fa-edit text-primary mr-1"></i> Edit Jabatan Struktur Organisasi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditStruktur" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="_tab" value="struktur">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Jabatan Struktural <span class="text-danger">*</span></label>
                            <input type="text" name="position_title" id="edit_struktur_position_title" class="form-control form-control-admin" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="font-weight-bold small">Nama Pejabat / Personil (Opsional)</label>
                            <input type="text" name="person_name" id="edit_struktur_person_name" class="form-control form-control-admin">
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="font-weight-bold small">Fungsi & Tanggung Jawab</label>
                            <input type="text" name="role_description" id="edit_struktur_role_description" class="form-control form-control-admin">
                        </div>
                        <div class="col-md-4 form-group mb-0">
                            <label class="font-weight-bold small">Ikon Jabatan <span class="text-danger">*</span></label>
                            <select name="icon_class" id="edit_struktur_icon_class" class="form-control form-control-admin" required>
                                @foreach($presetOrgIcons as $iconVal => $iconLabel)
                                    <option value="{{ $iconVal }}">{{ $iconLabel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group mb-0">
                            <label class="font-weight-bold small">Urutan Tampil (Sort Order)</label>
                            <input type="number" name="sort_order" id="edit_struktur_sort_order" class="form-control form-control-admin" min="0">
                        </div>
                        <div class="col-md-4 form-group mb-0">
                            <label class="font-weight-bold small">Status Aktif</label>
                            <select name="is_active" id="edit_struktur_is_active" class="form-control form-control-admin">
                                <option value="1">Aktif (Tampilkan)</option>
                                <option value="0">Nonaktif (Sembunyikan)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fal fa-save mr-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts Bawaan Template di public/js -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@41.4.2/build/ckeditor.js"></script>
<script>
    if (typeof ClassicEditor === 'undefined') {
        document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/41.4.2/ckeditor.min.js"><\/script>');
    }
</script>
<script>
    $(function () {
        if ($.fn.modal && $.fn.modal.Constructor) {
            $.fn.modal.Constructor.prototype._enforceFocus = function () {};
        }

        var createBeritaEditor = null;
        var editBeritaEditor = null;
        var pendingEditContent = '';
        var ckToolbarConfig = {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'link',
                'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', '|',
                'undo', 'redo'
            ]
        };

        function initBeritaEditors() {
            if (typeof ClassicEditor === 'undefined') {
                return;
            }

            var createEl = document.querySelector('#create_berita_content');
            if (createEl && !createBeritaEditor && !createEl.dataset.ckInitialized) {
                createEl.dataset.ckInitialized = '1';
                ClassicEditor.create(createEl, ckToolbarConfig)
                    .then(function (editor) {
                        createBeritaEditor = editor;
                    })
                    .catch(function (err) {
                        createEl.dataset.ckInitialized = '';
                        console.error(err);
                    });
            }

            var editEl = document.querySelector('#edit_berita_content');
            if (editEl && !editBeritaEditor && !editEl.dataset.ckInitialized) {
                editEl.dataset.ckInitialized = '1';
                ClassicEditor.create(editEl, ckToolbarConfig)
                    .then(function (editor) {
                        editBeritaEditor = editor;
                        if (pendingEditContent !== '') {
                            editBeritaEditor.setData(String(pendingEditContent));
                        }
                    })
                    .catch(function (err) {
                        editEl.dataset.ckInitialized = '';
                        console.error(err);
                    });
            }
        }

        initBeritaEditors();

        $('#modalTambahBerita, #modalEditBerita').on('shown.bs.modal', function () {
            initBeritaEditors();
        });
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            didOpen: function (toast) {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        @if(session('status') || session('success'))
            Toast.fire({
                icon: 'success',
                title: @json(session('status') ?? session('success'))
            });
        @endif

        @if(session('warning'))
            Toast.fire({
                icon: 'warning',
                title: @json(session('warning'))
            });
        @endif

        @if(session('error'))
            Toast.fire({
                icon: 'error',
                title: @json(session('error'))
            });
        @endif

        @if($errors->any())
            Toast.fire({
                icon: 'error',
                title: @json($errors->first())
            });
        @endif

        $('#openSidebar').on('click', function () {
            $('#adminSidebar, #sidebarBackdrop').addClass('show');
        });
        $('#closeSidebar, #sidebarBackdrop').on('click', function () {
            $('#adminSidebar, #sidebarBackdrop').removeClass('show');
        });
        $('#adminTab .nav-link').on('click', function () {
            $('#adminSidebar, #sidebarBackdrop').removeClass('show');
        });

        $('.btn-edit-slider').on('click', function () {
            var btn = $(this);
            $('#formEditSlider').attr('action', btn.data('action'));
            $('#edit_badge_text').val(btn.data('badge_text'));
            $('#edit_title').val(btn.data('title'));
            $('#edit_description').val(btn.data('description'));
            $('#edit_image_path').val(btn.data('image_path'));
            $('#edit_primary_btn_text').val(btn.data('primary_btn_text'));
            $('#edit_primary_btn_url').val(btn.data('primary_btn_url'));
            $('#edit_secondary_btn_text').val(btn.data('secondary_btn_text'));
            $('#edit_secondary_btn_url').val(btn.data('secondary_btn_url'));
            $('#edit_sort_order').val(btn.data('sort_order'));
            $('#edit_is_active').val(String(btn.data('is_active')));
        });

        $('.form-delete-slider').on('submit', function (e) {
            e.preventDefault();
            var form = this;
            var slideTitle = $(this).data('title') || 'slide ini';

            Swal.fire({
                title: 'Hapus Slide Hero?',
                text: 'Slide "' + slideTitle + '" akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        $('.btn-edit-galeri').on('click', function () {
            var btn = $(this);
            $('#formEditGaleri').attr('action', btn.data('action'));
            $('#edit_galeri_title').val(btn.data('title'));
            $('#edit_galeri_subtitle').val(btn.data('subtitle'));
            $('#edit_galeri_badge').val(btn.data('badge'));
            $('#edit_galeri_image_path').val(btn.data('image_path'));
            $('#edit_galeri_sort_order').val(btn.data('sort_order'));
            $('#edit_galeri_is_active').val(String(btn.data('is_active')));
        });

        $('.form-delete-galeri').on('submit', function (e) {
            e.preventDefault();
            var form = this;
            var galeriTitle = $(this).data('title') || 'foto kegiatan ini';

            Swal.fire({
                title: 'Hapus Foto Galeri?',
                text: 'Foto kegiatan "' + galeriTitle + '" akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        $('.btn-edit-berita').on('click', function () {
            var btn = $(this);
            var contentHtml = btn.data('content') || '';
            pendingEditContent = String(contentHtml);
            $('#formEditBerita').attr('action', btn.data('action'));
            $('#edit_berita_title').val(btn.data('title'));
            $('#edit_berita_category_badge').val(btn.data('category_badge'));
            $('#edit_berita_excerpt').val(btn.data('excerpt'));
            $('#edit_berita_content').val(contentHtml);
            if (editBeritaEditor) {
                editBeritaEditor.setData(String(contentHtml));
            }
            $('#edit_berita_thumbnail').val(btn.data('thumbnail'));
            $('#edit_berita_published_at').val(btn.data('published_at'));
            $('#edit_berita_is_published').val(String(btn.data('is_published')));
        });

        $('#formTambahBerita').on('submit', function (e) {
            if (createBeritaEditor) {
                var data = createBeritaEditor.getData();
                $('#create_berita_content').val(data);
                if (!data.replace(/<[^>]*>/g, '').trim()) {
                    e.preventDefault();
                    Toast.fire({
                        icon: 'warning',
                        title: 'Isi lengkap berita wajib diisi.'
                    });
                }
            }
        });

        $('#formEditBerita').on('submit', function (e) {
            if (editBeritaEditor) {
                var data = editBeritaEditor.getData();
                $('#edit_berita_content').val(data);
                if (!data.replace(/<[^>]*>/g, '').trim()) {
                    e.preventDefault();
                    Toast.fire({
                        icon: 'warning',
                        title: 'Isi lengkap berita wajib diisi.'
                    });
                }
            }
        });

        $('.form-delete-berita').on('submit', function (e) {
            e.preventDefault();
            var form = this;
            var beritaTitle = $(this).data('title') || 'berita ini';

            Swal.fire({
                title: 'Hapus Berita & Agenda?',
                text: 'Berita "' + beritaTitle + '" akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        $('.btn-edit-struktur').on('click', function () {
            var btn = $(this);
            $('#formEditStruktur').attr('action', btn.data('action'));
            $('#edit_struktur_position_title').val(btn.data('position_title'));
            $('#edit_struktur_person_name').val(btn.data('person_name'));
            $('#edit_struktur_role_description').val(btn.data('role_description'));
            $('#edit_struktur_icon_class').val(btn.data('icon_class'));
            $('#edit_struktur_sort_order').val(btn.data('sort_order'));
            $('#edit_struktur_is_active').val(String(btn.data('is_active')));
        });

        $('.form-delete-struktur').on('submit', function (e) {
            e.preventDefault();
            var form = this;
            var strukturTitle = $(this).data('title') || 'jabatan ini';

            Swal.fire({
                title: 'Hapus Jabatan Struktur?',
                text: 'Jabatan "' + strukturTitle + '" akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        $('#filterKategoriDokumen').on('change', function () {
            var selectedCat = $(this).val();
            var visibleNo = 1;
            $('#tabelDokumenMutu tbody tr[data-category]').each(function () {
                var rowCat = $(this).data('category');
                if (selectedCat === 'all' || rowCat === selectedCat) {
                    $(this).show();
                    $(this).find('td:first').text(visibleNo++);
                } else {
                    $(this).hide();
                }
            });
        });

        $('.btn-edit-dokumen').on('click', function () {
            var btn = $(this);
            $('#formEditDokumen').attr('action', btn.data('action'));
            $('#edit_dokumen_category').val(btn.data('category'));
            $('#edit_dokumen_code').val(btn.data('code'));
            $('#edit_dokumen_title').val(btn.data('title'));
            $('#edit_dokumen_edition').val(btn.data('edition'));
            $('#edit_dokumen_file_type').val(btn.data('file_type') || 'PDF');
            $('#edit_dokumen_file_size').val(btn.data('file_size'));
            $('#edit_dokumen_file_path').val(btn.data('file_path'));
            $('#edit_dokumen_sort_order').val(btn.data('sort_order'));
            $('#edit_dokumen_is_active').val(String(btn.data('is_active')));
        });

        $('.form-delete-dokumen').on('submit', function (e) {
            e.preventDefault();
            var form = this;
            var docTitle = $(this).data('title') || 'dokumen ini';

            Swal.fire({
                title: 'Hapus Dokumen Mutu?',
                text: 'Dokumen "' + docTitle + '" akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        @if(session('active_tab') === 'slider' || old('_tab') === 'slider')
            $('#tab-slider-link').tab('show');
        @elseif(session('active_tab') === 'galeri' || old('_tab') === 'galeri')
            $('#tab-galeri-link').tab('show');
        @elseif(session('active_tab') === 'berita' || old('_tab') === 'berita')
            $('#tab-berita-link').tab('show');
        @elseif(session('active_tab') === 'struktur' || old('_tab') === 'struktur')
            $('#tab-struktur-link').tab('show');
        @elseif(session('active_tab') === 'dokumen' || old('_tab') === 'dokumen')
            $('#tab-dokumen-link').tab('show');
        @endif

        if (window.location.hash) {
            var targetTab = $('#adminTab a[href="' + window.location.hash + '"]');
            if (targetTab.length) {
                targetTab.tab('show');
            }
        }
    });
</script>
</body>
</html>
