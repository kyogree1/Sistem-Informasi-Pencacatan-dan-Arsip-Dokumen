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
        Schema::table('users', function (Blueprint $table) {
            $table->string('personal_number')
                ->unique()
                ->nullable()
                ->after('id');
            $table->string('role')
                ->default('pegawai')
                ->after('password');
            $table->string('unit')
                ->nullable()
                ->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['personal_number', 'role', 'unit']);
        });
    }
};
