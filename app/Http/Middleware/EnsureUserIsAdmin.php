<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Memastikan pengguna yang login memiliki role 'admin'.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        if (isset($user->role) && $user->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman ini khusus untuk Administrator.');
        }

        return $next($request);
    }
}
