@extends('layouts.main')

@section('title', 'Dokumen Kebijakan Mutu - Penjaminan Mutu FICT')

@section('content')

<!-- ================= PAGE BANNER ================= -->
<section class="page-banner-wrap bg-cover" style="background-image: linear-gradient(rgba(15, 41, 66, 0.85), rgba(15, 41, 66, 0.90)), url('{{ asset('img/foto/Meet1.jpeg') }}');">
    <div class="banner-text">KEBIJAKAN</div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <div class="page-heading text-white">
                    <div class="page-title">
                        <h1>Dokumen Kebijakan Mutu</h1>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/#download') }}">Download</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dokumen Kebijakan Mutu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ================= KONTEN DOKUMEN KEBIJAKAN MUTU ================= -->
<section class="dokumen-section bg-light">
    <div class="container">
        <!-- Navigasi Antar Halaman Dokumen Mutu -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-white p-3 rounded shadow-sm border d-flex flex-wrap justify-content-center" style="gap: 10px;">
                    <a href="{{ route('download.kebijakan-mutu') }}" class="btn btn-primary font-weight-bold px-4 py-2">
                        <i class="fas fa-shield-alt mr-2"></i> Kebijakan Mutu
                    </a>
                    <a href="{{ route('download.standar-mutu') }}" class="btn btn-outline-primary font-weight-bold px-4 py-2">
                        <i class="fas fa-file-alt mr-2"></i> Standar Mutu
                    </a>
                    <a href="{{ route('download.manual-mutu') }}" class="btn btn-outline-primary font-weight-bold px-4 py-2">
                        <i class="fas fa-book mr-2"></i> Manual Mutu
                    </a>
                    <a href="{{ route('download.formulir-mutu') }}" class="btn btn-outline-primary font-weight-bold px-4 py-2">
                        <i class="fas fa-clipboard-list mr-2"></i> Formulir Mutu
                    </a>
                </div>
            </div>
        </div>

        <!-- Ringkasan Informasi Kebijakan Mutu -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm border">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <span class="badge badge-primary px-3 py-1 mb-2">PILAR 01 SPMI</span>
                            <h4 class="font-weight-bold text-dark mb-2">Tentang Kebijakan Mutu FICT</h4>
                            <p class="text-muted mb-0">
                                <strong>Dokumen Kebijakan Mutu</strong> merupakan dokumen tertulis utama yang berisi garis besar penjelasan tentang bagaimana Fakultas Informatika & Komputer (FICT) memahami, merancang, dan mengimplementasikan Sistem Penjaminan Mutu Internal (SPMI) dalam penyelenggaraan pelayanan Tridharma Perguruan Tinggi.
                            </p>
                        </div>
                        <div class="col-lg-4 mt-3 mt-lg-0 border-left-lg pl-lg-4">
                            <h6 class="font-weight-bold text-dark mb-2"><i class="fas fa-check-circle text-primary mr-2"></i>Cakupan Dokumen:</h6>
                            <ul class="list-unstyled text-muted small mb-0" style="line-height: 1.8;">
                                <li><i class="fas fa-angle-right text-primary mr-2"></i> Visi, Misi, & Tujuan Penjaminan Mutu</li>
                                <li><i class="fas fa-angle-right text-primary mr-2"></i> Landasan Hukum & Kebijakan SN-Dikti</li>
                                <li><i class="fas fa-angle-right text-primary mr-2"></i> Prinsip Pelaksanaan Siklus PPEPP</li>
                                <li><i class="fas fa-angle-right text-primary mr-2"></i> Tata Kelola Gugus Kendali Mutu</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Dokumen Kebijakan Mutu -->
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm border">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="font-weight-bold text-dark mb-1"><i class="fas fa-folder-open text-primary mr-2"></i> Daftar Dokumen Kebijakan Mutu</h4>
                            <small class="text-muted">Unduh dokumen resmi Kebijakan SPMI Fakultas Informatika & Komputer</small>
                        </div>
                        <span class="badge badge-light border px-3 py-2 text-dark mt-2 mt-sm-0">Total: 5 Dokumen</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-dokumen-mutu">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 60px;">No</th>
                                    <th style="width: 150px;">Kode Dokumen</th>
                                    <th>Nama Dokumen</th>
                                    <th style="width: 190px;">Format / Edisi</th>
                                    <th class="text-center" style="width: 110px;">Ukuran</th>
                                    <th class="text-center" style="width: 130px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center font-weight-bold">1</td>
                                    <td><span class="badge badge-primary px-2 py-1">KBJ-SPMI-01</span></td>
                                    <td class="font-weight-bold text-dark">Buku Kebijakan Sistem Penjaminan Mutu Internal (SPMI) FICT</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • Revisi 2026</td>
                                    <td class="text-center text-muted">2.6 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh Buku Kebijakan SPMI FICT')">
                                            <i class="fas fa-download mr-1"></i> Unduh
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center font-weight-bold">2</td>
                                    <td><span class="badge badge-primary px-2 py-1">KBJ-SPMI-02</span></td>
                                    <td class="font-weight-bold text-dark">Keputusan Dekan tentang Struktur & Tata Kerja Gugus Penjaminan Mutu</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • SK Dekan 2026</td>
                                    <td class="text-center text-muted">1.4 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh SK Dekan Gugus Penjaminan Mutu')">
                                            <i class="fas fa-download mr-1"></i> Unduh
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center font-weight-bold">3</td>
                                    <td><span class="badge badge-primary px-2 py-1">KBJ-SPMI-03</span></td>
                                    <td class="font-weight-bold text-dark">Kebijakan Kurikulum Berbasis Outcome-Based Education (OBE) FICT</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • Versi 2026</td>
                                    <td class="text-center text-muted">2.1 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh Kebijakan Kurikulum OBE FICT')">
                                            <i class="fas fa-download mr-1"></i> Unduh
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center font-weight-bold">4</td>
                                    <td><span class="badge badge-primary px-2 py-1">KBJ-SPMI-04</span></td>
                                    <td class="font-weight-bold text-dark">Kebijakan Mutu Penelitian, Publikasi Ilmiah, dan Pengabdian Masyarakat</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • Versi 2026</td>
                                    <td class="text-center text-muted">1.8 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh Kebijakan Mutu Penelitian & PKM')">
                                            <i class="fas fa-download mr-1"></i> Unduh
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center font-weight-bold">5</td>
                                    <td><span class="badge badge-primary px-2 py-1">KBJ-SPMI-05</span></td>
                                    <td class="font-weight-bold text-dark">Pedoman Etika Akademik dan Budaya Mutu Civitas Akademika FICT</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • Versi 2026</td>
                                    <td class="text-center text-muted">1.5 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh Pedoman Etika Akademik FICT')">
                                            <i class="fas fa-download mr-1"></i> Unduh
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
