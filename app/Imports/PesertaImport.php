<?php

namespace App\Imports;

use App\Models\Peserta;
use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PesertaImport implements ToModel
{
    
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
    //     return new Peserta([
    //         'nama' => $collection['nama'],
    //         'nomor' => $collection['nomor'],
    //         'rank_tka' => $collection['rank_tka'],
    //         'skor_tka' => $collection['skor_tka'],
    //         'rank_tps' => $collection['rank_tps'],
    //         'skor_tps' => $collection['skor_tps']
    //     ]);
    // }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // gimana cara nerima variable tryout disini
    public function model(array $row)
    {
        return new Peserta([
            'nama' => $row[0],
            'nomor' => $row[1],
            'rank_tka' => $row[2],
            'skor_tka' => $row[3],
            'rank_tps' => $row[4],
            'skor_tps' => $row[5],
            // untuk memasukan id tryout ke kolom tryout_id

        ]);
    }
}
