<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnggotaRequest;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::paginate(10);

        return view('admin.anggotas.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.anggotas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnggotaRequest $request)
    {
        if($request->validated()) {
            $slug = Str::slug($request->nama, '-');
            $anggota = Anggota::create($request->validated() + ['slug' => $slug ]);
        }

        return redirect()->route('admin.anggotas.edit', [$anggota])->with([
            'message' => 'Success Created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        $galleries = Gallery::paginate(10);
        
        return view('admin.anggotas.edit', compact('anggota','galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnggotaRequest $request, Anggota $anggota)
    {
        if($request->validated()) {
            $slug = Str::slug($request->nama, '-');
            $anggota->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.anggotas.index')->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
