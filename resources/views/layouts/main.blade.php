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
