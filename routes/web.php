<?php

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('index');
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

// Download Menu
Route::prefix('download')->group(function () {
    Route::get('/dokumen-standar-mutu', function () {
        return redirect('/#dokumen-standar-mutu');
    })->name('download.standar-mutu');

    Route::get('/dokumen-manual-mutu', function () {
        return redirect('/#dokumen-manual-mutu');
    })->name('download.manual-mutu');
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
        return redirect('/');
    })->name('aplikasi.login');
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
