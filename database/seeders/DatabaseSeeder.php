<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClusteresTableSeeder::class);
        $this->call(JurusansTableSeeder::class);
        $this->call(MapelsTableSeeder::class);
        $this->call(ProgramStudiesTableSeeder::class);
        $this->call(UniversitasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
