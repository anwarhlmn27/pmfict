@extends('layouts.main')

@section('title', 'Dokumen Manual Mutu - Penjaminan Mutu FICT')

@section('content')

<!-- ================= PAGE BANNER ================= -->
<section class="page-banner-wrap bg-cover" style="background-image: linear-gradient(rgba(15, 41, 66, 0.85), rgba(15, 41, 66, 0.90)), url('{{ asset('img/foto/Meet4.jpeg') }}');">
    <div class="banner-text">MANUAL</div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <div class="page-heading text-white">
                    <div class="page-title">
                        <h1>Dokumen Manual Mutu</h1>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/#download') }}">Download</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dokumen Manual Mutu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ================= KONTEN DOKUMEN MANUAL MUTU ================= -->
<section class="dokumen-section bg-light">
    <div class="container">
        <!-- Navigasi Antar Halaman Dokumen Mutu -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-white p-3 rounded shadow-sm border d-flex flex-wrap justify-content-center" style="gap: 10px;">
                    <a href="{{ route('download.kebijakan-mutu') }}" class="btn btn-outline-primary font-weight-bold px-4 py-2">
                        <i class="fas fa-shield-alt mr-2"></i> Kebijakan Mutu
                    </a>
                    <a href="{{ route('download.standar-mutu') }}" class="btn btn-outline-primary font-weight-bold px-4 py-2">
                        <i class="fas fa-file-alt mr-2"></i> Standar Mutu
                    </a>
                    <a href="{{ route('download.manual-mutu') }}" class="btn btn-primary font-weight-bold px-4 py-2">
                        <i class="fas fa-book mr-2"></i> Manual Mutu
                    </a>
                    <a href="{{ route('download.formulir-mutu') }}" class="btn btn-outline-primary font-weight-bold px-4 py-2">
                        <i class="fas fa-clipboard-list mr-2"></i> Formulir Mutu
                    </a>
                </div>
            </div>
        </div>

        <!-- Ringkasan Informasi Manual Mutu -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm border">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <span class="badge badge-info px-3 py-1 mb-2">PILAR 03 SPMI</span>
                            <h4 class="font-weight-bold text-dark mb-2">Tentang Manual Mutu FICT</h4>
                            <p class="text-muted mb-0">
                                <strong>Dokumen Manual Mutu (Manual PPEPP)</strong> berisi petunjuk teknis dan prosedur operasional baku mengenai cara menetapkan, melaksanakan, mengevaluasi, mengendalikan, dan meningkatkan setiap Standar SPMI secara berkelanjutan di Fakultas Informatika & Komputer.
                            </p>
                        </div>
                        <div class="col-lg-4 mt-3 mt-lg-0 border-left-lg pl-lg-4">
                            <h6 class="font-weight-bold text-dark mb-2"><i class="fas fa-check-circle text-info mr-2"></i>Siklus Manual PPEPP:</h6>
                            <ul class="list-unstyled text-muted small mb-0" style="line-height: 1.8;">
                                <li><i class="fas fa-angle-right text-info mr-2"></i> Manual Penetapan & Pelaksanaan (P)</li>
                                <li><i class="fas fa-angle-right text-info mr-2"></i> Manual Evaluasi & AMI (E)</li>
                                <li><i class="fas fa-angle-right text-info mr-2"></i> Manual Pengendalian & RTM (P)</li>
                                <li><i class="fas fa-angle-right text-info mr-2"></i> Manual Peningkatan Standar (P)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Dokumen Manual Mutu -->
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm border">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="font-weight-bold text-dark mb-1"><i class="fas fa-folder-open text-info mr-2"></i> Daftar Dokumen Manual Mutu</h4>
                            <small class="text-muted">Unduh pedoman prosedur siklus PPEPP Fakultas Informatika & Komputer</small>
                        </div>
                        <span class="badge badge-light border px-3 py-2 text-dark mt-2 mt-sm-0">Total: {{ ($documents ?? collect())->count() }} Dokumen</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-dokumen-mutu">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 60px;">No</th>
                                    <th style="width: 150px;">Kode Dokumen</th>
                                    <th>Nama Dokumen</th>
                                    <th style="width: 210px;">Format / Keterangan</th>
                                    <th class="text-center" style="width: 110px;">Ukuran</th>
                                    <th class="text-center" style="width: 130px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($documents ?? [] as $index => $doc)
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ $index + 1 }}</td>
                                        <td><span class="badge badge-info px-2 py-1">{{ $doc->code }}</span></td>
                                        <td class="font-weight-bold text-dark">{{ $doc->title }}</td>
                                        <td><i class="{{ $doc->fileIconClass() }} mr-1"></i> {{ $doc->file_type }}{{ $doc->edition ? ' • ' . $doc->edition : '' }}</td>
                                        <td class="text-center text-muted">{{ $doc->file_size ?? '-' }}</td>
                                        <td class="text-center">
                                            @if($doc->fileUrl() !== '#')
                                                <a href="{{ $doc->fileUrl() }}" target="_blank" download class="btn btn-sm btn-info px-3">
                                                    <i class="fas fa-download mr-1"></i> Unduh
                                                </a>
                                            @else
                                                <button class="btn btn-sm btn-info px-3" onclick="alert('Mengunduh {{ addslashes($doc->title) }}')">
                                                    <i class="fas fa-download mr-1"></i> Unduh
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">Belum ada dokumen manual mutu.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
