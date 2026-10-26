<header class="header-wrap header-5">
    <div class="top-header d-none d-md-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="header-cta">
                        <ul>
                            <li><a href="#"><i class="icon-location-dot"></i>Gedung FICT, Kampus Horizon University</a></li>
                            <li><a href="mailto:pm.fict@horizon.ac.id"><i class="fal fa-envelope"></i>pm.fict@horizon.ac.id</a></li>
                            <li><a href="tel:+622678458888"><i class="fal fa-phone"></i>(0267) 845-8888</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="header-right-cta d-flex justify-content-end align-items-center">
                        <div class="social-profile">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-header-wraper">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <!-- Logo -->
                <div class="header-logo">
                    <div class="logo">
                        <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
                            <img src="{{ asset('img/fict.png') }}" alt="PM FICT Logo" style="max-height: 48px;">
                            <span class="ml-2 font-weight-bold text-dark d-none d-sm-inline" style="font-size: 18px; letter-spacing: -0.5px;">PM FICT</span>
                        </a>
                    </div>
                </div>

                <!-- Desktop Menu Navigasi Sesuai Permintaan -->
                <div class="header-menu d-none d-xl-block">
                    <div class="main-menu">
                        <ul>
                            <!-- 1. Home -->
                            <li><a href="{{ url('/') }}">Home</a></li>

                            <!-- 2. Profile -->
                            <li><a href="#profile">Profile <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="#struktur-organisasi">Struktur Organisasi</a></li>
                                    <li><a href="#visi-misi">Visi dan Misi</a></li>
                                </ul>
                            </li>

                            <!-- 3. SPME -->
                            <li><a href="#spme">SPME <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="#spme-banpt">BAN-PT</a></li>
                                    <li><a href="#spme-laminfokom">LAMINFOKOM</a></li>
                                </ul>
                            </li>

                            <!-- 4. Berita -->
                            <li><a href="#berita">Berita</a></li>

                            <!-- 5. Download -->
                            <li><a href="#download">Download <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="#dokumen-standar-mutu">Dokumen Standar Mutu</a></li>
                                    <li><a href="#dokumen-manual-mutu">Dokumen Manual Mutu</a></li>
                                </ul>
                            </li>

                            <!-- 6. Aplikasi -->
                            <li><a href="#">Aplikasi <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="https://spmi.horizon.ac.id/login" target="_blank" rel="noopener noreferrer">AQA</a></li>
                                    <li><a href="https://lms.horizon.ac.id/" target="_blank" rel="noopener noreferrer">LMS</a></li>
                                    <li><a href="#">Repository</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                </ul>
                            </li>

                            <!-- 7. PPEPP -->
                            <li><a href="#ppepp">PPEPP <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="#ppepp-penetapan">Penetapan</a></li>
                                    <li><a href="#ppepp-pelaksanaan">Pelaksanaan</a></li>
                                    <li><a href="#ppepp-evaluasi">Evaluasi</a></li>
                                    <li><a href="#ppepp-pengendalian">Pengendalian</a></li>
                                    <li><a href="#ppepp-peningkatan">Peningkatan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Mobile Hamburger (Hanya Tampil di Layar Mobile/Tablet) -->
                <div class="header-right d-flex align-items-center d-xl-none">
                    <div class="mobile-nav-bar d-block">
                        <div class="mobile-nav-wrap">                    
                            <div id="hamburger">
                                <i class="fal fa-bars"></i>
                            </div>
                            
                            <!-- Mobile Menu - Responsive Menu  -->
                            <div class="mobile-nav">
                                <button type="button" class="close-nav">
                                    <i class="fal fa-times-circle"></i>
                                </button>
                                <nav class="sidebar-nav">
                                    <ul class="metismenu" id="mobile-menu">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a class="has-arrow" href="#profile">Profile</a>
                                            <ul class="sub-menu">
                                                <li><a href="#struktur-organisasi">Struktur Organisasi</a></li>
                                                <li><a href="#visi-misi">Visi dan Misi</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="has-arrow" href="#spme">SPME</a>
                                            <ul class="sub-menu">
                                                <li><a href="#spme-banpt">BAN-PT</a></li>
                                                <li><a href="#spme-laminfokom">LAMINFOKOM</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#berita">Berita</a></li>
                                        <li><a class="has-arrow" href="#download">Download</a>
                                            <ul class="sub-menu">
                                                <li><a href="#dokumen-standar-mutu">Dokumen Standar Mutu</a></li>
                                                <li><a href="#dokumen-manual-mutu">Dokumen Manual Mutu</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="has-arrow" href="#">Aplikasi</a>
                                            <ul class="sub-menu">
                                                <li><a href="https://spmi.horizon.ac.id/login" target="_blank" rel="noopener noreferrer">AQA</a></li>
                                                <li><a href="https://lms.horizon.ac.id/" target="_blank" rel="noopener noreferrer">LMS</a></li>
                                                <li><a href="#">Repository</a></li>
                                                <li><a href="{{ route('login') }}">Login</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="has-arrow" href="#ppepp">PPEPP</a>
                                            <ul class="sub-menu">
                                                <li><a href="#ppepp-penetapan">Penetapan</a></li>
                                                <li><a href="#ppepp-pelaksanaan">Pelaksanaan</a></li>
                                                <li><a href="#ppepp-evaluasi">Evaluasi</a></li>
                                                <li><a href="#ppepp-pengendalian">Pengendalian</a></li>
                                                <li><a href="#ppepp-peningkatan">Peningkatan</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
    
                                <div class="action-bar">
                                    <a href="#"><i class="icon-location-dot"></i>Gedung FICT, Kampus Horizon University</a>
                                    <a href="mailto:pm.fict@horizon.ac.id"><i class="fal fa-envelope-open-text"></i>pm.fict@horizon.ac.id</a>
                                    <a href="tel:02678458888"><i class="fal fa-phone"></i>(0267) 845-8888</a>
                                </div>
                            </div>                            
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-gutter"></div>
