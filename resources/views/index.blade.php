@extends('layouts.main')

@section('title', 'Penjaminan Mutu FICT - Fakultas Informatika & Komputer')

@section('content')

<!-- ================= HERO SLIDER SECTION ================= -->
@php
    $slides = isset($heroSliders) && count($heroSliders) > 0
        ? $heroSliders
        : collect(\App\Models\HeroSlider::defaultSlides())->map(fn (array $s): object => (object) $s);
@endphp
<section id="home" class="hero-slide-wrapper techex-landing-page">
    <div class="hero-slider-active-2 owl-carousel owl-theme">
        @foreach($slides as $slide)
            @php
                $bgUrl = $slide instanceof \App\Models\HeroSlider
                    ? $slide->imageUrl()
                    : (str_starts_with($slide->image_path, 'http') ? $slide->image_path : asset($slide->image_path));
            @endphp
            <div class="single-slide bg-cover" style="background-image: url('{{ $bgUrl }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-contents text-center">
                                @if(!empty($slide->badge_text))
                                    <a class="theme-btn-sm" data-animation="fadeInUp" data-delay="0">
                                        {{ $slide->badge_text }}
                                    </a>
                                @endif
                                <h1 data-animation="fadeInUp" data-delay="0.4s">
                                    {{ $slide->title }}
                                </h1>
                                @if(!empty($slide->description))
                                    <div data-animation="fadeInUp" data-delay="0.6s">
                                        <p>{{ $slide->description }}</p>
                                    </div>
                                @endif
                                @if(!empty($slide->primary_btn_text) || !empty($slide->secondary_btn_text))
                                    <div class="btn__wrapper d-flex flex-wrap justify-content-center" data-animation="fadeInUp" data-delay="0.8s">
                                        @if(!empty($slide->primary_btn_text))
                                            <a href="{{ $slide->primary_btn_url ?: '#' }}"
                                               @if(str_starts_with((string) $slide->primary_btn_url, 'http')) target="_blank" rel="noopener noreferrer" @endif
                                               class="theme-btn">{{ $slide->primary_btn_text }} <i class="icon-arrow-right-1"></i></a>
                                        @endif
                                        @if(!empty($slide->secondary_btn_text))
                                            <a href="{{ $slide->secondary_btn_url ?: '#' }}"
                                               @if(str_starts_with((string) $slide->secondary_btn_url, 'http')) target="_blank" rel="noopener noreferrer" @endif
                                               class="theme-btn">{{ $slide->secondary_btn_text }} <i class="icon-arrow-right-1"></i></a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<div class="content-area">

    <!-- ================= SECTION SIKLUS PPEPP (FLOWMAP) ================= -->
    <section id="ppepp" class="we-provide-solutions pt-80 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <a class="theme-btn-sm mb-15" data-aos="fade-up">SIKLUS MUTU INTERNAL</a>
                        <h1 data-aos="fade-up" data-aos-delay="100">Siklus PPEPP Penjaminan Mutu FICT</h1>
                        <p class="mt-3 text-muted" data-aos="fade-up" data-aos-delay="150" style="max-width: 720px; margin: 0 auto;">
                            Sistem Penjaminan Mutu Internal (SPMI) Fakultas Informatika & Komputer dijalankan melalui 5 tahapan berkesinambungan (Kaizen).
                        </p>
                    </div>
                </div>
            </div>

            <div class="ppepp-flowmap-wrapper">
                <!-- 1. Penetapan (#ppepp-penetapan) -->
                <div class="ppepp-flow-col" id="ppepp-penetapan" data-aos="fade-up">
                    <div class="ppepp-flow-card card-shape-1">
                        <div class="watermark-letter">P</div>
                        <div class="ppepp-card-body">
                            <h3>Penetapan</h3>
                            <p>Penetapan kebijakan SPMI, manual mutu, standar akademik & non-akademik FICT sesuai SN-Dikti.</p>
                            <div class="stage-label">TAHAP 01</div>
                        </div>
                    </div>
                    <!-- Panah Bawah Melengkung ke Atas (Menuju Pelaksanaan) -->
                    <svg class="ppepp-svg-connector svg-bottom-j" viewBox="0 0 140 190" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="gradFlow1" x1="0%" y1="100%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#005bea"/>
                                <stop offset="100%" stop-color="#0088ff"/>
                            </linearGradient>
                        </defs>
                        <path d="M 5 172 C 72 172, 114 128, 114 54 L 114 38" stroke="url(#gradFlow1)" stroke-width="18" stroke-linecap="butt" fill="none"/>
                        <polygon points="114,4 90,42 138,42" fill="#0088ff"/>
                    </svg>
                </div>

                <!-- 2. Pelaksanaan (#ppepp-pelaksanaan) -->
                <div class="ppepp-flow-col" id="ppepp-pelaksanaan" data-aos="fade-up" data-aos-delay="100">
                    <!-- Panah Atas Melengkung ke Bawah (Menuju Evaluasi) -->
                    <svg class="ppepp-svg-connector svg-top-arch" viewBox="0 0 250 220" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="gradFlow2" x1="0%" y1="50%" x2="100%" y2="50%">
                                <stop offset="0%" stop-color="#0284c7"/>
                                <stop offset="55%" stop-color="#0d9488"/>
                                <stop offset="100%" stop-color="#14b8a6"/>
                            </linearGradient>
                        </defs>
                        <path d="M 14 195 L 14 115 C 14 40, 62 14, 125 14 C 188 14, 226 40, 226 115 L 226 175" stroke="url(#gradFlow2)" stroke-width="18" stroke-linecap="butt" fill="none"/>
                        <polygon points="226,210 202,172 250,172" fill="#14b8a6"/>
                    </svg>
                    <div class="ppepp-flow-card card-shape-pill">
                        <div class="watermark-letter">P</div>
                        <div class="ppepp-card-body">
                            <h3>Pelaksanaan</h3>
                            <p>Operasionalisasi standar dalam proses perkuliahan di LMS, riset dosen-mahasiswa, dan PKM.</p>
                            <div class="stage-label">TAHAP 02</div>
                        </div>
                    </div>
                </div>

                <!-- 3. Evaluasi (#ppepp-evaluasi) -->
                <div class="ppepp-flow-col" id="ppepp-evaluasi" data-aos="fade-up" data-aos-delay="150">
                    <!-- Ikon Ilustrasi Evaluasi (Gear, Grafik & Checkmark) di Atas Card Evaluasi -->
                    <div class="ppepp-eval-badge" aria-hidden="true">
                        <svg width="86" height="82" viewBox="0 0 86 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Gear Besar -->
                            <path d="M25 14.5C23.6 14.5 22.4 15.6 22.4 17V18.4C21.3 18.8 20.3 19.4 19.4 20.2L18.2 19.5C17 18.8 15.5 19.2 14.8 20.4L13.5 22.6C12.8 23.8 13.2 25.3 14.4 26L15.6 26.7C15.4 27.9 15.4 29.1 15.6 30.3L14.4 31C13.2 31.7 12.8 33.2 13.5 34.4L14.8 36.6C15.5 37.8 17 38.2 18.2 37.5L19.4 36.8C20.3 37.6 21.3 38.2 22.4 38.6V40C22.4 41.4 23.6 42.5 25 42.5H27.6C29 42.5 30.2 41.4 30.2 40V38.6C31.3 38.2 32.3 37.6 33.2 36.8L34.4 37.5C35.6 38.2 37.1 37.8 37.8 36.6L39.1 34.4C39.8 33.2 39.4 31.7 38.2 31L37 30.3C37.2 29.1 37.2 27.9 37 26.7L38.2 26C39.4 25.3 39.8 23.8 39.1 22.6L37.8 20.4C37.1 19.2 35.6 18.8 34.4 19.5L33.2 20.2C32.3 19.4 31.3 18.8 30.2 18.4V17C30.2 15.6 29 14.5 27.6 14.5H25ZM26.3 23.5C29.1 23.5 31.3 25.7 31.3 28.5C31.3 31.3 29.1 33.5 26.3 33.5C23.5 33.5 21.3 31.3 21.3 28.5C21.3 25.7 23.5 23.5 26.3 23.5Z" fill="#1e3a5f"/>
                            <!-- Gear Kecil -->
                            <circle cx="43" cy="15" r="5.5" stroke="#60a5fa" stroke-width="3.5" stroke-dasharray="3 2"/>
                            <!-- Grafik Batang -->
                            <rect x="22" y="54" width="7" height="15" rx="2" fill="#93c5fd"/>
                            <rect x="33" y="47" width="7" height="22" rx="2" fill="#60a5fa"/>
                            <rect x="44" y="38" width="7" height="31" rx="2" fill="#3b82f6"/>
                            <rect x="55" y="27" width="8" height="42" rx="2" fill="#bfdbfe"/>
                            <!-- Garis Kurva & Panah Naik -->
                            <path d="M18 52 C 32 48, 45 36, 58 17" stroke="#0f766e" stroke-width="3.5" stroke-linecap="round"/>
                            <polygon points="62,11 52,16 61,22" fill="#0f766e"/>
                            <!-- Lingkaran Checkmark Biru -->
                            <circle cx="57" cy="64" r="12" fill="#0284c7" stroke="#eef5ff" stroke-width="2.5"/>
                            <path d="M51.5 64.2L55.2 67.8L63 60" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <div class="ppepp-flow-card card-shape-3">
                        <div class="watermark-letter">E</div>
                        <div class="ppepp-card-body">
                            <h3>Evaluasi</h3>
                            <p>Pelaksanaan Audit Mutu Internal (AMI) semesteran, monev CPL, dan survei kepuasan mahasiswa.</p>
                            <div class="stage-label">TAHAP 03</div>
                        </div>
                    </div>

                    <!-- Panah Bawah Melengkung U ke Atas (Menuju Pengendalian) -->
                    <svg class="ppepp-svg-connector svg-bottom-arch" viewBox="0 0 250 215" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="gradFlow3" x1="0%" y1="50%" x2="100%" y2="50%">
                                <stop offset="0%" stop-color="#0072ff"/>
                                <stop offset="55%" stop-color="#0284c7"/>
                                <stop offset="100%" stop-color="#14b8a6"/>
                            </linearGradient>
                        </defs>
                        <path d="M 14 14 L 14 100 C 14 175, 62 200, 125 200 C 188 200, 226 175, 226 100 L 226 42" stroke="url(#gradFlow3)" stroke-width="18" stroke-linecap="butt" fill="none"/>
                        <polygon points="226,6 202,44 250,44" fill="#14b8a6"/>
                    </svg>
                </div>

                <!-- 4. Pengendalian (#ppepp-pengendalian) -->
                <div class="ppepp-flow-col" id="ppepp-pengendalian" data-aos="fade-up" data-aos-delay="200">
                    <!-- Panah Atas Melengkung ke Bawah (Menuju Peningkatan) -->
                    <svg class="ppepp-svg-connector svg-top-arch" viewBox="0 0 250 220" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="gradFlow4" x1="0%" y1="50%" x2="100%" y2="50%">
                                <stop offset="0%" stop-color="#0284c7"/>
                                <stop offset="55%" stop-color="#0d9488"/>
                                <stop offset="100%" stop-color="#14b8a6"/>
                            </linearGradient>
                        </defs>
                        <path d="M 14 195 L 14 115 C 14 40, 62 14, 125 14 C 188 14, 226 40, 226 115 L 226 175" stroke="url(#gradFlow4)" stroke-width="18" stroke-linecap="butt" fill="none"/>
                        <polygon points="226,210 202,172 250,172" fill="#14b8a6"/>
                    </svg>

                    <div class="ppepp-flow-card card-shape-pill">
                        <div class="watermark-letter">P</div>
                        <div class="ppepp-card-body">
                            <h3>Pengendalian</h3>
                            <p>Rapat Tinjauan Manajemen (RTM) dan formulasi tindakan korektif (PTK) atas temuan deviasi mutu.</p>
                            <div class="stage-label">TAHAP 04</div>
                        </div>
                    </div>

                    <!-- Panah Bawah Kanan Melengkung ke Atas (Menuju Peningkatan) -->
                    <svg class="ppepp-svg-connector svg-bottom-j" viewBox="0 0 140 190" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="gradFlow5" x1="0%" y1="100%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#14b8a6"/>
                                <stop offset="100%" stop-color="#0284c7"/>
                            </linearGradient>
                        </defs>
                        <path d="M 5 172 C 72 172, 114 128, 114 54 L 114 38" stroke="url(#gradFlow5)" stroke-width="18" stroke-linecap="butt" fill="none"/>
                        <polygon points="114,4 90,42 138,42" fill="#0284c7"/>
                    </svg>
                </div>

                <!-- 5. Peningkatan (#ppepp-peningkatan) -->
                <div class="ppepp-flow-col" id="ppepp-peningkatan" data-aos="fade-up" data-aos-delay="250">
                    <div class="ppepp-flow-card card-shape-5">
                        <div class="watermark-letter">P</div>
                        <div class="ppepp-card-body">
                            <h3>Peningkatan</h3>
                            <p>Peningkatan standar mutu (Continuous Improvement) guna mengantarkan akreditasi program studi ke tingkat Unggul.</p>
                            <div class="stage-label">TAHAP 05</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SECTION PROFILE ================= -->
    <section id="profile" class="about-wrapper techex-landing-page pt-60 pb-60">
        <div class="container">
            <!-- STRUKTUR ORGANISASI (#struktur-organisasi) -->
            <div id="struktur-organisasi" class="row align-items-center flex-row-reverse">
                <div class="col-lg-6 pl-lg-4">
                    <div class="about-img" data-aos="fade-left">
                        <img src="{{ asset('img/foto/Meet5.jpeg') }}" class="img-fluid rounded shadow" alt="Struktur Organisasi Penjaminan Mutu FICT" style="width: 100%; max-height: 360px; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pr-lg-4">
                    <div class="section-title">
                        <a class="theme-btn-sm mb-15" data-aos="fade-right">TATA KELOLA</a>
                        <h1 data-aos="fade-right" data-aos-delay="100">Struktur Organisasi Penjaminan Mutu FICT</h1>
                        <div data-aos="fade-right" data-aos-delay="150" class="mt-3">
                            <p>Tata kelola unit penjaminan mutu tingkat fakultas dan gugus kendali mutu program studi:</p>
                            @php
                                $orgItems = $organizationStructures ?? collect();
                            @endphp
                            <div class="row mt-3">
                                @forelse($orgItems as $org)
                                    <div class="col-sm-6 mb-3">
                                        <div class="p-3 border rounded bg-white shadow-sm h-100">
                                            <h6 class="font-weight-bold text-dark mb-1">
                                                <i class="{{ $org->icon_class ?: 'fas fa-user-tie' }} text-primary mr-2"></i> {{ $org->position_title }}
                                            </h6>
                                            @if(!empty($org->person_name))
                                                <div class="small font-weight-bold text-primary mb-1">{{ $org->person_name }}</div>
                                            @endif
                                            @if(!empty($org->role_description))
                                                <small class="text-muted d-block">{{ $org->role_description }}</small>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted small mb-0">Belum ada data struktur organisasi.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= SECTION SPME (BAN-PT & LAMINFOKOM) ================= -->
    <section id="spme" class="case-study-wrapper pt-80 pb-80 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <a class="theme-btn-sm mb-15" data-aos="fade-up">AKREDITASI EKSTERNAL</a>
                        <h1 data-aos="fade-up" data-aos-delay="100">Sistem Penjaminan Mutu Eksternal (SPME)</h1>
                        <p class="mt-3 text-muted" data-aos="fade-up" data-aos-delay="150" style="max-width: 680px; margin: 0 auto;">
                            Pemenuhan instrumen akreditasi nasional melalui BAN-PT dan Lembaga Akreditasi Mandiri Informatika dan Komputer (LAMINFOKOM).
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <!-- BAN-PT Card (#spme-banpt) -->
                <div class="col-lg-6 col-12 mb-4" id="spme-banpt" data-aos="fade-up">
                    <div class="p-4 bg-white rounded shadow-sm border-top" style="border-top: 5px solid #0f2942 !important; height: 100%;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3 class="font-weight-bold text-dark mb-0"><i class="fas fa-university text-primary mr-2"></i> BAN-PT</h3>
                            <span class="badge badge-primary px-3 py-2">Akreditasi Institusi</span>
                        </div>
                        <p class="text-muted">
                            Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) mengukur kelayakan mutu perguruan tinggi dengan menggunakan 9 Kriteria Standar Nasional Pendidikan Tinggi (SN-Dikti). Penjaminan Mutu FICT secara berkala menyiapkan data dukung instrumen IAPT.
                        </p>
                        <div class="p-3 bg-light rounded mt-3">
                            <h6 class="font-weight-bold text-dark mb-2"><i class="fas fa-check-circle text-success mr-2"></i>Fokus Instrumen BAN-PT:</h6>
                            <ul class="text-muted small mb-0 pl-3">
                                <li>Visi, Misi, Tujuan & Strategi Fakultas</li>
                                <li>Tata Pamong, Kepemimpinan, dan Sistem Pengelolaan</li>
                                <li>Kualifikasi Dosen & Tenaga Kependidikan</li>
                                <li>Keuangan, Sarana dan Prasarana Komputasi</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- LAMINFOKOM Card (#spme-laminfokom) -->
                <div class="col-lg-6 col-12 mb-4" id="spme-laminfokom" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 bg-white rounded shadow-sm border-top" style="border-top: 5px solid #0284c7 !important; height: 100%;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3 class="font-weight-bold text-dark mb-0"><i class="fas fa-laptop text-primary mr-2"></i> LAMINFOKOM</h3>
                            <span class="badge badge-info px-3 py-2">Akreditasi Prodi ICT</span>
                        </div>
                        <p class="text-muted">
                            LAMINFOKOM mengkhususkan akreditasi program studi bidang Informatika dan Komputer. Gugus Mutu FICT mendampingi penyusunan Dokumen Evaluasi Diri (LED) dan Laporan Kinerja Program Studi (LKPS).
                        </p>
                        <div class="p-3 bg-light rounded mt-3">
                            <h6 class="font-weight-bold text-dark mb-2"><i class="fas fa-check-circle text-info mr-2"></i>Target Akreditasi Prodi FICT:</h6>
                            <ul class="text-muted small mb-0 pl-3">
                                <li>Program Studi S1 Informatika (Target: Unggul)</li>
                                <li>Program Studi S1 Sistem Informasi (Target: Unggul)</li>
                                <li>Kurikulum Outcome-Based Education (OBE)</li>
                                <li>Capaian Luaran, Publikasi Ilmiah & Prestasi Mahasiswa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SECTION DOKUMENTASI KEGIATAN & RAPAT MUTU ================= -->
    <section id="galeri-kegiatan" class="pt-80 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <a class="theme-btn-sm mb-15" data-aos="fade-up">DOKUMENTASI FOTO</a>
                        <h1 data-aos="fade-up" data-aos-delay="100">Galeri Rapat & Kegiatan Penjaminan Mutu FICT</h1>
                        <p class="mt-3 text-muted" data-aos="fade-up" data-aos-delay="150" style="max-width: 720px; margin: 0 auto;">
                            Dokumentasi foto kegiatan rapat gugus mutu, audit mutu internal, review kurikulum, dan koordinasi akreditasi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Carousel Foto Rapat Mutu (3 Foto Per Tampilan, Scroll ke Kanan) -->
            @php
                $galleryItems = $galleries ?? collect();
            @endphp
            @if(count($galleryItems) > 0)
                <div class="galeri-rapat-slider owl-carousel owl-theme mt-50" data-aos="fade-up">
                    @foreach($galleryItems as $item)
                        @php
                            $imgUrl = $item instanceof \App\Models\Gallery
                                ? $item->imageUrl()
                                : (str_starts_with($item->image_path, 'http') ? $item->image_path : asset($item->image_path));
                            $badgeCls = $item instanceof \App\Models\Gallery
                                ? $item->badgeClass()
                                : \App\Models\Gallery::resolveBadgeClass($item->badge ?? 'SPMI');
                        @endphp
                        <div class="single-galeri-item">
                            <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                                <a href="{{ $imgUrl }}" class="popup-gallery" title="{{ $item->title }}">
                                    <img src="{{ $imgUrl }}" class="img-fluid" alt="{{ $item->title }}" style="height: 230px; width: 100%; object-fit: cover;">
                                </a>
                                <div class="card-body p-3">
                                    <span class="badge {{ $badgeCls }} mb-2">{{ $item->badge }}</span>
                                    <h6 class="font-weight-bold text-dark mb-1">{{ $item->title }}</h6>
                                    @if(!empty($item->subtitle))
                                        <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> {{ $item->subtitle }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center text-muted py-5 mt-4 bg-light rounded border">
                    Belum ada dokumentasi foto galeri kegiatan.
                </div>
            @endif
        </div>
    </section>

    <!-- ================= SECTION BERITA ================= -->
    <section id="berita" class="blog-section techex-landing-page pt-80 pb-80 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <a class="theme-btn-sm mb-15" data-aos="fade-up">INFORMASI & ARTIKEL</a>
                        <h1 data-aos="fade-up" data-aos-delay="100">Berita & Agenda Mutu FICT</h1>
                        <p class="mt-3 text-muted" data-aos="fade-up" data-aos-delay="150" style="max-width: 680px; margin: 0 auto;">
                            Informasi terkini pelaksanaan audit mutu, workshop borang akreditasi, dan agenda pimpinan fakultas.
                        </p>
                    </div>
                </div>
            </div>

            @php
                $articles = $newsList ?? collect();
            @endphp
            <div class="row mt-5">
                @forelse($articles as $article)
                    @php
                        $thumbUrl = $article instanceof \App\Models\News
                            ? $article->thumbnailUrl()
                            : (str_starts_with($article->thumbnail ?? '', 'http') ? $article->thumbnail : asset($article->thumbnail ?: 'img/foto/Meet1.jpeg'));
                        $badgeCls = $article instanceof \App\Models\News
                            ? $article->badgeClass()
                            : \App\Models\News::resolveBadgeClass($article->category_badge ?? 'SPMI');
                        $pubDate = $article instanceof \App\Models\News
                            ? $article->formattedPublishedDate()
                            : \App\Models\News::formatIndonesianDate($article->published_at ?? now());
                    @endphp
                    <div class="col-xl-4 col-md-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 75 }}">
                        <div class="single-blog-card style-3 bg-white rounded shadow-sm overflow-hidden h-100">
                            <a href="{{ route('berita.detail', $article->slug) }}" class="d-block">
                                <div class="blog-featured-thumb bg-cover" style="background-image: url('{{ $thumbUrl }}'); height: 210px;"></div>
                            </a>
                            <div class="content p-4">
                                <div class="post-top-meta d-flex flex-wrap align-items-center mb-2">
                                    <div class="post-date mr-3">
                                        <span class="text-muted small"><i class="fal fa-calendar-alt mr-1"></i> {{ $pubDate }}</span>
                                    </div>
                                    <span class="badge {{ $badgeCls }}">{{ $article->category_badge }}</span>
                                </div>
                                <h4 class="font-weight-bold mb-2">
                                    <a href="{{ route('berita.detail', $article->slug) }}" class="text-dark">{{ $article->title }}</a>
                                </h4>
                                <div class="excerpt text-muted small mb-3">
                                    <p>{{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags((string) $article->content), 140) }}</p>
                                </div>
                                <div class="btn-link-share d-flex justify-content-between align-items-center">
                                    <a href="{{ route('berita.detail', $article->slug) }}" class="text-primary font-weight-bold">Lihat Detail <i class="icon-arrow-right-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center text-muted py-5 bg-white rounded border">
                            Belum ada berita atau agenda yang dipublikasikan.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div><!-- content-area -->

<!-- ================= CTA BANNER ================= -->
<!-- <section class="cta-banner style-3">
    <div class="container-fluid bg-cover section-bg" style="background-image: url('{{ asset('img/cta_bg1.png') }}');">
        <div class="cta-content">
            <div class="row align-items-center">
                <div class="col-xl-7 text-white col-12 text-center text-xl-left">
                    <h1>Siap Bersinergi Mewujudkan Budaya Mutu Unggul di FICT?</h1>
                </div>
                <div class="col-xl-5 col-12">
                    <div class="btn-wraper d-flex flex-wrap justify-content-xl-end mt-2 mt-md-4 mt-xl-0">
                        <a href="{{ route('kontak') }}" class="theme-btn">Layanan Aspirasi Mutu <i class="icon-arrow-right-1"></i></a>
                        <a href="#galeri-kegiatan" class="theme-btn">Dokumentasi Rapat <i class="icon-arrow-right-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

@endsection

@push('styles')
<style>
    /* ==========================================================================
       FLOWMAP SIKLUS PPEPP (5 TAHAPAN BERKESINAMBUNGAN)
       ========================================================================== */
    .ppepp-flowmap-wrapper {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 28px;
        margin-top: 72px;
        margin-bottom: 35px;
        position: relative;
        align-items: stretch;
    }
    .ppepp-flow-col {
        position: relative;
        display: flex;
        flex-direction: column;
        z-index: 2;
    }
    .ppepp-flow-card {
        position: relative;
        flex: 1;
        min-height: 315px;
        padding: 46px 20px 34px;
        background: linear-gradient(180deg, #ebf3fe 0%, #f4f8ff 100%);
        box-shadow: 0 14px 28px rgba(15, 41, 66, 0.08);
        overflow: hidden;
        z-index: 2;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .ppepp-flow-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 34px rgba(8, 106, 215, 0.14);
    }
    /* Bentuk Spesifik Tiap Kartu Sesuai Flowmap */
    .ppepp-flow-card.card-shape-1,
    .ppepp-flow-card.card-shape-3 {
        border-radius: 14px 14px 92px 92px;
    }
    .ppepp-flow-card.card-shape-pill {
        border-radius: 92px;
        background: linear-gradient(180deg, #ebf3fe 0%, #f7faff 55%, #ffffff 100%);
    }
    .ppepp-flow-card.card-shape-5 {
        border-radius: 14px 14px 82px 14px;
        min-height: 335px;
    }
    /* Huruf Watermark P - P - E - P - P */
    .ppepp-flow-card .watermark-letter {
        position: absolute;
        top: 6px;
        left: 10px;
        font-size: 62px;
        font-weight: 800;
        line-height: 1;
        color: rgba(59, 130, 246, 0.16);
        pointer-events: none;
        user-select: none;
    }
    .ppepp-card-body {
        position: relative;
        z-index: 3;
    }
    .ppepp-card-body h3 {
        font-size: 18px !important;
        font-weight: 700 !important;
        color: #0f172a !important;
        margin-bottom: 12px !important;
    }
    .ppepp-card-body p {
        font-size: 13.5px !important;
        line-height: 1.62 !important;
        color: #475569 !important;
        margin-bottom: 18px !important;
    }
    .ppepp-card-body .stage-label {
        font-size: 11.5px;
        font-weight: 700;
        color: #0284c7;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    /* Ikon Ilustrasi di Atas Kartu Evaluasi */
    .ppepp-eval-badge {
        position: absolute;
        top: -54px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 6;
        pointer-events: none;
        filter: drop-shadow(0 6px 12px rgba(15, 41, 66, 0.08));
    }
    /* SVG Konektor Panah Melengkung */
    .ppepp-svg-connector {
        position: absolute;
        pointer-events: none;
        z-index: 4;
        overflow: visible;
    }
    /* Panah Bawah J (Bawah Kartu 1 & Kartu 4) */
    .ppepp-svg-connector.svg-bottom-j {
        bottom: -36px;
        left: 44%;
        width: calc(56% + 34px);
        height: 185px;
    }
    /* Panah Lengkung Atas U (Atas Kartu 2 & Kartu 4) */
    .ppepp-svg-connector.svg-top-arch {
        top: -36px;
        left: -21px;
        width: calc(100% + 44px);
        height: 215px;
    }
    /* Panah Lengkung Bawah U (Bawah Kartu 3) */
    .ppepp-svg-connector.svg-bottom-arch {
        bottom: -38px;
        left: -21px;
        width: calc(100% + 44px);
        height: 205px;
    }

    /* Responsif Tablet & Mobile */
    @media (max-width: 1199px) {
        .ppepp-flowmap-wrapper {
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 45px;
        }
        .ppepp-svg-connector {
            display: none;
        }
        .ppepp-flow-card,
        .ppepp-flow-card.card-shape-1,
        .ppepp-flow-card.card-shape-3,
        .ppepp-flow-card.card-shape-pill,
        .ppepp-flow-card.card-shape-5 {
            border-radius: 20px;
            min-height: 260px;
        }
    }
    @media (max-width: 767px) {
        .ppepp-flowmap-wrapper {
            grid-template-columns: 1fr;
            gap: 20px;
            margin-top: 35px;
        }
        .ppepp-eval-badge {
            display: none;
        }
    }

    /* Styling Galeri Rapat Slider */
    .galeri-rapat-slider .single-galeri-item {
        padding: 10px 5px;
    }
    .galeri-rapat-slider .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
    }
    .galeri-rapat-slider .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.08) !important;
    }
    .galeri-rapat-slider .owl-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 16px;
        margin-top: 25px;
    }
    .galeri-rapat-slider .owl-nav button.owl-prev,
    .galeri-rapat-slider .owl-nav button.owl-next {
        width: 46px;
        height: 46px;
        line-height: 46px;
        border-radius: 50% !important;
        background: #086AD7 !important;
        color: #ffffff !important;
        font-size: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none !important;
        box-shadow: 0 4px 10px rgba(8, 106, 215, 0.25);
    }
    .galeri-rapat-slider .owl-nav button.owl-prev:hover,
    .galeri-rapat-slider .owl-nav button.owl-next:hover {
        background: #004ba0 !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(8, 106, 215, 0.35);
    }
    .galeri-rapat-slider .owl-dots {
        text-align: center;
        margin-top: 20px;
    }
    .galeri-rapat-slider .owl-dots .owl-dot span {
        width: 10px;
        height: 10px;
        margin: 5px 6px;
        background: #d6d6d6;
        display: inline-block;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    .galeri-rapat-slider .owl-dots .owl-dot.active span {
        background: #086AD7;
        width: 28px;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        var $galeri = $('.galeri-rapat-slider');
        if ($galeri.length && !$galeri.hasClass('owl-loaded')) {
            var itemCount = $galeri.children('.single-galeri-item').length;
            $galeri.owlCarousel({
                items: 3,
                margin: 24,
                loop: itemCount > 3,
                autoplay: itemCount > 1,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                smartSpeed: 600,
                nav: itemCount > 1,
                dots: itemCount > 1,
                navText: ['<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        margin: 15
                    },
                    768: {
                        items: Math.min(2, Math.max(1, itemCount)),
                        margin: 20
                    },
                    992: {
                        items: Math.min(3, Math.max(1, itemCount)),
                        margin: 24
                    }
                }
            });
        }
    });
</script>
@endpush