<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulasi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'simulasi_manuals';
    protected $fillable = [
        'pilihan',
        'program_studi',
        'matematika',
        'fisika',
        'kimia',
        'biologi',
        'geografi',
        'ekonomi',
        'sosiologi',
        'sejarah',
        'k_penalaran_umum',
        'm_bacaan_menulis',
        'peng_pengetahuan_umum',
        'k_kuantitatif',
        'hasil',
        'user_id',
        'jurusan_kode',
    ];
}
