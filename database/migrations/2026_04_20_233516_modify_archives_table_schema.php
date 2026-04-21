<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            // Drop old columns if they exist
            $table->dropColumn([
                'nama_debitur', 'no_pk', 'nilai_kredit', 'jumlah_bantex',
                'dokumen_divisi', 'lokasi_dokumen', 'departemen', 'pic', 'keterangan'
            ]);

            // Add new columns
            $table->string('cif')->nullable();
            $table->string('nama')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->decimal('plafon', 15, 2)->nullable();
            $table->enum('status', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
            $table->string('berkas')->nullable(); // File path
            
            // Kode Arsip fields
            $table->string('lokasi_gedung')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('lemari')->nullable();
            $table->string('rak')->nullable();
            $table->string('box')->nullable();
            $table->string('baris')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            $table->dropColumn([
                'cif', 'nama', 'nomor_rekening', 'plafon', 'status', 'berkas',
                'lokasi_gedung', 'ruangan', 'lemari', 'rak', 'box', 'baris'
            ]);

            $table->string('nama_debitur');
            $table->string('no_pk')->unique();
            $table->decimal('nilai_kredit', 15, 2)->nullable();
            $table->integer('jumlah_bantex')->default(1);
            $table->string('dokumen_divisi');
            $table->string('lokasi_dokumen');
            $table->string('departemen');
            $table->string('pic');
            $table->text('keterangan')->nullable();
        });
    }
};
