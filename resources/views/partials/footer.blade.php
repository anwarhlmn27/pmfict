<footer class="footer-4 footer-wrap">
    <div class="footer-widgets">            
        <div class="container">
            <div class="row justify-content-between">
                <!-- Col 1: About PM FICT -->
                <div class="col-md-6 col-xl-3 col-12 pr-xl-4">
                    <div class="single-footer-wid site_footer_widget">
                        <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 text-decoration-none">
                            <img src="{{ asset('img/logo-2.png') }}" alt="PM FICT" style="max-height: 44px;">
                            <span class="ml-2 font-weight-bold text-white" style="font-size: 20px;">PM FICT</span>
                        </a>
                        <p class="mt-4">
                            Unit Penjaminan Mutu Fakultas Informatika dan Komputer (PM FICT) bertugas mengawal budaya mutu akademik, akreditasi nasional (BAN-PT & LAMINFOKOM), dan pelaksanaan siklus PPEPP secara berkesinambungan.
                        </p>
                        <div class="social-link mt-30">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Profile & SPME -->
                <div class="col-md-6 col-xl-2 col-12">                        
                    <div class="single-footer-wid">
                        <div class="wid-title">
                            <h4>Profile & SPME</h4>
                        </div>
                        <ul>
                            <li><a href="{{ url('/#struktur-organisasi') }}">Struktur Organisasi</a></li>
                            <li><a href="{{ url('/#visi-misi') }}">Visi dan Misi</a></li>
                            <li><a href="{{ route('kontak') }}">Kontak Kami</a></li>
                            <li><a href="{{ url('/#spme-banpt') }}">BAN-PT</a></li>
                            <li><a href="{{ url('/#spme-laminfokom') }}">LAMINFOKOM</a></li>
                            <li><a href="{{ url('/#galeri-kegiatan') }}">Galeri Rapat</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Col 3: PPEPP & Download -->
                <div class="col-md-6 col-xl-3 col-12">                        
                    <div class="single-footer-wid">
                        <div class="wid-title">
                            <h4>Dokumen Mutu SPMI</h4>
                        </div>
                        <ul>
                            <li><a href="{{ route('download.kebijakan-mutu') }}">Dokumen Kebijakan Mutu</a></li>
                            <li><a href="{{ route('download.standar-mutu') }}">Dokumen Standar Mutu</a></li>
                            <li><a href="{{ route('download.manual-mutu') }}">Dokumen Manual Mutu</a></li>
                            <li><a href="{{ route('download.formulir-mutu') }}">Dokumen Formulir Mutu</a></li>
                            <li><a href="{{ url('/#ppepp') }}">Siklus PPEPP</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Col 4: Aplikasi & Kontak -->
                <div class="col-md-6 col-xl-3 col-12">
                    <div class="single-footer-wid">
                        <div class="wid-title">
                            <h4>Portal Aplikasi</h4>
                        </div>
                        <ul class="mb-3">
                            <li><a href="https://spmi.horizon.ac.id/login" target="_blank" rel="noopener noreferrer"><i class="fas fa-shield-alt mr-2 text-primary"></i> AQA (Quality Assurance)</a></li>
                            <li><a href="https://lms.horizon.ac.id/" target="_blank" rel="noopener noreferrer"><i class="fas fa-graduation-cap mr-2 text-success"></i> LMS (E-Learning)</a></li>
                            <li><a href="#"><i class="fas fa-archive mr-2 text-warning"></i> Repository</a></li>
                            <li><a href="#"><i class="fas fa-sign-in-alt mr-2 text-info"></i> Login</a></li>
                        </ul>
                        <div class="footer-contact-info text-white-50" style="font-size: 13px;">
                            <p class="mb-1"><i class="fal fa-map-marker-alt mr-2 text-primary"></i> Gedung FICT, Kampus Horizon University</p>
                            <p class="mb-0"><i class="fal fa-envelope mr-2 text-primary"></i> pm.fict@horizon.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container text-center">
            <div class="footer-bottom-content">
                &copy; {{ date('Y') }} <a href="{{ url('/') }}">PM FICT</a> - Penjaminan Mutu Fakultas Informatika dan Komputer. All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
