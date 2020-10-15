<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pesertas';
    protected $fillable = [
        'nama',
        'nomor',
        'rank_tka',
        'skor_tka',
        'rank_tps',
        'skor_tps',
        'jenis',
        'tryout_id',
        'user_id',
    ];
}
