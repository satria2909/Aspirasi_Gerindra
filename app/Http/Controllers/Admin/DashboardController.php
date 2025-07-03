<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Aspirasi;
use App\Models\Blog;
use App\Models\Pengunjung;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $dates = collect(range(6, 0))->map(function ($i) {
            return Carbon::now()->subDays($i)->format('Y-m-d');
        });
        
        $startDate = Carbon::parse($dates->first())->startOfDay();
        $endDate = Carbon::parse($dates->last())->endOfDay();
        

        // Ambil data Aspirasi per tanggal
        $aspirasi = DB::table('aspirasis')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->pluck('total', 'date');

        // Ambil data Interaksi Berita (Blog)
        $interaksi = DB::table('blogs')
            ->selectRaw('DATE(updated_at) as date, SUM(COALESCE(`reads`, 0)) as total')
            ->whereBetween('updated_at', [$startDate, $endDate])
            ->groupBy('date')
            ->pluck('total', 'date');

        // Ambil data Pengunjung
        $pengunjung = DB::table('pengunjungs')
            ->selectRaw('DATE(created_at) as date, SUM(COALESCE(jumlah, 0)) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->pluck('total', 'date');

        // Isi data berdasarkan tanggal (jika tidak ada data = 0)
        $chartData = [
            'labels' => $dates->values(),
            'aspirasi' => $dates->map(fn($date) => $aspirasi[$date] ?? 0),
            'interaksi' => $dates->map(fn($date) => $interaksi[$date] ?? 0),
            'pengunjung' => $dates->map(fn($date) => $pengunjung[$date] ?? 0),
        ];

        return view('admin.dashboard', [
            'totalAnggota' => Anggota::count(),
            'totalAspirasi' => Aspirasi::count(),
            'totalInteraksi' => Blog::sum('reads'),
            'totalPengunjung' => Pengunjung::sum('jumlah'),
            'chartData' => $chartData,
        ]);
    }
}
