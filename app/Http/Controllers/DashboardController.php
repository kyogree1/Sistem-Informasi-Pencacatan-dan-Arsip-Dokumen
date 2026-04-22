<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Import Request
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter bulan dan tahun dari URL
        $filterBulan = $request->query('bulan');
        $filterTahun = $request->query('tahun', now()->year); // Default ke tahun saat ini

        // 1. TOTAL ARSIP (Tetap ambil semua)
        $totalArsip = DB::table('archives')->count();

        // 2. QUERY UTAMA
        $query = DB::table('archives');

        // -- Filter Tahun --
        if ($filterTahun !== 'semua') {
            $query->whereYear('created_at', $filterTahun);
        }

        // -- Filter Bulan --
        if ($filterBulan === 'semua') {
            // Jangan filter bulan (akan menampilkan full 1 tahun atau seluruh waktu)
        } elseif ($filterBulan) {
            $query->whereMonth('created_at', $filterBulan);
        } else {
            // Default: bulan ini
            $query->whereMonth('created_at', now()->month);
        }

        // Hitung jumlah untuk kartu
        $arsipBulanIni = (clone $query)->count();

        // Ambil data untuk tabel
        $arsipTerbaru = (clone $query)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('dashboard', compact('totalArsip', 'arsipBulanIni', 'arsipTerbaru'));
    }
}
