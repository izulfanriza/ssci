<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTryout extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'nilai_tryouts';
    protected $fillable = [
        'benar',
        'salah',
        'kosong',
        'skor',
        'mapel_kode',
        'peserta_id',
    ];
}
