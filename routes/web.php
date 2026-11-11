<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrganizationStructureController;
use App\Http\Controllers\Admin\QualityDocumentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DokumenMutuController;
use App\Models\Gallery;
use App\Models\HeroSlider;
use App\Models\News;
use App\Models\OrganizationStructure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

// Home
Route::get('/', function () {
    $heroSliders = Schema::hasTable('hero_sliders')
        ? HeroSlider::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get()
        : collect();

    if ($heroSliders->isEmpty()) {
        $heroSliders = collect(HeroSlider::defaultSlides())->map(fn (array $slide): object => (object) $slide);
    }

    $galleries = Schema::hasTable('galleries')
        ? Gallery::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get()
        : collect();

    if ($galleries->isEmpty()) {
        $galleries = collect(Gallery::defaultItems())->map(fn (array $item): object => (object) $item);
    }

    $newsList = Schema::hasTable('news')
        ? News::where('is_published', true)->orderByDesc('published_at')->orderByDesc('id')->get()
        : collect();

    if ($newsList->isEmpty()) {
        $newsList = collect(News::defaultArticles())->map(fn (array $article): object => (object) $article);
    }

    $organizationStructures = Schema::hasTable('organization_structures')
        ? OrganizationStructure::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get()
        : collect();

    if ($organizationStructures->isEmpty()) {
        $organizationStructures = collect(OrganizationStructure::defaultItems())->map(fn (array $item): object => (object) $item);
    }

    return view('index', [
        'heroSliders' => $heroSliders,
        'galleries' => $galleries,
        'newsList' => $newsList,
        'organizationStructures' => $organizationStructures,
    ]);
})->name('home');

// Profile Menu
Route::prefix('profile')->group(function () {
    Route::get('/struktur-organisasi', function () {
        return redirect('/#struktur-organisasi');
    })->name('profile.struktur');

    Route::get('/visi-misi', function () {
        return redirect('/#visi-misi');
    })->name('profile.visimisi');
});

// SPME Menu
Route::prefix('spme')->group(function () {
    Route::get('/ban-pt', function () {
        return redirect('/#spme-banpt');
    })->name('spme.banpt');

    Route::get('/laminfokom', function () {
        return redirect('/#spme-laminfokom');
    })->name('spme.laminfokom');
});

// Berita Menu
Route::get('/berita', function () {
    return redirect('/#berita');
})->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.detail');

// Download Menu (Halaman Dokumen Mutu)
Route::prefix('download')->name('download.')->group(function () {
    Route::get('/dokumen-kebijakan-mutu', [DokumenMutuController::class, 'kebijakanMutu'])
        ->name('kebijakan-mutu');

    Route::get('/dokumen-standar-mutu', [DokumenMutuController::class, 'standarMutu'])
        ->name('standar-mutu');

    Route::get('/dokumen-manual-mutu', [DokumenMutuController::class, 'manualMutu'])
        ->name('manual-mutu');

    Route::get('/dokumen-formulir-mutu', [DokumenMutuController::class, 'formulirMutu'])
        ->name('formulir-mutu');
});

// Aplikasi Menu
Route::prefix('aplikasi')->group(function () {
    Route::get('/aqa', function () {
        return redirect()->away('https://spmi.horizon.ac.id/login');
    })->name('aplikasi.aqa');

    Route::get('/lms', function () {
        return redirect()->away('https://lms.horizon.ac.id/');
    })->name('aplikasi.lms');

    Route::get('/repository', function () {
        return redirect('/');
    })->name('aplikasi.repository');

    Route::get('/login', function () {
        return redirect()->route('login');
    })->name('aplikasi.login');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Admin Routes (Protected by auth & admin role middleware)
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Hero Slider CRUD
    Route::post('/hero-sliders', [HeroSliderController::class, 'store'])->name('hero-sliders.store');
    Route::put('/hero-sliders/{heroSlider}', [HeroSliderController::class, 'update'])->name('hero-sliders.update');
    Route::delete('/hero-sliders/{heroSlider}', [HeroSliderController::class, 'destroy'])->name('hero-sliders.destroy');

    // Gallery CRUD
    Route::post('/galleries', [GalleryController::class, 'store'])->name('galleries.store');
    Route::put('/galleries/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

    // News CRUD
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Organization Structure CRUD
    Route::post('/organization-structures', [OrganizationStructureController::class, 'store'])->name('organization-structures.store');
    Route::put('/organization-structures/{organizationStructure}', [OrganizationStructureController::class, 'update'])->name('organization-structures.update');
    Route::delete('/organization-structures/{organizationStructure}', [OrganizationStructureController::class, 'destroy'])->name('organization-structures.destroy');

    // Quality Document CRUD
    Route::post('/quality-documents', [QualityDocumentController::class, 'store'])->name('quality-documents.store');
    Route::put('/quality-documents/{qualityDocument}', [QualityDocumentController::class, 'update'])->name('quality-documents.update');
    Route::delete('/quality-documents/{qualityDocument}', [QualityDocumentController::class, 'destroy'])->name('quality-documents.destroy');
});

// PPEPP Menu
Route::prefix('ppepp')->group(function () {
    Route::get('/penetapan', function () {
        return redirect('/#ppepp-penetapan');
    })->name('ppepp.penetapan');

    Route::get('/pelaksanaan', function () {
        return redirect('/#ppepp-pelaksanaan');
    })->name('ppepp.pelaksanaan');

    Route::get('/evaluasi', function () {
        return redirect('/#ppepp-evaluasi');
    })->name('ppepp.evaluasi');

    Route::get('/pengendalian', function () {
        return redirect('/#ppepp-pengendalian');
    })->name('ppepp.pengendalian');

    Route::get('/peningkatan', function () {
        return redirect('/#ppepp-peningkatan');
    })->name('ppepp.peningkatan');
});

// Kontak Kami Menu
Route::get('/kontak-kami', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak-kami', [ContactController::class, 'store'])->name('kontak.submit');
