@extends('layouts.main')

@section('title', 'Kontak Kami - Penjaminan Mutu FICT')

@section('content')

<!-- ================= PAGE BANNER ================= -->
<section class="page-banner-wrap bg-cover" style="background-image: linear-gradient(rgba(15, 41, 66, 0.85), rgba(15, 41, 66, 0.90)), url('{{ asset('img/foto/Meet3.jpeg') }}');">
    <div class="banner-text">KONTAK</div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <div class="page-heading text-white">
                    <div class="page-title">
                        <h1>Kontak Kami</h1>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/#profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kontak Kami</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ================= SECTION KONTAK & FORMULIR ================= -->
<section class="dokumen-section bg-light">
    <div class="container">

        <div class="row">
            <!-- KOLOM KIRI: INFORMASI ALAMAT, TELEPON, EMAIL, & WEBSITE (Silakan ubah teks HTML di bawah ini) -->
            <div class="col-lg-5 mb-4">
                <div class="bg-white p-4 rounded shadow-sm border h-100">
                    <span class="badge badge-primary px-3 py-1 mb-2">INFORMASI KONTAK</span>
                    <h3 class="font-weight-bold text-dark mb-2">Hubungi Unit Penjaminan Mutu FICT</h3>
                    <p class="text-muted mb-4">
                        Silakan hubungi kami untuk layanan konsultasi penjaminan mutu akademik, Audit Mutu Internal (AMI), akreditasi program studi, maupun penyampaian aspirasi mutu.
                    </p>

                    <!-- 1. ALAMAT KAMI (Silakan ubah teks alamat di bawah ini) -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="contact-icon-box mr-3">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h6 class="font-weight-bold text-dark mb-1">Alamat Kami</h6>
                            <p class="text-muted mb-1">
                                Gedung FICT, Kampus Horizon University Indonesia<br>
                                Jl. Pangkal Perjuangan By Pass KM. 1, Tanjungpura, Kec. Karawang Barat, Karawang, Jawa Barat 41316
                            </p>
                            <a href="https://maps.app.goo.gl/DDstLPTdgou3sE1q7" target="_blank" rel="noopener noreferrer" class="text-primary font-weight-bold small">
                                <i class="fas fa-external-link-alt mr-1"></i> Lihat di Google Maps
                            </a>
                        </div>
                    </div>

                    <!-- 2. TELEPON / WHATSAPP (Silakan ubah nomor telepon di bawah ini) -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="contact-icon-box mr-3">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h6 class="font-weight-bold text-dark mb-1">Telepon / WhatsApp</h6>
                            <p class="text-muted mb-0">
                                <a href="tel:+622678458888" class="text-muted">(0267) 845-8888</a> /
                                <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="text-muted">+62 812-3456-7890</a>
                            </p>
                            <small class="text-muted">Senin – Jumat, 08.00 – 16.00 WIB</small>
                        </div>
                    </div>

                    <!-- 3. EMAIL RESMI (Silakan ubah alamat email di bawah ini) -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="contact-icon-box mr-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="font-weight-bold text-dark mb-1">Email Resmi</h6>
                            <p class="text-muted mb-0">
                                <a href="mailto:pm.fict@horizon.ac.id" class="text-muted">pm.fict@horizon.ac.id</a><br>
                                <a href="mailto:fict@horizon.ac.id" class="text-muted">fict@horizon.ac.id</a>
                            </p>
                        </div>
                    </div>

                    <!-- 4. WEBSITE RESMI (Silakan ubah alamat website di bawah ini) -->
                    <div class="d-flex align-items-start">
                        <div class="contact-icon-box mr-3">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div>
                            <h6 class="font-weight-bold text-dark mb-1">Website Resmi</h6>
                            <p class="text-muted mb-0">
                                <a href="https://horizon.ac.id" target="_blank" rel="noopener noreferrer" class="text-muted">https://horizon.ac.id</a><br>
                                <a href="https://spmi.horizon.ac.id" target="_blank" rel="noopener noreferrer" class="text-muted">https://spmi.horizon.ac.id</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: FORMULIR PESAN / KONTAK KAMI -->
            <div class="col-lg-7 mb-4">
                <div class="bg-white p-4 rounded shadow-sm border h-100">
                    <span class="badge badge-primary px-3 py-1 mb-2">FORMULIR PESAN</span>
                    <h3 class="font-weight-bold text-dark mb-2">Kirim Pesan & Aspirasi Mutu</h3>
                    <p class="text-muted mb-4">
                        Isi formulir di bawah ini untuk mengirimkan pertanyaan, saran peningkatan standar mutu, atau permohonan informasi ke tim Penjaminan Mutu FICT.
                    </p>

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i> {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Nama Lengkap -->
                            <div class="col-md-6 form-group mb-3">
                                <label for="name" class="font-weight-bold text-dark small mb-1">Nama Lengkap <span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control border @error('name') is-invalid @enderror"
                                    placeholder="Masukkan nama lengkap Anda"
                                    required
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alamat Email -->
                            <div class="col-md-6 form-group mb-3">
                                <label for="email" class="font-weight-bold text-dark small mb-1">Alamat Email <span class="text-danger">*</span></label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control border @error('email') is-invalid @enderror"
                                    placeholder="nama@domain.com"
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nomor Telepon / WhatsApp -->
                            <div class="col-md-6 form-group mb-3">
                                <label for="phone" class="font-weight-bold text-dark small mb-1">Nomor Telepon / WhatsApp</label>
                                <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    class="form-control border @error('phone') is-invalid @enderror"
                                    placeholder="Contoh: 081234567890"
                                >
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Subjek / Keperluan -->
                            <div class="col-md-6 form-group mb-3">
                                <label for="subject" class="font-weight-bold text-dark small mb-1">Subjek / Keperluan <span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    class="form-control border @error('subject') is-invalid @enderror"
                                    placeholder="Contoh: Konsultasi Dokumen SPMI"
                                    required
                                >
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Isi Pesan -->
                            <div class="col-12 form-group mb-4">
                                <label for="message" class="font-weight-bold text-dark small mb-1">Isi Pesan <span class="text-danger">*</span></label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="5"
                                    class="form-control border @error('message') is-invalid @enderror"
                                    placeholder="Tuliskan pesan, pertanyaan, atau masukan Anda di sini..."
                                    required
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tombol Submit -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary font-weight-bold px-4 py-2">
                                    <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- BARIS BAWAH: PETA LOKASI GOOGLE MAPS -->
        <div class="row mt-2">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm border">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                        <div>
                            <h4 class="font-weight-bold text-dark mb-1"><i class="fas fa-map-marked-alt text-primary mr-2"></i> Peta Lokasi Kampus</h4>
                            <small class="text-muted">Lokasi Gedung FICT - Horizon University Indonesia</small>
                        </div>
                        <a href="https://maps.app.goo.gl/DDstLPTdgou3sE1q7" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary font-weight-bold mt-2 mt-sm-0">
                            <i class="fas fa-location-arrow mr-1"></i> Buka di Google Maps
                        </a>
                    </div>

                    <div class="rounded overflow-hidden border" style="height: 380px;">
                        <iframe
                            title="Lokasi Kampus Horizon University Indonesia"
                            src="https://www.google.com/maps?q=Horizon+University+Indonesia+Karawang&output=embed"
                            width="100%"
                            height="380"
                            style="border: 0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('styles')
<style>
    .contact-icon-box {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 8px;
        background-color: #e8f2fc;
        color: #086ad7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }
    .form-control.border {
        border: 1px solid #cbd5e1 !important;
        font-size: 14px;
        padding: 10px 14px;
        height: auto;
        border-radius: 6px;
    }
    .form-control.border:focus {
        border-color: #086ad7 !important;
        box-shadow: 0 0 0 3px rgba(8, 106, 215, 0.12) !important;
    }
</style>
@endpush

