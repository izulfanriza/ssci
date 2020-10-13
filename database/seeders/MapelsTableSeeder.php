<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;
use Illuminate\Support\Facades\DB;

class MapelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapels')->delete();

        $mapels = [
            ['kode' => 'matematika', 'nama' => 'Matematika'],
            ['kode' => 'biologi', 'nama' => 'Biologi'],
            ['kode' => 'fisika', 'nama' => 'Fisika'],
            ['kode' => 'kimia', 'nama' => 'Kimia'],
            ['kode' => 'ekonomi', 'nama' => 'Ekonomi'],
            ['kode' => 'geografi', 'nama' => 'Geografi'],
            ['kode' => 'sosiologi', 'nama' => 'Sosiologi'],
            ['kode' => 'k_penalaran_umum', 'nama' => 'Penalaran Umum'],
            ['kode' => 'm_bacaan_dan_menulis', 'nama' => 'Bacaan dan Menulis'],
            ['kode' => 'peng_dan_pemahaman_umum', 'nama' => 'Pengetahuan dan Pemahaman Umum'],
            ['kode' => 'k_kuantitatif', 'nama' => 'Kuantitatif'],
        ];

        Mapel::insert($mapels);
    }
}