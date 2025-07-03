<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class AspirasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone' => 'required|numeric',
            'tujuan' => 'required|string|max:100',
            'message' => 'required|string|max:500',
            'urgensi' => 'required|integer|between:1,5',
            'cakupan_wilayah' => 'required|integer|between:1,5',
            'dampak_sosial' => 'required|integer|between:1,5',
            'kategori' => 'required|integer|between:1,5',
            'nama_dewan' => 'required|string|max:100',
            'dapil' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('aspirasi_files', $fileName, 'public');
        }

        Aspirasi::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'tujuan' => $request->tujuan,
            'message' => $request->message,
            'urgensi' => $request->urgensi,
            'cakupan_wilayah' => $request->cakupan_wilayah,
            'dampak_sosial' => $request->dampak_sosial,
            'kategori' => $request->kategori,
            'nama_dewan' => $request->nama_dewan,
            'dapil' => $request->dapil,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Aspirasi berhasil dikirim!');
    }
}
