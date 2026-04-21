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
                'cif'            => 'CIF001',
                'no_pk'          => 'PK001/2026',
                'nama'           => 'PT Maju Jaya Sejahtera',
                'nomor_rekening' => '1234567890',
                'plafon'         => 1200000000,
                'status'         => 'Belum Lunas',
                'pic'            => 'Budi Santoso',
                'berkas'         => null,
                'departemen'     => 'Penyelesaian Kredit',
                'keterangan'     => 'Dokumen PK dan Agunan Lengkap',
                'lokasi_arsip'   => 'Ruang Arsip 1',
                'no_rak'         => '01 | 03',
                'baris_rak'      => 'Baris 1',
                'created_at'     => now()->subDays(2),
                'updated_at'     => now(),
            ],
            [
                'cif'            => 'CIF002',
                'no_pk'          => 'PK002/2026',
                'nama'           => 'CV Sinar Abadi',
                'nomor_rekening' => '0987654321',
                'plafon'         => 450000000,
                'status'         => 'Lunas',
                'pic'            => 'Siti Aminah',
                'berkas'         => null,
                'departemen'     => 'Penyelamatan Kredit',
                'keterangan'     => 'Dokumen sedang direview',
                'lokasi_arsip'   => 'Ruang Arsip 1',
                'no_rak'         => '02 | 01',
                'baris_rak'      => 'Baris 3',
                'created_at'     => now()->subDays(10),
                'updated_at'     => now(),
            ],
            [
                'cif'            => 'CIF003',
                'no_pk'          => 'PK003/2026',
                'nama'           => 'Ahmad Fauzi',
                'nomor_rekening' => '1122334455',
                'plafon'         => 250000000,
                'status'         => 'Belum Lunas',
                'pic'            => 'Budi Santoso',
                'berkas'         => null,
                'departemen'     => 'Penyelesaian Kredit',
                'keterangan'     => 'Menunggu tanda tangan direktur',
                'lokasi_arsip'   => 'Ruang Arsip 2',
                'no_rak'         => '03 | 05',
                'baris_rak'      => 'Baris 2',
                'created_at'     => now()->subMonth(),
                'updated_at'     => now(),
            ],
            [
                'cif'            => 'CIF001',
                'no_pk'          => 'PK001A/2026',
                'nama'           => 'PT Maju Jaya Sejahtera',
                'nomor_rekening' => '1234567891',
                'plafon'         => 500000000,
                'status'         => 'Belum Lunas',
                'pic'            => 'Budi Santoso',
                'berkas'         => null,
                'departemen'     => 'Penyelesaian Kredit',
                'keterangan'     => 'Dokumen Tambahan PK',
                'lokasi_arsip'   => 'Ruang Arsip 1',
                'no_rak'         => '01 | 03',
                'baris_rak'      => 'Baris 2',
                'created_at'     => now()->subDays(1),
                'updated_at'     => now(),
            ],
        ]);
    }
}

