<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard admin.
     */
    public function index(Request $request): View
    {
        return view('admin.dashboard', [
            'user' => $request->user(),
        ]);
    }
}
