<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class DokumenMutuController extends Controller
{
    /**
     * Menampilkan halaman Dokumen Kebijakan Mutu.
     */
    public function kebijakanMutu(): View
    {
        return view('dokumen.kebijakan-mutu');
    }

    /**
     * Menampilkan halaman Dokumen Standar Mutu.
     */
    public function standarMutu(): View
    {
        return view('dokumen.standar-mutu');
    }

    /**
     * Menampilkan halaman Dokumen Manual Mutu.
     */
    public function manualMutu(): View
    {
        return view('dokumen.manual-mutu');
    }

    /**
     * Menampilkan halaman Dokumen Formulir Mutu.
     */
    public function formulirMutu(): View
    {
        return view('dokumen.formulir-mutu');
    }
}
