<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Archive;

class ArchiveSeeder extends Seeder
{
    public function run(): void
    {
        Archive::insert([
            [
                'nama_debitur'   => 'PT Maju Jaya Sejahtera',
                'no_pk'          => 'PK-001-2026',
                'nilai_kredit'   => 1200000000,
                'jumlah_bantex'  => 2,
                'dokumen_divisi' => 'Kredit',
                'lokasi_dokumen' => 'Rak B2 – Lemari 3',
                'departemen'     => 'Corporate Banking',
                'pic'            => 'Andi Pratama',
                'keterangan'     => 'Dokumen lengkap, jaminan di bantex 2',
                'created_at'     => now()->subDays(2),
                'updated_at'     => now(),
            ],
            [
                'nama_debitur'   => 'CV Sinar Abadi',
                'no_pk'          => 'PK-002-2026',
                'nilai_kredit'   => 450000000,
                'jumlah_bantex'  => 1,
                'dokumen_divisi' => 'Kredit',
                'lokasi_dokumen' => 'Rak A1 – Lemari 1',
                'departemen'     => 'UMKM',
                'pic'            => 'Rina Lestari',
                'keterangan'     => 'Perlu update dokumen jaminan',
                'created_at'     => now()->subDays(10),
                'updated_at'     => now(),
            ],
            [
                'nama_debitur'   => 'Ahmad Fauzi',
                'no_pk'          => 'PK-003-2026',
                'nilai_kredit'   => 250000000,
                'jumlah_bantex'  => 1,
                'dokumen_divisi' => 'Legal',
                'lokasi_dokumen' => 'Rak C3 – Lemari 2',
                'departemen'     => 'Retail',
                'pic'            => 'Budi Santoso',
                'keterangan'     => null,
                'created_at'     => now()->subMonth(),
                'updated_at'     => now(),
            ],
        ]);
    }
}

