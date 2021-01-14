<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranManual extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'saran_manuals';
    protected $fillable = [
        'prioritas',
        'deskripsi',
        'simulasi_manual_id',
        'jurusan_kode',
    ];
}
