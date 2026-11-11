<!DOCTYPE html>
<html lang="id">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Penjaminan Mutu FICT">
    <meta name="description" content="Penjaminan Mutu Fakultas Informatika dan Komputer - Sistem Penjaminan Mutu Internal (SPMI), SPME BAN-PT, LAMINFOKOM, Siklus PPEPP dan Dokumen Mutu.">

    <!-- ======== Page title ============ -->
    <title>@yield('title', 'PM FICT')</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('img/logo_college.png') }}">

    <!-- =========== All Stylesheet Bawaan Template di public/css ================= -->
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/metismenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* ==========================================================================
           GLOBAL CONTAINER & HORIZONTAL MARGIN OVERRIDES
           Menjaga jarak kiri-kanan di semua halaman agar tidak terlalu mepet ke tepi layar
           ========================================================================== */
        .container {
            width: 88% !important;
            max-width: 1100px !important;
            margin-left: auto !important;
            margin-right: auto !important;
            padding-left: 24px !important;
            padding-right: 24px !important;
        }
        @media (max-width: 767px) {
            .container {
                width: 92% !important;
                padding-left: 16px !important;
                padding-right: 16px !important;
            }
        }
        header.header-5 .top-header {
            padding: 6px 0 !important;
        }
        header.header-5 .main-header-wraper {
            padding: 0 !important;
        }
        @media (max-width: 1199px) {
            header.header-5 .main-header-wraper {
                padding: 14px 0 !important;
            }
        }
        .cta-banner.style-3 .container-fluid {
            width: 88% !important;
            max-width: 1100px !important;
            margin-left: auto !important;
            margin-right: auto !important;
            border-radius: 10px !important;
        }
        /* Reset margin negatif -175px bawaan template pada foto di section Profile */
        .about-wrapper.techex-landing-page .about-img {
            margin: 0 !important;
        }
        @media (max-width: 991px) {
            .about-wrapper.techex-landing-page .about-img {
                margin-bottom: 24px !important;
            }
        }

        /* ==========================================================================
           GLOBAL PROPORTIONAL TYPOGRAPHY & SPACING OVERRIDES
           Menyesuaikan ukuran font bawaan template yang terlalu besar di semua section
           ========================================================================== */
        body {
            font-size: 15px !important;
            line-height: 1.65 !important;
        }
        p {
            font-size: 14.5px;
            line-height: 1.65;
        }
        a {
            font-size: 14.5px;
            line-height: 1.5;
        }
        h1 {
            font-size: 28px !important;
            line-height: 1.35 !important;
            letter-spacing: -0.5px !important;
        }
        h2 {
            font-size: 24px !important;
            line-height: 1.35 !important;
            letter-spacing: -0.3px !important;
        }
        h3 {
            font-size: 19px !important;
            line-height: 1.4 !important;
            letter-spacing: 0 !important;
        }
        h4 {
            font-size: 17px !important;
            line-height: 1.4 !important;
            letter-spacing: 0 !important;
        }
        h5 {
            font-size: 15.5px !important;
            line-height: 1.45 !important;
            letter-spacing: 0 !important;
        }
        h6 {
            font-size: 14.5px !important;
            line-height: 1.45 !important;
            letter-spacing: 0 !important;
        }

        /* Header & Navigasi */
        header.header-5 .top-header .header-cta ul li a {
            font-size: 13px !important;
        }
        header.header-5 .main-menu ul > li > a {
            font-size: 14.5px !important;
            padding: 28px 18px !important;
        }
        @media (min-width: 1200px) {
            .header-gutter {
                top: 122px !important;
                min-height: 122px !important;
            }
        }
        header.header-5 .main-menu ul > li > ul li a {
            font-size: 13.5px !important;
            padding: 10px 20px !important;
        }

        /* Hero Slider Section */
        .hero-slide-wrapper.techex-landing-page .single-slide {
            padding: 130px 0 !important;
        }
        .hero-slide-wrapper.techex-landing-page .single-slide:after {
            background: linear-gradient(rgba(15, 41, 66, 0.48), rgba(15, 41, 66, 0.58)) !important;
        }
        .hero-slide-wrapper.techex-landing-page .single-slide .hero-contents .theme-btn-sm {
            font-size: 12.5px !important;
            padding: 6px 14px !important;
        }
        .hero-slide-wrapper.techex-landing-page .single-slide .hero-contents h1 {
            font-size: 36px !important;
            line-height: 1.3 !important;
            margin-bottom: 14px !important;
            letter-spacing: -0.5px !important;
        }
        .hero-slide-wrapper.techex-landing-page .single-slide .hero-contents p {
            font-size: 15.5px !important;
            line-height: 1.65 !important;
        }
        .theme-btn {
            font-size: 14px !important;
            padding: 13px 24px !important;
        }
        .theme-btn-sm {
            font-size: 12px !important;
            padding: 6px 14px !important;
        }

        /* Section Title di Semua Section */
        .section-title h1 {
            font-size: 28px !important;
            line-height: 1.35 !important;
            letter-spacing: -0.5px !important;
        }
        .section-title p {
            font-size: 14.5px !important;
            line-height: 1.65 !important;
            text-transform: none !important;
            font-weight: 400 !important;
        }

        /* Siklus PPEPP Cards */
        .single-provide-solutions .number {
            font-size: 64px !important;
            line-height: 64px !important;
        }
        .single-provide-solutions .content {
            padding: 46px 22px 30px !important;
        }
        .single-provide-solutions .content h3 {
            font-size: 18px !important;
            margin-bottom: 8px !important;
        }
        .single-provide-solutions .content p {
            font-size: 13.5px !important;
            line-height: 1.6 !important;
        }
        .single-provide-solutions .content .read-more {
            font-size: 12px !important;
            margin-top: 18px !important;
        }

        /* Page Banner (Halaman Dokumen Mutu & Inner Pages) */
        .page-banner-wrap {
            padding-top: 85px !important;
            padding-bottom: 85px !important;
        }
        .page-banner-wrap h1 {
            font-size: 32px !important;
            line-height: 1.3 !important;
            letter-spacing: -0.5px !important;
        }
        .page-banner-wrap .banner-text {
            font-size: 64px !important;
            left: 15px !important;
            opacity: 0.08 !important;
        }
        .page-banner-wrap .breadcrumb {
            margin-top: 14px !important;
        }
        .page-banner-wrap .breadcrumb li,
        .page-banner-wrap .breadcrumb li a {
            font-size: 14px !important;
        }

        /* CTA Banner & Footer */
        .cta-banner.style-3 .container-fluid {
            padding: 55px 15px !important;
        }
        .cta-banner.style-3 .container-fluid h1 {
            font-size: 24px !important;
            line-height: 1.35 !important;
        }
        .footer-4 p,
        .footer-4 .single-footer-wid ul li a {
            font-size: 14px !important;
            line-height: 1.65 !important;
        }
        .footer-4 .wid-title h4 {
            font-size: 16.5px !important;
        }
        .footer-4 .footer-bottom-content,
        .footer-4 .footer-bottom-content a {
            font-size: 13.5px !important;
        }

        @media (max-width: 767px) {
            .hero-slide-wrapper.techex-landing-page .single-slide {
                padding: 80px 0 !important;
            }
            .hero-slide-wrapper.techex-landing-page .single-slide .hero-contents h1 {
                font-size: 24px !important;
            }
            .section-title h1,
            .page-banner-wrap h1 {
                font-size: 22px !important;
            }
        }

        /* Cegah footer-4 menabrak konten pada halaman yang tidak memiliki .cta-banner */
        *:not(.cta-banner) + .footer-4 {
            margin-top: 0 !important;
            padding-top: 10px !important;
        }
        /* Styling Tabel Dokumen Mutu agar rapi, praktis, dan modern */
        .dokumen-section {
            padding-top: 60px;
            padding-bottom: 90px;
        }
        .table-dokumen-mutu {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }
        .table-dokumen-mutu thead th {
            background-color: #0f2942;
            color: #ffffff;
            font-weight: 600;
            font-size: 12.5px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border: none;
            padding: 12px 15px;
            vertical-align: middle;
        }
        .table-dokumen-mutu thead th:first-child {
            border-top-left-radius: 6px;
        }
        .table-dokumen-mutu thead th:last-child {
            border-top-right-radius: 6px;
        }
        .table-dokumen-mutu tbody td {
            padding: 13px 15px;
            vertical-align: middle;
            border-top: 1px solid #e9ecef;
            color: #334155;
            font-size: 13.5px;
        }
        .table-dokumen-mutu tbody tr:hover {
            background-color: #f8fafc;
        }
    </style>

    @stack('styles')
