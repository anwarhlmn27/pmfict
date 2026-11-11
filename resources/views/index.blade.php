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

    <!-- ================= SECTION SIKLUS PPEPP ================= -->
    <section id="ppepp" class="we-provide-solutions pt-80 pb-80">
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

            <div class="row mt-4">
                <!-- 1. Penetapan (#ppepp-penetapan) -->
                <div class="col-12 col-md-6 col-xl" id="ppepp-penetapan" data-aos="fade-up">
                    <div class="single-provide-solutions" style="height: 100%; min-height: 230px;">
                        <div class="number">P</div>
                        <div class="content"> 
                            <h3>Penetapan</h3>
                            <p>Penetapan kebijakan SPMI, manual mutu, standar akademik & non-akademik FICT sesuai SN-Dikti.</p>
                            <span class="read-more text-uppercase">Tahap 01</span>
                        </div>
                    </div>
                </div>

                <!-- 2. Pelaksanaan (#ppepp-pelaksanaan) -->
                <div class="col-12 col-md-6 col-xl" id="ppepp-pelaksanaan" data-aos="fade-up" data-aos-delay="100">
                    <div class="single-provide-solutions" style="height: 100%; min-height: 230px;">
                        <div class="number">P</div>
                        <div class="content"> 
                            <h3>Pelaksanaan</h3>
                            <p>Operasionalisasi standar dalam proses perkuliahan di LMS, riset dosen-mahasiswa, dan PKM.</p>
                            <span class="read-more text-uppercase">Tahap 02</span>
                        </div>
                    </div>
                </div>

                <!-- 3. Evaluasi (#ppepp-evaluasi) -->
                <div class="col-12 col-md-6 col-xl" id="ppepp-evaluasi" data-aos="fade-up" data-aos-delay="150">
                    <div class="single-provide-solutions" style="height: 100%; min-height: 230px;">
                        <div class="number">E</div>
                        <div class="content"> 
                            <h3>Evaluasi</h3>
                            <p>Pelaksanaan Audit Mutu Internal (AMI) semesteran, monev CPL, dan survei kepuasan mahasiswa.</p>
                            <span class="read-more text-uppercase">Tahap 03</span>
                        </div>
                    </div>
                </div>

                <!-- 4. Pengendalian (#ppepp-pengendalian) -->
                <div class="col-12 col-md-6 col-xl" id="ppepp-pengendalian" data-aos="fade-up" data-aos-delay="200">
                    <div class="single-provide-solutions" style="height: 100%; min-height: 230px;">
                        <div class="number">P</div>
                        <div class="content"> 
                            <h3>Pengendalian</h3>
                            <p>Rapat Tinjauan Manajemen (RTM) dan formulasi tindakan korektif (PTK) atas temuan deviasi mutu.</p>
                            <span class="read-more text-uppercase">Tahap 04</span>
                        </div>
                    </div>
                </div>

                <!-- 5. Peningkatan (#ppepp-peningkatan) -->
                <div class="col-12 col-md-6 col-xl" id="ppepp-peningkatan" data-aos="fade-up" data-aos-delay="250">
                    <div class="single-provide-solutions" style="height: 100%; min-height: 230px;">
                        <div class="number">P</div>
                        <div class="content"> 
                            <h3>Peningkatan</h3>
                            <p>Peningkatan standar mutu (Continuous Improvement) guna mengantarkan akreditasi program studi ke tingkat Unggul.</p>
                            <span class="read-more text-uppercase">Tahap 05</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SECTION PROFILE ================= -->
    <section id="profile" class="about-wrapper techex-landing-page pt-60 pb-60">
        <div class="container">
            
            <!-- VISI DAN MISI (#visi-misi) -->
            <div id="visi-misi" class="row align-items-center mb-60">
                <div class="col-lg-6 pr-lg-4">
                    <div class="about-img" data-aos="fade-right">
                        <img src="{{ asset('img/foto/Meet3.jpeg') }}" class="img-fluid rounded shadow" alt="Visi Misi Mutu FICT" style="width: 100%; max-height: 360px; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pl-lg-4">
                    <div class="section-title">
                        <a class="theme-btn-sm mb-15" data-aos="fade-left">PROFIL UNIT</a>
                        <h1 data-aos="fade-left" data-aos-delay="100">Visi & Misi Penjaminan Mutu FICT</h1>
                        <div data-aos="fade-left" data-aos-delay="150" class="mt-3">
                            <h5 class="text-primary font-weight-bold">Visi:</h5>
                            <p class="font-italic">"Menjadi unit penjaminan mutu fakultas yang unggul, profesional, dan berintegritas tinggi dalam mengawal perwujudan budaya mutu Tridharma Perguruan Tinggi di bidang teknologi informasi dan komputasi yang berdaya saing nasional maupun internasional."</p>
                            
                            <h5 class="text-primary font-weight-bold mt-3">Misi:</h5>
                            <ul class="list-unstyled mt-2" style="line-height: 1.8;">
                                <li><i class="fas fa-check-circle text-primary mr-2"></i> Merumuskan dan memutakhirkan Standar Mutu SN-Dikti, BAN-PT, dan LAMINFOKOM.</li>
                                <li><i class="fas fa-check-circle text-primary mr-2"></i> Menyelenggarakan Audit Mutu Internal (AMI) secara berkala dan akuntabel.</li>
                                <li><i class="fas fa-check-circle text-primary mr-2"></i> Menyelenggarakan Rapat Tinjauan Manajemen (RTM) dan pengawalan tindakan perbaikan.</li>
                                <li><i class="fas fa-check-circle text-primary mr-2"></i> Mengintegrasikan sistem mutu digital melalui AQA dan LMS.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STRUKTUR ORGANISASI (#struktur-organisasi) -->
            <div id="struktur-organisasi" class="row align-items-center flex-row-reverse pt-40">
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
                            <div class="row mt-3">
                                <div class="col-sm-6 mb-3">
                                    <div class="p-3 border rounded bg-white shadow-sm">
                                        <h6 class="font-weight-bold text-dark mb-1"><i class="fas fa-user-tie text-primary mr-2"></i> Dekan FICT</h6>
                                        <small class="text-muted">Pengarah & Penanggung Jawab SPMI Fakultas</small>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="p-3 border rounded bg-white shadow-sm">
                                        <h6 class="font-weight-bold text-dark mb-1"><i class="fas fa-award text-primary mr-2"></i> Ketua Gugus Mutu</h6>
                                        <small class="text-muted">Koordinator Penjaminan Mutu & Standarisasi</small>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="p-3 border rounded bg-white shadow-sm">
                                        <h6 class="font-weight-bold text-dark mb-1"><i class="fas fa-clipboard-check text-primary mr-2"></i> Tim Auditor AMI</h6>
                                        <small class="text-muted">Pelaksana Audit Kepatuhan Perkuliahan</small>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="p-3 border rounded bg-white shadow-sm">
                                        <h6 class="font-weight-bold text-dark mb-1"><i class="fas fa-laptop-code text-primary mr-2"></i> GKM Prodi Informatika & SI</h6>
                                        <small class="text-muted">Gugus Kendali Mutu di tingkat Program Studi</small>
                                    </div>
                                </div>
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

    <!-- ================= SECTION DOKUMENTASI KEGIATAN & RAPAT MUTU (10 FOTO) ================= -->
    <section id="galeri-kegiatan" class="pt-80 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <a class="theme-btn-sm mb-15" data-aos="fade-up">DOKUMENTASI FOTO</a>
                        <h1 data-aos="fade-up" data-aos-delay="100">Galeri Rapat & Kegiatan Penjaminan Mutu FICT</h1>
                        <p class="mt-3 text-muted" data-aos="fade-up" data-aos-delay="150" style="max-width: 720px; margin: 0 auto;">
                            Dokumentasi foto kegiatan rapat gugus mutu, audit mutu internal, review kurikulum, dan koordinasi akreditasi di folder <code>public/img/foto</code>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Carousel Foto Rapat Mutu (3 Foto Per Tampilan, Scroll ke Kanan) -->
            @php
                $galleryItems = isset($galleries) && count($galleries) > 0
                    ? $galleries
                    : collect(\App\Models\Gallery::defaultItems())->map(fn (array $g): object => (object) $g);
            @endphp
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
                $articles = isset($newsList) && count($newsList) > 0
                    ? $newsList
                    : collect(\App\Models\News::defaultArticles())->map(fn (array $a): object => (object) $a);
            @endphp
            <div class="row mt-5">
                @foreach($articles as $article)
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
                            <div class="blog-featured-thumb bg-cover" style="background-image: url('{{ $thumbUrl }}'); height: 210px;"></div>
                            <div class="content p-4">
                                <div class="post-top-meta d-flex flex-wrap align-items-center mb-2">
                                    <div class="post-date mr-3">
                                        <span class="text-muted small"><i class="fal fa-calendar-alt mr-1"></i> {{ $pubDate }}</span>
                                    </div>
                                    <span class="badge {{ $badgeCls }}">{{ $article->category_badge }}</span>
                                </div>
                                <h4 class="font-weight-bold mb-2">{{ $article->title }}</h4>
                                <div class="excerpt text-muted small mb-3">
                                    <p>{{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags((string) $article->content), 140) }}</p>
                                </div>
                                <div class="btn-link-share d-flex justify-content-between align-items-center">
                                    <a href="#galeri-kegiatan" class="text-primary font-weight-bold">Lihat Foto <i class="icon-arrow-right-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= SECTION DOWNLOAD ================= -->
    <section id="download" class="pt-80 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <a class="theme-btn-sm mb-15" data-aos="fade-up">PUSAT UNDUHAN</a>
                        <h1 data-aos="fade-up" data-aos-delay="100">Download Dokumen Mutu FICT</h1>
                        <p class="mt-3 text-muted" data-aos="fade-up" data-aos-delay="150" style="max-width: 720px; margin: 0 auto;">
                            Akses halaman khusus dan unduh berkas Kebijakan Mutu, Standar Mutu, Manual Mutu, serta Formulir Mutu Sistem Penjaminan Mutu Internal (SPMI) Fakultas.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <!-- 1. DOKUMEN KEBIJAKAN MUTU (#dokumen-kebijakan-mutu) -->
                <div class="col-lg-6 col-12 mb-4" id="dokumen-kebijakan-mutu" data-aos="fade-up">
                    <div class="p-4 bg-light rounded shadow-sm border h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h4 class="font-weight-bold text-dark mb-0"><i class="fas fa-shield-alt text-primary mr-2"></i> Dokumen Kebijakan Mutu</h4>
                                <span class="badge badge-primary">Pilar 01</span>
                            </div>
                            <p class="text-muted small mb-4">Landasan kebijakan, arah strategis, dan tata kelola implementasi SPMI FICT:</p>

                            <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                                <div>
                                    <h6 class="font-weight-bold mb-1 text-dark">Buku Kebijakan SPMI FICT</h6>
                                    <small class="text-muted">PDF • Edisi Revisi 2026 • 2.6 MB</small>
                                </div>
                                <a href="{{ route('download.kebijakan-mutu') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt mr-1"></i> Detail
                                </a>
                            </div>

                            <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                                <div>
                                    <h6 class="font-weight-bold mb-1 text-dark">Kebijakan Kurikulum Berbasis OBE FICT</h6>
                                    <small class="text-muted">PDF • Versi 2026 • 2.1 MB</small>
                                </div>
                                <a href="{{ route('download.kebijakan-mutu') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt mr-1"></i> Detail
                                </a>
                            </div>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('download.kebijakan-mutu') }}" class="btn btn-primary btn-block font-weight-bold">
                                Buka Halaman Dokumen Kebijakan Mutu <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 2. DOKUMEN STANDAR MUTU (#dokumen-standar-mutu) -->
                <div class="col-lg-6 col-12 mb-4" id="dokumen-standar-mutu" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 bg-light rounded shadow-sm border h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h4 class="font-weight-bold text-dark mb-0"><i class="fas fa-file-alt text-primary mr-2"></i> Dokumen Standar Mutu</h4>
                                <span class="badge badge-primary">Pilar 02</span>
                            </div>
                            <p class="text-muted small mb-4">Kumpulan Standar SPMI Pendidikan, Penelitian, dan PKM Fakultas Informatika & Komputer:</p>

                            <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                                <div>
                                    <h6 class="font-weight-bold mb-1 text-dark">Standar Kompetensi Lulusan (SKL) & CPL</h6>
                                    <small class="text-muted">PDF • Versi 2026 • 2.4 MB</small>
                                </div>
                                <a href="{{ route('download.standar-mutu') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt mr-1"></i> Detail
                                </a>
                            </div>

                            <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                                <div>
                                    <h6 class="font-weight-bold mb-1 text-dark">Standar Isi Pembelajaran & Kurikulum OBE</h6>
                                    <small class="text-muted">PDF • Versi 2026 • 3.1 MB</small>
                                </div>
                                <a href="{{ route('download.standar-mutu') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt mr-1"></i> Detail
                                </a>
                            </div>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('download.standar-mutu') }}" class="btn btn-primary btn-block font-weight-bold">
                                Buka Halaman Dokumen Standar Mutu <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 3. DOKUMEN MANUAL MUTU (#dokumen-manual-mutu) -->
                <div class="col-lg-6 col-12 mb-4" id="dokumen-manual-mutu" data-aos="fade-up" data-aos-delay="150">
                    <div class="p-4 bg-light rounded shadow-sm border h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h4 class="font-weight-bold text-dark mb-0"><i class="fas fa-book text-info mr-2"></i> Dokumen Manual Mutu</h4>
                                <span class="badge badge-info">Pilar 03</span>
                            </div>
                            <p class="text-muted small mb-4">Pedoman Prosedur Operasional Siklus PPEPP Fakultas Informatika & Komputer:</p>

                            <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                                <div>
                                    <h6 class="font-weight-bold mb-1 text-dark">Manual Penetapan & Pelaksanaan Standar Mutu</h6>
                                    <small class="text-muted">PDF • Pedoman Siklus PPEPP • 1.8 MB</small>
                                </div>
                                <a href="{{ route('download.manual-mutu') }}" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-external-link-alt mr-1"></i> Detail
                                </a>
                            </div>

                            <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                                <div>
                                    <h6 class="font-weight-bold mb-1 text-dark">Manual Evaluasi & Audit Mutu Internal (AMI)</h6>
                                    <small class="text-muted">PDF • Pedoman Auditor & Instrumen AMI • 3.4 MB</small>
                                </div>
                                <a href="{{ route('download.manual-mutu') }}" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-external-link-alt mr-1"></i> Detail
                                </a>
                            </div>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('download.manual-mutu') }}" class="btn btn-info btn-block font-weight-bold">
                                Buka Halaman Dokumen Manual Mutu <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 4. DOKUMEN FORMULIR MUTU (#dokumen-formulir-mutu) -->
                <div class="col-lg-6 col-12 mb-4" id="dokumen-formulir-mutu" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 bg-light rounded shadow-sm border h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h4 class="font-weight-bold text-dark mb-0"><i class="fas fa-clipboard-list text-success mr-2"></i> Dokumen Formulir Mutu</h4>
                                <span class="badge badge-success">Pilar 04</span>
                            </div>
                            <p class="text-muted small mb-4">Instrumen kerja, template RPS OBE, daftar tilik AMI, dan borang PTK:</p>

                            <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                                <div>
                                    <h6 class="font-weight-bold mb-1 text-dark">Formulir RPS & Kontrak Kuliah OBE</h6>
                                    <small class="text-muted">DOCX / PDF • Versi 2026 • 850 KB</small>
                                </div>
                                <a href="{{ route('download.formulir-mutu') }}" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-external-link-alt mr-1"></i> Detail
                                </a>
                            </div>

                            <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                                <div>
                                    <h6 class="font-weight-bold mb-1 text-dark">Formulir Daftar Tilik AMI & Tindakan Koreksi (PTK)</h6>
                                    <small class="text-muted">DOCX / PDF • Versi 2026 • 1.2 MB</small>
                                </div>
                                <a href="{{ route('download.formulir-mutu') }}" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-external-link-alt mr-1"></i> Detail
                                </a>
                            </div>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('download.formulir-mutu') }}" class="btn btn-success btn-block font-weight-bold">
                                Buka Halaman Dokumen Formulir Mutu <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div><!-- content-area -->

<!-- ================= CTA BANNER ================= -->
<section class="cta-banner style-3">
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
</section>

@endsection

@push('styles')
<style>
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
            $galeri.owlCarousel({
                items: 3,
                margin: 24,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                smartSpeed: 600,
                nav: true,
                dots: true,
                navText: ['<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        margin: 15
                    },
                    768: {
                        items: 2,
                        margin: 20
                    },
                    992: {
                        items: 3,
                        margin: 24
                    }
                }
            });
        }
    });
</script>
@endpush