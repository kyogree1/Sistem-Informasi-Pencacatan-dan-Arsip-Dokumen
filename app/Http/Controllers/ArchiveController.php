<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {

        $arsip = DB::table('archives')
            ->when($request->search, function ($q) use ($request) {
                $q->where('nama_debitur', 'like', '%' . $request->search . '%')
                  ->orWhere('no_pk', 'like', '%' . $request->search . '%');
            })
            ->orderByDesc('id')
            ->paginate(10);

        return view('archive.index', compact('arsip'));
    }

    // ✅ HALAMAN FORM TAMBAH
    public function create()
    {
        return view('archive.create');
    }

    // ✅ SIMPAN DATA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_debitur'   => 'required|string|max:255',
            'no_pk'          => 'required|string|max:100|unique:archives,no_pk',
            'dokumen_divisi'   => 'required|string|max:100',
            'lokasi_dokumen' => 'required|string|max:255',
            'pic'            => 'required|string|max:100',
        ]);

        DB::table('archives')->insert([
            'nama_debitur'   => $validated['nama_debitur'],
            'no_pk'          => $validated['no_pk'],
            'dokumen_divisi' => $validated['dokumen_divisi'],
            'lokasi_dokumen' => $validated['lokasi_dokumen'],
            'pic'            => $validated['pic'],
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return redirect()
            ->route('archive.index')
            ->with('success', 'Arsip berhasil ditambahkan');
    }
}
