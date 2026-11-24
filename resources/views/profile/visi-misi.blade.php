@extends('layouts.main')

@section('title', 'Visi dan Misi - Penjaminan Mutu FICT')

@section('content')

<!-- ================= PAGE BANNER ================= -->
<section class="page-banner-wrap bg-cover" style="background-image: linear-gradient(rgba(15, 41, 66, 0.85), rgba(15, 41, 66, 0.90)), url('{{ asset('img/foto/Meet3.jpeg') }}');">
    <div class="banner-text">VISI MISI</div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <div class="page-heading text-white">
                    <div class="page-title">
                        <h1>Visi & Misi Penjaminan Mutu FICT</h1>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/#profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Visi dan Misi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ================= SECTION VISI & MISI ================= -->
<section class="about-wrapper techex-landing-page pt-70 pb-70 bg-light">
    <div class="container">
        <div id="visi-misi" class="bg-white p-4 p-lg-5 rounded shadow-sm border">
            <div class="row align-items-center">
                <div class="col-lg-6 pr-lg-4 mb-4 mb-lg-0">
                    <div class="about-img" data-aos="fade-right">
                        <img src="{{ asset('img/foto/Meet3.jpeg') }}" class="img-fluid rounded shadow" alt="Visi Misi Mutu FICT" style="width: 100%; max-height: 380px; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pl-lg-4">
                    <div class="section-title">
                        <a class="theme-btn-sm mb-15" data-aos="fade-left">PROFIL UNIT</a>
                        <h1 data-aos="fade-left" data-aos-delay="100">Visi & Misi Penjaminan Mutu FICT</h1>
                        <div data-aos="fade-left" data-aos-delay="150" class="mt-3">
                            <div class="p-3 rounded mb-3" style="background-color: #f0f7ff; border-left: 4px solid #086ad7;">
                                <h5 class="text-primary font-weight-bold mb-2"><i class="fas fa-eye mr-2"></i>Visi:</h5>
                                <p class="font-italic text-dark mb-0">"Menjadi unit penjaminan mutu fakultas yang unggul, profesional, dan berintegritas tinggi dalam mengawal perwujudan budaya mutu Tridharma Perguruan Tinggi di bidang teknologi informasi dan komputasi yang berdaya saing nasional maupun internasional."</p>
                            </div>

                            <h5 class="text-primary font-weight-bold mt-3"><i class="fas fa-bullseye mr-2"></i>Misi:</h5>
                            <ul class="list-unstyled mt-2 mb-0" style="line-height: 1.85;">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-primary mr-2"></i> Merumuskan dan memutakhirkan Standar Mutu SN-Dikti, BAN-PT, dan LAMINFOKOM.
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-primary mr-2"></i> Menyelenggarakan Audit Mutu Internal (AMI) secara berkala dan akuntabel.
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-primary mr-2"></i> Menyelenggarakan Rapat Tinjauan Manajemen (RTM) dan pengawalan tindakan perbaikan.
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-primary mr-2"></i> Mengintegrasikan sistem mutu digital melalui AQA dan LMS.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tujuan & Sasaran Strategis Mutu FICT -->
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <div class="bg-white p-4 rounded shadow-sm border h-100" data-aos="fade-up">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge badge-primary px-3 py-2 mr-2"><i class="fas fa-shield-alt"></i></span>
                        <h5 class="font-weight-bold text-dark mb-0">Budaya Mutu Akademik</h5>
                    </div>
                    <p class="text-muted mb-0">
                        Menumbuhkan kesadaran dan komitmen seluruh sivitas akademika FICT dalam menerapkan siklus PPEPP secara konsisten pada pembelajaran, penelitian, dan pengabdian.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="bg-white p-4 rounded shadow-sm border h-100" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge badge-info px-3 py-2 mr-2"><i class="fas fa-award"></i></span>
                        <h5 class="font-weight-bold text-dark mb-0">Akreditasi Unggul</h5>
                    </div>
                    <p class="text-muted mb-0">
                        Mengawal pemenuhan indikator kinerja utama dan tambahan program studi di lingkungan FICT sesuai instrumen akreditasi nasional BAN-PT dan LAMINFOKOM.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="bg-white p-4 rounded shadow-sm border h-100" data-aos="fade-up" data-aos-delay="150">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge badge-success px-3 py-2 mr-2"><i class="fas fa-laptop-code"></i></span>
                        <h5 class="font-weight-bold text-dark mb-0">Transformasi Mutu Digital</h5>
                    </div>
                    <p class="text-muted mb-0">
                        Memanfaatkan portal AQA, LMS, dan repositori dokumen SPMI digital agar pemantauan ketercapaian standar berlangsung transparan dan tepat waktu.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
