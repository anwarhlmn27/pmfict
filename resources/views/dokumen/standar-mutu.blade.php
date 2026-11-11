@extends('layouts.main')

@section('title', 'Dokumen Standar Mutu - Penjaminan Mutu FICT')

@section('content')

<!-- ================= PAGE BANNER ================= -->
<section class="page-banner-wrap bg-cover" style="background-image: linear-gradient(rgba(15, 41, 66, 0.85), rgba(15, 41, 66, 0.90)), url('{{ asset('img/foto/Meet2.jpeg') }}');">
    <div class="banner-text">STANDAR</div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <div class="page-heading text-white">
                    <div class="page-title">
                        <h1>Dokumen Standar Mutu</h1>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/#download') }}">Download</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dokumen Standar Mutu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ================= KONTEN DOKUMEN STANDAR MUTU ================= -->
<section class="dokumen-section bg-light">
    <div class="container">
        <!-- Navigasi Antar Halaman Dokumen Mutu -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-white p-3 rounded shadow-sm border d-flex flex-wrap justify-content-center" style="gap: 10px;">
                    <a href="{{ route('download.kebijakan-mutu') }}" class="btn btn-outline-primary font-weight-bold px-4 py-2">
                        <i class="fas fa-shield-alt mr-2"></i> Kebijakan Mutu
                    </a>
                    <a href="{{ route('download.standar-mutu') }}" class="btn btn-primary font-weight-bold px-4 py-2">
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

        <!-- Ringkasan Informasi Standar Mutu -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm border">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <span class="badge badge-primary px-3 py-1 mb-2">PILAR 02 SPMI</span>
                            <h4 class="font-weight-bold text-dark mb-2">Tentang Standar Mutu FICT</h4>
                            <p class="text-muted mb-0">
                                <strong>Dokumen Standar Mutu</strong> berisi berbagai kriteria, ukuran, patokan, atau spesifikasi minimal dan melampaui SN-Dikti dalam penyelenggaraan pendidikan, penelitian, dan pengabdian kepada masyarakat di lingkungan Fakultas Informatika & Komputer.
                            </p>
                        </div>
                        <div class="col-lg-4 mt-3 mt-lg-0 border-left-lg pl-lg-4">
                            <h6 class="font-weight-bold text-dark mb-2"><i class="fas fa-check-circle text-primary mr-2"></i>Ruang Lingkup Standar:</h6>
                            <ul class="list-unstyled text-muted small mb-0" style="line-height: 1.8;">
                                <li><i class="fas fa-angle-right text-primary mr-2"></i> 8 Standar Nasional Pendidikan</li>
                                <li><i class="fas fa-angle-right text-primary mr-2"></i> 8 Standar Nasional Penelitian</li>
                                <li><i class="fas fa-angle-right text-primary mr-2"></i> 8 Standar Nasional Pengabdian (PKM)</li>
                                <li><i class="fas fa-angle-right text-primary mr-2"></i> Standar Tambahan Bidang ICT</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Dokumen Standar Mutu -->
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm border">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="font-weight-bold text-dark mb-1"><i class="fas fa-folder-open text-primary mr-2"></i> Daftar Dokumen Standar Mutu</h4>
                            <small class="text-muted">Unduh dokumen resmi Standar SPMI Fakultas Informatika & Komputer</small>
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
                                    <td><span class="badge badge-primary px-2 py-1">STD-SPMI-01</span></td>
                                    <td class="font-weight-bold text-dark">Standar Kompetensi Lulusan (SKL) & Capaian Pembelajaran Lulusan (CPL)</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • Versi 2026</td>
                                    <td class="text-center text-muted">2.4 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh Standar Kompetensi Lulusan')">
                                            <i class="fas fa-download mr-1"></i> Unduh
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center font-weight-bold">2</td>
                                    <td><span class="badge badge-primary px-2 py-1">STD-SPMI-02</span></td>
                                    <td class="font-weight-bold text-dark">Standar Isi Pembelajaran & Kurikulum OBE</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • Versi 2026</td>
                                    <td class="text-center text-muted">3.1 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh Standar Isi Pembelajaran')">
                                            <i class="fas fa-download mr-1"></i> Unduh
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center font-weight-bold">3</td>
                                    <td><span class="badge badge-primary px-2 py-1">STD-SPMI-03</span></td>
                                    <td class="font-weight-bold text-dark">Standar Proses & Penilaian Pembelajaran</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • Versi 2026</td>
                                    <td class="text-center text-muted">1.9 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh Standar Proses Pembelajaran')">
                                            <i class="fas fa-download mr-1"></i> Unduh
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center font-weight-bold">4</td>
                                    <td><span class="badge badge-primary px-2 py-1">STD-SPMI-04</span></td>
                                    <td class="font-weight-bold text-dark">Standar Dosen & Tenaga Kependidikan</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • Versi 2026</td>
                                    <td class="text-center text-muted">1.5 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh Standar Dosen & Tendik')">
                                            <i class="fas fa-download mr-1"></i> Unduh
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center font-weight-bold">5</td>
                                    <td><span class="badge badge-primary px-2 py-1">STD-SPMI-05</span></td>
                                    <td class="font-weight-bold text-dark">Standar Sarana, Prasarana & Laboratorium ICT</td>
                                    <td><i class="far fa-file-pdf text-danger mr-1"></i> PDF • Versi 2026</td>
                                    <td class="text-center text-muted">2.8 MB</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary px-3" onclick="alert('Mengunduh Standar Sarana Prasarana')">
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
