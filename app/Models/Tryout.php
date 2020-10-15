<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tryout extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tryouts';
    protected $fillable = [
        'nama',
        'tanggal_tka',
        'tanggal_indo_tka',
        'pukul_tka',
        'tanggal_tps',
        'tanggal_indo_tps',
        'pukul_tps',
        'jenis',
    ];
}