</head>

<body class="body-wrapper">    
    <!-- preloader -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="P" class="letters-loading">P</span>
                <span data-text-preloader="M" class="letters-loading">M</span>
                <span data-text-preloader="-" class="letters-loading">-</span>
                <span data-text-preloader="F" class="letters-loading">F</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="C" class="letters-loading">C</span>
                <span data-text-preloader="T" class="letters-loading">T</span>
            </div>
            <p class="text-center">Penjaminan Mutu</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left"><div class="bg"></div></div>
                <div class="col-3 loader-section section-left"><div class="bg"></div></div>
                <div class="col-3 loader-section section-right"><div class="bg"></div></div>
                <div class="col-3 loader-section section-right"><div class="bg"></div></div>
            </div>
        </div>
    </div>

    <!-- Header & Menu Navigasi Bawaan Template -->
    @include('partials.header')

    <!-- Konten Halaman -->
    @yield('content')

    <!-- Footer Bawaan Template -->
    @include('partials.footer')

    <!-- =========== All JS Plugins Bawaan Template di public/js ================= -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/modernizr.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/imageload.min.js') }}"></script>
    <script src="{{ asset('js/scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/easypiechart.min.js') }}"></script>
    <script src="{{ asset('js/counterup.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/metismenu.js') }}"></script>
    <script src="{{ asset('js/timeline.min.js') }}"></script>
    <script src="{{ asset('js/ajax-mail.js') }}"></script>
    <script src="{{ asset('js/aos.min.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>

    @stack('scripts')
</body>

</html>
