<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'cif',
        'no_pk',
        'nama',
        'nomor_rekening',
        'plafon',
        'status',
        'pic',
        'berkas',
        'departemen',
        'keterangan',
        'lokasi_arsip',
        'no_rak',
        'baris_rak',
    ];
}
