<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login admin.
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Memproses percobaan login admin (menggunakan username atau email).
     */
    public function login(Request $request): RedirectResponse
    {
        if ($request->has('email') && ! $request->has('username')) {
            $request->merge(['username' => $request->input('email')]);
        }

        $validated = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $remember = $request->boolean('remember');
        $loginValue = $validated['username'];
        $password = $validated['password'];

        $authenticated = Auth::attempt(['name' => $loginValue, 'password' => $password], $remember)
            || Auth::attempt(['email' => $loginValue, 'password' => $password], $remember);

        if ($authenticated) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()
            ->withInput($request->only('username', 'remember'))
            ->withErrors([
                'username' => 'Username atau password yang dimasukkan tidak sesuai.',
            ]);
    }

    /**
     * Mengeluarkan pengguna dari sesi (logout).
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Anda telah berhasil keluar dari sistem.');
    }
}
