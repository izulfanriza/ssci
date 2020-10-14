<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'jurusans';
    protected $fillable = [
        'kode',
        'nama',
        'kuota',
        'nilai_perhitungan',
        'prioritas',
        'tahun',
        'deskripsi',
        'universitas_kode',
        'cluster_kode',
        'program_studi_kode',
    ];
}
