<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request, Anggota $anggota)
    {
        if($request->validated()){
            $images = $request->file('images')->store(
                'anggota/gallery', 'public'
            );
            Gallery::create($request->except('images') + ['images' => $images,'anggota_id' => $anggota->id]);
        }

        return redirect()->route('admin.anggotas.edit', [$anggota])->with([
            'message' => 'Success Created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota,Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('anggota','gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request,Anggota $anggota, Gallery $gallery)
    {
        if($request->validated()) {
            if($request->images) {
                File::delete('storage/'. $gallery->images);
                $images = $request->file('images')->store(
                    'anggota/gallery', 'public'
                );
                $gallery->update($request->except('images') + ['images' => $images, 'anggota_id' => $anggota->id]);
            }else {
                $gallery->update($request->validated());
            }
        }

        return redirect()->route('admin.anggotas.edit', [$anggota])->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota,Gallery $gallery)
    {
        File::delete('storage/'. $gallery->images);
        $gallery->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
