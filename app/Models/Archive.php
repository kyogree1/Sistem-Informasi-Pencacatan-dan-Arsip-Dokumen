<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_debitur',
        'no_pk',
        'nilai_kredit',
        'jumlah_bantex',
        'dokumen_divisi',
        'lokasi_dokumen',
        'departemen',
        'pic',
        'keterangan',
    ];
}
