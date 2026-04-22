<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Archive;

class ArchiveController extends Controller
{
    public function index(Request $request)
{
    // 1. Inisiasi query dasar
    $query = DB::table('archives');

    // 2. Fitur Pencarian & Pagination
    // Hapus logika filter bulan karena halaman ini adalah master data
    $arsip = $query->when($request->search, function ($q) use ($request) {
            $q->where(function ($sub) use ($request) {
                $sub->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('cif', 'like', '%' . $request->search . '%')
                    ->orWhere('no_pk', 'like', '%' . $request->search . '%'); // Opsional: tambah pencarian no_pk
            });
        })
        ->orderByDesc('created_at') // Urutkan dari yang paling baru
        ->paginate(10); // Menampilkan 10 data per halaman

    // 3. Lempar variabel ke tampilan
    return view('archive.index', compact('arsip'));
}
    public function create()
    {
        return view('archive.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cif'            => 'required|string|max:255',
            'no_pk'          => 'required|string|max:255',
            'nama'           => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'plafon'         => 'required|numeric',
            'status'         => 'required|in:Lunas,Belum Lunas',
            'pic'            => 'required|string|max:255',
            'berkas'         => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'departemen'     => 'required|string|max:255',
            'keterangan'     => 'nullable|string',
            'lokasi_arsip'   => 'required|string|max:255',
            'no_rak'         => 'required|string|max:255',
            'baris_rak'      => 'nullable|string|max:255',
        ]);

        $berkasPath = null;
        if ($request->hasFile('berkas')) {
            $berkasPath = $request->file('berkas')->store('berkas_arsip', 'public');
        }

        $validated['berkas'] = $berkasPath;
        $validated['created_at'] = now();
        $validated['updated_at'] = now();

        DB::table('archives')->insert($validated);

        return redirect()
            ->route('archive.index')
            ->with('success', 'Data arsip berhasil ditambahkan');
    }

    public function edit($id)
    {
        $arsip = Archive::findOrFail($id);
        return view('archive.edit', compact('arsip'));
    }

    public function update(Request $request, $id)
    {
        $arsip = Archive::findOrFail($id);

        $validated = $request->validate([
            'cif'            => 'required|string|max:255',
            'nama'           => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'plafon'         => 'required|numeric',
            'status'         => 'required|in:Lunas,Belum Lunas',
            'berkas'         => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('berkas')) {
            if ($arsip->berkas) {
                Storage::disk('public')->delete($arsip->berkas);
            }
            $validated['berkas'] = $request->file('berkas')->store('berkas_arsip', 'public');
        }

        $arsip->update($validated);

        return redirect()
            ->route('archive.index')
            ->with('success', 'Data arsip berhasil diperbarui');
    }

    public function destroy($id)
    {
        $arsip = Archive::findOrFail($id);

        if ($arsip->berkas) {
            Storage::disk('public')->delete($arsip->berkas);
        }

        $arsip->delete();

        return redirect()
            ->route('archive.index')
            ->with('success', 'Data arsip berhasil dihapus');
    }
}
