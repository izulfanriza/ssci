<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cluster;
use Illuminate\Support\Facades\DB;

class ClusteresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clusters')->delete();

        $clusters = [
            ['kode' => 'MIPA-A', 'nama' => 'MIPA', 'klasifikasi' => 'A'],
            ['kode' => 'MIPA-B', 'nama' => 'MIPA', 'klasifikasi' => 'B'],
            ['kode' => 'MIPA-C', 'nama' => 'MIPA', 'klasifikasi' => 'C'],
            ['kode' => 'TEK-A', 'nama' => 'TEK', 'klasifikasi' => 'A'],
            ['kode' => 'TEK-B', 'nama' => 'TEK', 'klasifikasi' => 'B'],
            ['kode' => 'TEK-C', 'nama' => 'TEK', 'klasifikasi' => 'C'],
            ['kode' => 'KES-A', 'nama' => 'KES', 'klasifikasi' => 'A'],
            ['kode' => 'KES-B', 'nama' => 'KES', 'klasifikasi' => 'B'],
            ['kode' => 'KES-C', 'nama' => 'KES', 'klasifikasi' => 'C'],
            ['kode' => 'SOS-A', 'nama' => 'SOS', 'klasifikasi' => 'A'],
            ['kode' => 'SOS-B', 'nama' => 'SOS', 'klasifikasi' => 'B'],
            ['kode' => 'SOS-C', 'nama' => 'SOS', 'klasifikasi' => 'C'],
            ['kode' => 'EKO-A', 'nama' => 'EKO', 'klasifikasi' => 'A'],
            ['kode' => 'EKO-B', 'nama' => 'EKO', 'klasifikasi' => 'B'],
            ['kode' => 'EKO-C', 'nama' => 'EKO', 'klasifikasi' => 'C'],
            ['kode' => 'BUD-A', 'nama' => 'BUD', 'klasifikasi' => 'A'],
            ['kode' => 'BUD-B', 'nama' => 'BUD', 'klasifikasi' => 'B'],
            ['kode' => 'BUD-C', 'nama' => 'BUD', 'klasifikasi' => 'C'],
            ['kode' => 'kosong', 'nama' => 'Kosong', 'klasifikasi' => 'kosong'],
        ];

        Cluster::insert($clusters);
    }
}