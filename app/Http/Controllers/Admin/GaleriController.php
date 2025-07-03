<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Tampilkan semua galeri
    public function index()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('admin.galeris.index', compact('galeris'));
    }


    // Tampilkan form upload
    public function create()
    {
        return view('admin.galeris.create');
    }

    // Simpan file dan data galeri
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'nullable|string|max:100',
            'description' => 'nullable|string',
        ]);

        $path = $request->file('file')->store('galeri', 'public');

        Galeri::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
        ]);

        return redirect()->route('admin.galeris.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    // Hapus gambar
    public function destroy($id)
    {
        $galeris = Galeri::findOrFail($id);

        if (Storage::disk('public')->exists($galeris->file_path)) {
            Storage::disk('public')->delete($galeris->file_path);
        }

        $galeris->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}

