<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programstudi;
use Illuminate\Support\Facades\DB;

class ProgramStudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('program_studis')->delete();

        $program_studis = [
            ['kode' => 'saintek', 'nama' => 'Sains dan Teknologi (SAINTEK)'],
            ['kode' => 'soshum', 'nama' => 'Sosial dan Humaniora (SOSHUM)'],
        ];

        Programstudi::insert($program_studis);
    }
}