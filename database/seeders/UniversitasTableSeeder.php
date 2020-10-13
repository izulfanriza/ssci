<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Universitas;
use Illuminate\Support\Facades\DB;

class UniversitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universitas')->delete();

        $universitas = [
            ['kode' => 'ugm', 'nama' => 'Universitas Gadjah Mada', 'akronim' => 'UGM'],
            ['kode' => 'upn-yk', 'nama' => 'Universitas Pembangunan Nasional Veteran Yogyakarta', 'akronim' => 'UPN YK'],
            ['kode' => 'uny', 'nama' => 'Universitas Negeri Yogyakarta', 'akronim' => 'UNY'],
            ['kode' => 'uin', 'nama' => 'Universitas Islam Negeri Sunan Kalijaga', 'akronim' => 'UIN'],
            ['kode' => 'uns', 'nama' => 'Universitas Sebelas Maret', 'akronim' => 'UNS'],
            ['kode' => 'undip', 'nama' => 'Universitas Diponegoro', 'akronim' => 'UNDIP'],
            ['kode' => 'unsoed', 'nama' => 'Universitas Jenderal Soedirman', 'akronim' => 'UNSOED'],
            ['kode' => 'unpad', 'nama' => 'Universitas Padjadjaran', 'akronim' => 'UNPAD'],
            ['kode' => 'itb', 'nama' => 'Institut Teknologi Bandung', 'akronim' => 'ITB'],
            ['kode' => 'ui', 'nama' => 'Universitas Indonesia', 'akronim' => 'UI'],
            ['kode' => 'unbraw', 'nama' => 'Universitas Brawijaya', 'akronim' => 'UNBRAW'],
            ['kode' => 'ipb', 'nama' => 'Institut Pertanian Bogor', 'akronim' => 'IPB'],
            ['kode' => 'its', 'nama' => 'Institut Teknologi Sepuluh Nopember', 'akronim' => 'ITS'],
        ];

        Universitas::insert($universitas);
    }
}