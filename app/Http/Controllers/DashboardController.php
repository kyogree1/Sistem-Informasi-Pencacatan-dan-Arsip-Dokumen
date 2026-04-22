<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Import Request
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filterBulan = $request->query('bulan');

        // 1. TOTAL ARSIP (Global)
        $totalArsip = DB::table('archives')->count();

        // 2. Query Utama (untuk digunakan di kartu DAN tabel)
        $query = DB::table('archives');

        // Terapkan filter jika ada
        if ($filterBulan && $filterBulan !== 'semua') {
            $query->whereMonth('created_at', $filterBulan)
                ->whereYear('created_at', now()->year);
        } elseif (!$filterBulan) {
            // Default: jika tidak ada filter, gunakan bulan ini
            $query->whereMonth('created_at', now()->month)  
                ->whereYear('created_at', now()->year);
        }

        // Hitung jumlah untuk kartu (gunakan clone agar $query tidak rusak)
        $arsipBulanIni = (clone $query)->count();

        // Ambil 5 data terbaru (mengikuti filter bulan yang dipilih)
        $arsipTerbaru = (clone $query)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('dashboard', compact('totalArsip', 'arsipBulanIni', 'arsipTerbaru'));
    }
}
