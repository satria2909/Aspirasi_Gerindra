<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pengunjung;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Cek hanya untuk halaman utama (misal: '/')
        if ($request->is('/')) {
            Pengunjung::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'jumlah' => 1
            ]);
        }

        return $next($request);
    }
}
