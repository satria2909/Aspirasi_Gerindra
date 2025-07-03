<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Blog;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::with('galleries')->get();

        return view('anggotas.index', compact('anggotas'));
    }

    public function show(Anggota $anggota)
    {
        $anggotas = Anggota::where('id', '!=', $anggota->id)->with('galleries')->get();

        // Ambil berita populer atau berita terbaru (silakan sesuaikan)
        $relatedBlogs = Blog::orderBy('created_at', 'desc')->take(2)->get();

        return view('anggotas.show', compact('anggota', 'anggotas', 'relatedBlogs'));
    }
}
