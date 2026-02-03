<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();

            $table->string('nama_debitur');
            $table->string('no_pk')->unique();

            $table->decimal('nilai_kredit', 15, 2)->nullable();
            $table->integer('jumlah_bantex')->default(1);

            $table->string('dokumen_divisi');
            $table->string('lokasi_dokumen');
            $table->string('departemen');
            $table->string('pic');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};

