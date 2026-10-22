@extends('layouts.main')

@section('title', 'Penjaminan Mutu FICT - Fakultas Informatika & Komputer')

@section('content')

<!-- ================= HERO SLIDER SECTION ================= -->
<section id="home" class="hero-slide-wrapper techex-landing-page">
    <div class="hero-slider-active-2 owl-carousel owl-theme">
        
        <!-- Slide 1: Meet1.jpeg -->
        <div class="single-slide bg-cover" style="background-image: linear-gradient(rgba(15, 41, 66, 0.82), rgba(15, 41, 66, 0.88)), url('{{ asset('img/foto/Meet1.jpeg') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-contents text-center">
                            <a class="theme-btn-sm" data-animation="fadeInUp" data-delay="0">
                                <i class="icon-award"></i> SISTEM PENJAMINAN MUTU INTERNAL (SPMI)
                            </a>
                            <h1 data-animation="fadeInUp" data-delay="0.4s">
                                Membangun Budaya Mutu Unggul Fakultas Informatika & Komputer
                            </h1>
                            <div data-animation="fadeInUp" data-delay="0.6s">
                                <p>Mengawal mutu Tridharma Perguruan Tinggi, akreditasi nasional (BAN-PT & LAMINFOKOM), dan tata kelola akademik berstandar prima melalui siklus berkelanjutan PPEPP.</p>
                            </div>
                            <div class="btn__wrapper d-flex flex-wrap justify-content-center" data-animation="fadeInUp" data-delay="0.8s">
                                <a href="#ppepp" class="theme-btn">Siklus PPEPP <i class="icon-arrow-right-1"></i></a>
                                <a href="#dokumen-standar-mutu" class="theme-btn">Unduh Dokumen Mutu <i class="icon-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2: Meet2.jpeg -->
        <div class="single-slide bg-cover" style="background-image: linear-gradient(rgba(15, 41, 66, 0.82), rgba(15, 41, 66, 0.88)), url('{{ asset('img/foto/Meet2.jpeg') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-contents text-center">
                            <a class="theme-btn-sm" data-animation="fadeInUp" data-delay="0">
                                <i class="icon-laptop"></i> GUGUS KENDALI MUTU (GKM) FICT
                            </a>
                            <h1 data-animation="fadeInUp" data-delay="0.4s">
                                Review Kurikulum & Ketercapaian Capaian Pembelajaran Lulusan
                            </h1>
                            <div data-animation="fadeInUp" data-delay="0.6s">
                                <p>Penyelarasan kurikulum berbasis Outcome-Based Education (OBE) pada Program Studi Informatika dan Sistem Informasi.</p>
                            </div>
                            <div class="btn__wrapper d-flex flex-wrap justify-content-center" data-animation="fadeInUp" data-delay="0.8s">
                                <a href="#spme" class="theme-btn">Akreditasi SPME <i class="icon-arrow-right-1"></i></a>
                                <a href="#galeri-kegiatan" class="theme-btn">Galeri Rapat Mutu <i class="icon-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3: Meet4.jpeg -->
        <div class="single-slide bg-cover" style="background-image: linear-gradient(rgba(15, 41, 66, 0.82), rgba(15, 41, 66, 0.88)), url('{{ asset('img/foto/Meet4.jpeg') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-contents text-center">
                            <a class="theme-btn-sm" data-animation="fadeInUp" data-delay="0">
                                <i class="icon-check"></i> RAPAT TINJAUAN MANAJEMEN
                            </a>
                            <h1 data-animation="fadeInUp" data-delay="0.4s">
                                Pengendalian & Peningkatan Standar Mutu Berkesinambungan
                            </h1>
                            <div data-animation="fadeInUp" data-delay="0.6s">
                                <p>Tindak lanjut rekomendasi hasil Audit Mutu Internal (AMI) bersama jajaran pimpinan fakultas dan program studi.</p>
                            </div>
                            <div class="btn__wrapper d-flex flex-wrap justify-content-center" data-animation="fadeInUp" data-delay="0.8s">
                                <a href="https://spmi.horizon.ac.id/login" target="_blank" rel="noopener noreferrer" class="theme-btn">Aplikasi AQA <i class="icon-arrow-right-1"></i></a>
                                <a href="https://lms.horizon.ac.id/" target="_blank" rel="noopener noreferrer" class="theme-btn">Portal LMS <i class="icon-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                    <div class="single-provide-solutions" style="height: 100%; min-height: 280px;">
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
                    <div class="single-provide-solutions" style="height: 100%; min-height: 280px;">
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
                    <div class="single-provide-solutions" style="height: 100%; min-height: 280px;">
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
                    <div class="single-provide-solutions" style="height: 100%; min-height: 280px;">
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
                    <div class="single-provide-solutions" style="height: 100%; min-height: 280px;">
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
                <div class="col-lg-6">
                    <div class="about-img" data-aos="fade-right">
                        <img src="{{ asset('img/foto/Meet3.jpeg') }}" class="img-fluid rounded shadow" alt="Visi Misi Mutu FICT" style="width: 100%; max-height: 420px; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6">
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
                <div class="col-lg-6">
                    <div class="about-img" data-aos="fade-left">
                        <img src="{{ asset('img/foto/Meet5.jpeg') }}" class="img-fluid rounded shadow" alt="Struktur Organisasi Penjaminan Mutu FICT" style="width: 100%; max-height: 420px; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6">
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

            <!-- Carousel 10 Foto Rapat Mutu (3 Foto Per Tampilan, Scroll ke Kanan) -->
            <div class="galeri-rapat-slider owl-carousel owl-theme mt-50" data-aos="fade-up">
                
                <!-- Foto 1 (Meet1.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet1.jpeg') }}" class="popup-gallery" title="Rapat Koordinasi Tim Mutu FICT">
                            <img src="{{ asset('img/foto/Meet1.jpeg') }}" class="img-fluid" alt="Rapat Koordinasi Tim Penjaminan Mutu FICT" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-primary mb-2">SPMI</span>
                            <h6 class="font-weight-bold text-dark mb-1">Rapat Koordinasi Tim Mutu FICT</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Pemetaan Standar Mutu Akademik</small>
                        </div>
                    </div>
                </div>

                <!-- Foto 2 (Meet2.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet2.jpeg') }}" class="popup-gallery" title="Diskusi Gugus Kendali Mutu & Kurikulum">
                            <img src="{{ asset('img/foto/Meet2.jpeg') }}" class="img-fluid" alt="Diskusi Gugus Kendali Mutu" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-success mb-2">GKM</span>
                            <h6 class="font-weight-bold text-dark mb-1">Diskusi Gugus Kendali Mutu & Kurikulum</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Review Capaian Pembelajaran Lulusan (CPL)</small>
                        </div>
                    </div>
                </div>

                <!-- Foto 3 (Meet3.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet3.jpeg') }}" class="popup-gallery" title="Presentasi Pemetaan Standar Capaian">
                            <img src="{{ asset('img/foto/Meet3.jpeg') }}" class="img-fluid" alt="Presentasi Standar Capaian" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-warning mb-2">CPL</span>
                            <h6 class="font-weight-bold text-dark mb-1">Presentasi Pemetaan Standar Capaian</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Pemaparan Instrumen Mutu Perkuliahan</small>
                        </div>
                    </div>
                </div>

                <!-- Foto 4 (Meet4.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet4.jpeg') }}" class="popup-gallery" title="Rapat Tinjauan Manajemen Semesteran">
                            <img src="{{ asset('img/foto/Meet4.jpeg') }}" class="img-fluid" alt="Rapat Tinjauan Manajemen" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-danger mb-2">RTM</span>
                            <h6 class="font-weight-bold text-dark mb-1">Rapat Tinjauan Manajemen Semesteran</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Pengendalian Temuan Audit Mutu Internal</small>
                        </div>
                    </div>
                </div>

                <!-- Foto 5 (Meet5.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet5.jpeg') }}" class="popup-gallery" title="Workshop Pemutakhiran Dokumen Standar">
                            <img src="{{ asset('img/foto/Meet5.jpeg') }}" class="img-fluid" alt="Workshop Pemutakhiran Dokumen" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-info mb-2">SOP</span>
                            <h6 class="font-weight-bold text-dark mb-1">Workshop Pemutakhiran Dokumen Standar</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Sinkronisasi Standar SN-Dikti & LAMINFOKOM</small>
                        </div>
                    </div>
                </div>

                <!-- Foto 6 (Meet6.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet6.jpeg') }}" class="popup-gallery" title="Monitoring Ketercapaian Perkuliahan">
                            <img src="{{ asset('img/foto/Meet6.jpeg') }}" class="img-fluid" alt="Monitoring Ketercapaian Mutu" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-dark mb-2">MONEV</span>
                            <h6 class="font-weight-bold text-dark mb-1">Monitoring Ketercapaian Perkuliahan</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Analisis Hasil Kuesioner Kepuasan</small>
                        </div>
                    </div>
                </div>

                <!-- Foto 7 (Meet7.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet7.jpeg') }}" class="popup-gallery" title="Tim Auditor Mutu Internal">
                            <img src="{{ asset('img/foto/Meet7.jpeg') }}" class="img-fluid" alt="Koordinasi Auditor Internal" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-success mb-2">AMI</span>
                            <h6 class="font-weight-bold text-dark mb-1">Tim Auditor Mutu Internal</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Penugasan Auditor Lapangan</small>
                        </div>
                    </div>
                </div>

                <!-- Foto 8 (Meet8.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet8.jpeg') }}" class="popup-gallery" title="Tindak Lanjut Temuan Audit">
                            <img src="{{ asset('img/foto/Meet8.jpeg') }}" class="img-fluid" alt="Tindak Lanjut Temuan Audit" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-danger mb-2">PTK</span>
                            <h6 class="font-weight-bold text-dark mb-1">Tindak Lanjut Temuan Audit</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Kaizen Peningkatan Standar Mutu</small>
                        </div>
                    </div>
                </div>

                <!-- Foto 9 (Meet9.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet9.jpeg') }}" class="popup-gallery" title="Standarisasi Lab Komputer">
                            <img src="{{ asset('img/foto/Meet9.jpeg') }}" class="img-fluid" alt="Standarisasi Sarana Laboratorium" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-info mb-2">SARPRAS</span>
                            <h6 class="font-weight-bold text-dark mb-1">Standarisasi Lab Komputer</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Fasilitas Praktikum & Riset ICT</small>
                        </div>
                    </div>
                </div>

                <!-- Foto 10 (Meet10.jpeg) -->
                <div class="single-galeri-item">
                    <div class="card border-0 shadow-sm rounded overflow-hidden h-100">
                        <a href="{{ asset('img/foto/Meet10.jpeg') }}" class="popup-gallery" title="Finalisasi Berkas LED/LKPS">
                            <img src="{{ asset('img/foto/Meet10.jpeg') }}" class="img-fluid" alt="Finalisasi Dokumen Akreditasi" style="height: 230px; width: 100%; object-fit: cover;">
                        </a>
                        <div class="card-body p-3">
                            <span class="badge badge-primary mb-2">AKREDITASI</span>
                            <h6 class="font-weight-bold text-dark mb-1">Finalisasi Berkas LED/LKPS</h6>
                            <small class="text-muted"><i class="fal fa-calendar-alt mr-1"></i> Submit Dokumen LAMINFOKOM</small>
                        </div>
                    </div>
                </div>

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

            <div class="row mt-5">
                <!-- Berita 1 -->
                <div class="col-xl-4 col-md-6 col-12 mb-4" data-aos="fade-up">
                    <div class="single-blog-card style-3 bg-white rounded shadow-sm overflow-hidden h-100">
                        <div class="blog-featured-thumb bg-cover" style="background-image: url('{{ asset('img/foto/Meet1.jpeg') }}'); height: 210px;"></div>
                        <div class="content p-4">
                            <div class="post-top-meta d-flex flex-wrap align-items-center mb-2">
                                <div class="post-date mr-3">
                                    <span class="text-muted small"><i class="fal fa-calendar-alt mr-1"></i> 15 Oktober 2026</span>
                                </div>
                                <span class="badge badge-primary">SPMI</span>
                            </div>
                            <h4 class="font-weight-bold mb-2">Pelaksanaan Audit Mutu Internal Semester Ganjil</h4>
                            <div class="excerpt text-muted small mb-3">
                                <p>Gugus Penjaminan Mutu FICT resmi memulai audit mutu untuk memverifikasi kesesuaian dokumen perkuliahan dan kurikulum OBE.</p>
                            </div>
                            <div class="btn-link-share d-flex justify-content-between align-items-center">
                                <a href="#galeri-kegiatan" class="text-primary font-weight-bold">Lihat Foto <i class="icon-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Berita 2 -->
                <div class="col-xl-4 col-md-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="single-blog-card style-3 bg-white rounded shadow-sm overflow-hidden h-100">
                        <div class="blog-featured-thumb bg-cover" style="background-image: url('{{ asset('img/foto/Meet3.jpeg') }}'); height: 210px;"></div>
                        <div class="content p-4">
                            <div class="post-top-meta d-flex flex-wrap align-items-center mb-2">
                                <div class="post-date mr-3">
                                    <span class="text-muted small"><i class="fal fa-calendar-alt mr-1"></i> 08 Oktober 2026</span>
                                </div>
                                <span class="badge badge-info">LAMINFOKOM</span>
                            </div>
                            <h4 class="font-weight-bold mb-2">Workshop Penyusunan LED Akreditasi Program Studi</h4>
                            <div class="excerpt text-muted small mb-3">
                                <p>Tim dosen dan pimpinan prodi Informatika & Sistem Informasi menyelaraskan bukti capaian kriteria LAMINFOKOM.</p>
                            </div>
                            <div class="btn-link-share d-flex justify-content-between align-items-center">
                                <a href="#galeri-kegiatan" class="text-primary font-weight-bold">Lihat Foto <i class="icon-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Berita 3 -->
                <div class="col-xl-4 col-md-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="single-blog-card style-3 bg-white rounded shadow-sm overflow-hidden h-100">
                        <div class="blog-featured-thumb bg-cover" style="background-image: url('{{ asset('img/foto/Meet4.jpeg') }}'); height: 210px;"></div>
                        <div class="content p-4">
                            <div class="post-top-meta d-flex flex-wrap align-items-center mb-2">
                                <div class="post-date mr-3">
                                    <span class="text-muted small"><i class="fal fa-calendar-alt mr-1"></i> 25 September 2026</span>
                                </div>
                                <span class="badge badge-danger">RTM</span>
                            </div>
                            <h4 class="font-weight-bold mb-2">Rapat Tinjauan Manajemen Menetapkan 8 Rekomendasi</h4>
                            <div class="excerpt text-muted small mb-3">
                                <p>Pimpinan Fakultas menyepakati langkah strategis penguatan fasilitas komputasi dan percepatan publikasi ilmiah dosen.</p>
                            </div>
                            <div class="btn-link-share d-flex justify-content-between align-items-center">
                                <a href="#galeri-kegiatan" class="text-primary font-weight-bold">Lihat Foto <i class="icon-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <p class="mt-3 text-muted" data-aos="fade-up" data-aos-delay="150" style="max-width: 680px; margin: 0 auto;">
                            Akses dan unduh berkas Standar Mutu dan Manual Mutu Sistem Penjaminan Mutu Internal (SPMI) Fakultas.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <!-- DOKUMEN STANDAR MUTU (#dokumen-standar-mutu) -->
                <div class="col-lg-6 col-12 mb-4" id="dokumen-standar-mutu" data-aos="fade-right">
                    <div class="p-4 bg-light rounded shadow-sm border h-100">
                        <h4 class="font-weight-bold text-dark mb-2"><i class="fas fa-file-alt text-primary mr-2"></i> Dokumen Standar Mutu</h4>
                        <p class="text-muted small mb-4">Kumpulan Standar SPMI Fakultas Informatika & Komputer:</p>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Standar Kompetensi Lulusan (SKL) & CPL</h6>
                                <small class="text-muted">PDF • Versi 2026 • 2.4 MB</small>
                            </div>
                            <button class="btn btn-sm btn-primary" onclick="alert('Mengunduh Standar Kompetensi Lulusan')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Standar Isi Pembelajaran & Kurikulum OBE</h6>
                                <small class="text-muted">PDF • Versi 2026 • 3.1 MB</small>
                            </div>
                            <button class="btn btn-sm btn-primary" onclick="alert('Mengunduh Standar Isi Pembelajaran')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Standar Proses & Penilaian Pembelajaran</h6>
                                <small class="text-muted">PDF • Versi 2026 • 1.9 MB</small>
                            </div>
                            <button class="btn btn-sm btn-primary" onclick="alert('Mengunduh Standar Proses Pembelajaran')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Standar Dosen & Tenaga Kependidikan</h6>
                                <small class="text-muted">PDF • Versi 2026 • 1.5 MB</small>
                            </div>
                            <button class="btn btn-sm btn-primary" onclick="alert('Mengunduh Standar Dosen & Tendik')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Standar Sarana, Prasarana & Lab ICT</h6>
                                <small class="text-muted">PDF • Versi 2026 • 2.8 MB</small>
                            </div>
                            <button class="btn btn-sm btn-primary" onclick="alert('Mengunduh Standar Sarana Prasarana')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- DOKUMEN MANUAL MUTU (#dokumen-manual-mutu) -->
                <div class="col-lg-6 col-12 mb-4" id="dokumen-manual-mutu" data-aos="fade-left">
                    <div class="p-4 bg-light rounded shadow-sm border h-100">
                        <h4 class="font-weight-bold text-dark mb-2"><i class="fas fa-book text-info mr-2"></i> Dokumen Manual Mutu</h4>
                        <p class="text-muted small mb-4">Pedoman Prosedur Operasional Siklus PPEPP FICT:</p>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Manual Penetapan Standar Mutu (P)</h6>
                                <small class="text-muted">PDF • Pedoman Penyusunan Standar • 1.8 MB</small>
                            </div>
                            <button class="btn btn-sm btn-info" onclick="alert('Mengunduh Manual Penetapan')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Manual Pelaksanaan Standar Mutu (P)</h6>
                                <small class="text-muted">PDF • Pedoman Implementasi Tridharma • 2.1 MB</small>
                            </div>
                            <button class="btn btn-sm btn-info" onclick="alert('Mengunduh Manual Pelaksanaan')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Manual Evaluasi & Audit Mutu Internal (E)</h6>
                                <small class="text-muted">PDF • Pedoman Auditor & Instrumen AMI • 3.4 MB</small>
                            </div>
                            <button class="btn btn-sm btn-info" onclick="alert('Mengunduh Manual Evaluasi')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border mb-3">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Manual Pengendalian Standar & RTM (P)</h6>
                                <small class="text-muted">PDF • Tata Cara RTM & Permintaan Koreksi • 1.6 MB</small>
                            </div>
                            <button class="btn btn-sm btn-info" onclick="alert('Mengunduh Manual Pengendalian')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded border">
                            <div>
                                <h6 class="font-weight-bold mb-1 text-dark">Manual Peningkatan Standar Mutu (P)</h6>
                                <small class="text-muted">PDF • Kaizen & Continuous Improvement • 1.4 MB</small>
                            </div>
                            <button class="btn btn-sm btn-info" onclick="alert('Mengunduh Manual Peningkatan')">
                                <i class="fas fa-download mr-1"></i> Unduh
                            </button>
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
                        <a href="mailto:pm.fict@horizon.ac.id" class="theme-btn">Layanan Aspirasi Mutu <i class="icon-arrow-right-1"></i></a>
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