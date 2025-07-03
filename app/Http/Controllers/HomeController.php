<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Anggota;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anggotas = Anggota::with('galleries')->get();
        $blogs = Blog::get()->take(3);

        return view('homepage', compact('anggotas','blogs'));
    }
}
