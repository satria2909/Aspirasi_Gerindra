<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aspirasi;

class SpkController extends Controller
{
    public function index()
    {
        $aspirasis = Aspirasi::all();

        $bobot = [
            'urgensi' => 0.40,
            'cakupan_wilayah' => 0.20,
            'dampak_sosial' => 0.30,
            'jumlah' => 0.10,
        ];

        $kategoriCounts = Aspirasi::selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        $maxJumlah = $kategoriCounts->max() ?: 1;

        $kriteria = ['urgensi', 'cakupan_wilayah', 'dampak_sosial', 'jumlah'];
        $X = [];
        $Xplus = [];
        $Xminus = [];

        foreach ($aspirasis as $a) {
            // Normalisasi jumlah berdasarkan kategori (di-skala ke 5 poin)
            $jumlah_normal = ($kategoriCounts[$a->kategori] ?? 1) / $maxJumlah * 5;
            $X[$a->id] = [
                'urgensi' => $a->urgensi,
                'cakupan_wilayah' => $a->cakupan_wilayah,
                'dampak_sosial' => $a->dampak_sosial,
                'jumlah' => $jumlah_normal,
            ];
        }

        foreach ($kriteria as $k) {
            $Xplus[$k] = max(array_column($X, $k));
            $Xminus[$k] = min(array_column($X, $k));
        }

        $S = [];
        $R = [];

        foreach ($X as $id => $nilai) {
            $s_i = 0;
            $r_i = 0;
            foreach ($kriteria as $k) {
                $denominator = ($Xplus[$k] - $Xminus[$k]) ?: 1;
                $norm = ($Xplus[$k] - $nilai[$k]) / $denominator;
                $bobot_k = $bobot[$k];
                $s_i += $bobot_k * $norm;
                $r_i = max($r_i, $bobot_k * $norm);
            }
            $S[$id] = $s_i;
            $R[$id] = $r_i;
        }

        $Splus = max($S); $Sminus = min($S);
        $Rplus = max($R); $Rminus = min($R);

        $Q = [];
        $v = 0.5; // bobot preferensi antara S dan R

        foreach ($aspirasis as $a) {
            $sid = $S[$a->id];
            $rid = $R[$a->id];

            $q = $v * (($sid - $Sminus) / (($Splus - $Sminus) ?: 1)) +
                 (1 - $v) * (($rid - $Rminus) / (($Rplus - $Rminus) ?: 1));

            $Q[$a->id] = $q;

            $a->skor = round($q, 4);
            $a->save();
        }

        $hasil = Aspirasi::orderBy('skor')->paginate(10);
        return view('admin.spk.index', compact('hasil'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->status = $request->status;
        $aspirasi->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
