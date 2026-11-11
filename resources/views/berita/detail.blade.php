@extends('layouts.main')

@section('title', $article->title . ' - Berita & Agenda Mutu FICT')

@section('content')
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
    $authorName = ($article instanceof \App\Models\News && $article->author)
        ? $article->author->name
        : 'Tim Penjaminan Mutu FICT';
@endphp

<!-- ================= PAGE BANNER ================= -->
<section class="page-banner-wrap bg-cover" style="background-image: linear-gradient(rgba(15, 41, 66, 0.80), rgba(15, 41, 66, 0.88)), url('{{ $thumbUrl }}');">
    <div class="banner-text">BERITA</div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <div class="page-heading text-white">
                    <span class="badge {{ $badgeCls }} px-3 py-1 mb-2" style="font-size: 12px;">{{ $article->category_badge }}</span>
                    <div class="page-title">
                        <h1 style="max-width: 820px;">{{ $article->title }}</h1>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/#berita') }}">Berita & Agenda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ================= SECTION DETAIL BERITA ================= -->
<section class="dokumen-section bg-light pt-60 pb-60">
    <div class="container">
        <div class="row">
            <!-- KOLOM KIRI: ISI LENGKAP BERITA -->
            <div class="col-lg-8 mb-4">
                <article class="bg-white rounded shadow-sm border overflow-hidden">
                    <!-- Gambar Utama -->
                    <div style="max-height: 420px; overflow: hidden; background: #0f2942;">
                        <img src="{{ $thumbUrl }}" alt="{{ $article->title }}" class="img-fluid w-100" style="max-height: 420px; object-fit: cover;">
                    </div>

                    <div class="p-4 p-md-5">
                        <!-- Meta Informasi -->
                        <div class="d-flex flex-wrap align-items-center text-muted small pb-3 mb-3 border-bottom">
                            <span class="mr-4 mb-1">
                                <i class="fal fa-calendar-alt text-primary mr-1"></i> {{ $pubDate }}
                            </span>
                            <span class="mr-4 mb-1">
                                <i class="fal fa-user text-primary mr-1"></i> {{ $authorName }}
                            </span>
                            <span class="mb-1">
                                <span class="badge {{ $badgeCls }} px-2 py-1">{{ $article->category_badge }}</span>
                            </span>
                        </div>

                        <!-- Judul Artikel -->
                        <h2 class="font-weight-bold text-dark mb-3">{{ $article->title }}</h2>

                        <!-- Ringkasan / Excerpt (jika berbeda dari isi) -->
                        @if(!empty($article->excerpt) && trim(strip_tags((string) $article->excerpt)) !== trim(strip_tags((string) $article->content)))
                            <div class="p-3 mb-4 rounded" style="background: #f0f7ff; border-left: 4px solid #086ad7; color: #1e293b;">
                                <p class="mb-0 font-italic">{{ $article->excerpt }}</p>
                            </div>
                        @endif

                        <!-- Isi Lengkap Berita (Mendukung HTML CKEditor maupun Teks Biasa) -->
                        <div class="news-article-body text-dark" style="line-height: 1.8; font-size: 15px;">
                            @if($article->content !== strip_tags((string) $article->content))
                                {!! $article->content !!}
                            @else
                                {!! nl2br(e($article->content)) !!}
                            @endif
                        </div>

                        <!-- Tombol Navigasi Bawah -->
                        <div class="mt-5 pt-4 border-top d-flex flex-wrap justify-content-between align-items-center">
                            <a href="{{ url('/#berita') }}" class="btn btn-outline-primary btn-sm px-3 py-2 font-weight-bold">
                                <i class="fal fa-arrow-left mr-1"></i> Kembali ke Daftar Berita
                            </a>
                            <a href="{{ route('kontak') }}" class="btn btn-light border btn-sm px-3 py-2 text-dark">
                                <i class="fal fa-envelope text-primary mr-1"></i> Hubungi Unit Mutu
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- KOLOM KANAN: SIDEBAR BERITA LAINNYA & PINTASAN -->
            <div class="col-lg-4 mb-4">
                <!-- Berita & Agenda Lainnya -->
                <div class="bg-white p-4 rounded shadow-sm border mb-4">
                    <h5 class="font-weight-bold text-dark mb-3 pb-2 border-bottom">
                        <i class="fal fa-newspaper text-primary mr-2"></i> Berita & Agenda Lainnya
                    </h5>
                    @forelse($relatedNews as $rel)
                        @php
                            $relThumb = $rel instanceof \App\Models\News
                                ? $rel->thumbnailUrl()
                                : (str_starts_with($rel->thumbnail ?? '', 'http') ? $rel->thumbnail : asset($rel->thumbnail ?: 'img/foto/Meet1.jpeg'));
                            $relBadgeCls = $rel instanceof \App\Models\News
                                ? $rel->badgeClass()
                                : \App\Models\News::resolveBadgeClass($rel->category_badge ?? 'SPMI');
                            $relDate = $rel instanceof \App\Models\News
                                ? $rel->formattedPublishedDate()
                                : \App\Models\News::formatIndonesianDate($rel->published_at ?? now());
                        @endphp
                        <div class="d-flex align-items-start {{ !$loop->last ? 'mb-3 pb-3 border-bottom' : '' }}">
                            <a href="{{ route('berita.detail', $rel->slug) }}" class="mr-3 flex-shrink-0">
                                <img src="{{ $relThumb }}" alt="{{ $rel->title }}" class="rounded border" style="width: 76px; height: 58px; object-fit: cover;">
                            </a>
                            <div>
                                <div class="mb-1">
                                    <span class="badge {{ $relBadgeCls }}" style="font-size: 10px;">{{ $rel->category_badge }}</span>
                                    <small class="text-muted ml-1" style="font-size: 11.5px;">{{ $relDate }}</small>
                                </div>
                                <h6 class="mb-0" style="font-size: 13.5px; line-height: 1.4;">
                                    <a href="{{ route('berita.detail', $rel->slug) }}" class="text-dark font-weight-bold">
                                        {{ $rel->title }}
                                    </a>
                                </h6>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted small mb-0">Belum ada berita lainnya.</p>
                    @endforelse
                </div>

                <!-- Pintasan Dokumen Mutu SPMI -->
                <div class="bg-white p-4 rounded shadow-sm border">
                    <h5 class="font-weight-bold text-dark mb-3 pb-2 border-bottom">
                        <i class="fal fa-folder-open text-primary mr-2"></i> Dokumen Mutu SPMI
                    </h5>
                    <ul class="list-unstyled mb-0" style="line-height: 2.1;">
                        <li class="border-bottom pb-1 mb-1">
                            <a href="{{ route('download.kebijakan-mutu') }}" class="text-dark d-flex justify-content-between align-items-center">
                                <span><i class="fal fa-file-pdf text-primary mr-2"></i> Dokumen Kebijakan Mutu</span>
                                <i class="fal fa-angle-right text-muted"></i>
                            </a>
                        </li>
                        <li class="border-bottom pb-1 mb-1">
                            <a href="{{ route('download.standar-mutu') }}" class="text-dark d-flex justify-content-between align-items-center">
                                <span><i class="fal fa-file-alt text-primary mr-2"></i> Dokumen Standar Mutu</span>
                                <i class="fal fa-angle-right text-muted"></i>
                            </a>
                        </li>
                        <li class="border-bottom pb-1 mb-1">
                            <a href="{{ route('download.manual-mutu') }}" class="text-dark d-flex justify-content-between align-items-center">
                                <span><i class="fal fa-book text-primary mr-2"></i> Dokumen Manual Mutu</span>
                                <i class="fal fa-angle-right text-muted"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('download.formulir-mutu') }}" class="text-dark d-flex justify-content-between align-items-center">
                                <span><i class="fal fa-clipboard-list text-primary mr-2"></i> Dokumen Formulir Mutu</span>
                                <i class="fal fa-angle-right text-muted"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

