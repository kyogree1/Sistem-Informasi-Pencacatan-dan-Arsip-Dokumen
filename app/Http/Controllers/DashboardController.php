<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // TOTAL ARSIP
        $totalArsip = DB::table('archives')->count();

        // DOKUMEN BULAN INI
        $arsipBulanIni = DB::table('archives')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        // ARSIP TERBARU
        $arsipTerbaru = DB::table('archives')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalArsip',
            'arsipBulanIni',
            'arsipTerbaru'
        ));
    }
}
