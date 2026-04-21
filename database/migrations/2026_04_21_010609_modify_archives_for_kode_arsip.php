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
            $table->string('no_pk')->nullable()->after('cif');
            $table->string('departemen')->nullable()->after('no_pk');
            $table->text('keterangan')->nullable()->after('berkas');
            
            // Drop old location fields
            $table->dropColumn(['lokasi_gedung', 'ruangan', 'lemari', 'rak', 'box', 'baris']);

            // Add new location fields
            $table->string('lokasi_arsip')->nullable()->after('keterangan');
            $table->string('no_rak')->nullable()->after('lokasi_arsip');
            $table->string('baris_rak')->nullable()->after('no_rak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            $table->dropColumn(['no_pk', 'departemen', 'keterangan', 'lokasi_arsip', 'no_rak', 'baris_rak']);
            $table->string('lokasi_gedung')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('lemari')->nullable();
            $table->string('rak')->nullable();
            $table->string('box')->nullable();
            $table->string('baris')->nullable();
        });
    }
};
