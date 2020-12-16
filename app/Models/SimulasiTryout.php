<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimulasiTryout extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'simulasi_tryouts';
    protected $fillable = [
        'pilihan',
        'hasil',
        'peserta_id',
        'jurusan_kode',
    ];
}
