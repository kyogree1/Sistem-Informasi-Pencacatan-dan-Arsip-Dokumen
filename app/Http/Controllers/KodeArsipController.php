<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archive;
use Illuminate\Support\Facades\DB;

class KodeArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = Archive::query()
            ->when($request->search, function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('no_pk', 'like', '%' . $request->search . '%');
            });

        // Get paginated unique debiturs (group by nama)
        $paginatedDebiturs = (clone $query)
            ->select('nama', DB::raw('COUNT(*) as total_bantex'))
            ->groupBy('nama')
            ->paginate(10);

        $debiturNames = $paginatedDebiturs->pluck('nama');

        // Fetch detailed archives for these debiturs
        $details = Archive::whereIn('nama', $debiturNames)
            ->orderBy('nama')
            ->orderBy('no_rak')
            ->get()
            ->groupBy('nama');

        return view('kode_arsip.index', [
            'paginatedDebiturs' => $paginatedDebiturs,
            'details' => $details
        ]);
    }

    public function edit($id)
    {
        $arsip = Archive::findOrFail($id);
        return view('kode_arsip.edit', compact('arsip'));
    }

    public function update(Request $request, $id)
    {
        $arsip = Archive::findOrFail($id);

        $validated = $request->validate([
            'no_pk'        => 'nullable|string|max:255',
            'departemen'   => 'nullable|string|max:255',
            'pic'          => 'nullable|string|max:255',
            'lokasi_arsip' => 'nullable|string|max:255',
            'no_rak'       => 'nullable|string|max:255',
            'baris_rak'    => 'nullable|string|max:255',
            'keterangan'   => 'nullable|string',
        ]);

        $arsip->update($validated);

        return redirect()
            ->route('kode_arsip.index')
            ->with('success', 'Lokasi Arsip berhasil diperbarui.');
    }
}
