<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    
    public function index()
    {
        $galeris = Galeri::orderBy('created_at', 'desc')->get();
        return view('galeri', compact('galeris')); // Mem-passing variabel $galeris ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', // validasi file (opsional)
        ]);

        // Inisialisasi path file jika ada
        $filePath = null;

        // Jika ada file di-upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('galeris_files', $fileName, 'public'); // simpan di storage/app/public/galeris_files
        }

        // Simpan data ke database
        Galeri::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath, // pastikan kolom ini ada di tabel 'aspirasis'
        ]);

        return redirect()->back()->with('success', 'Gambar berhasil dikirim!');
    }

}
