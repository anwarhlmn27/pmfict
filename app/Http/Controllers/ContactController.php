<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman Kontak Kami.
     */
    public function index(): View
    {
        return view('kontak');
    }

    /**
     * Memproses pengiriman pesan dari form Kontak Kami.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:2000'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'subject.required' => 'Subjek pesan wajib diisi.',
            'message.required' => 'Isi pesan wajib diisi.',
        ]);

        return back()->with('status', 'Terima kasih! Pesan Anda telah berhasil dikirim ke Unit Penjaminan Mutu FICT.');
    }
}
