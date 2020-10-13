<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            ['name' => 'Pandhu Prisnawan', 'email' => 'pandhup@mail.com', 'no_hp' => '085156060248', 'alamat' => 'Bantul', 'email_verified_at' => now(), 'password' => bcrypt('12345678'), 'role' => 'admin'],
            ['name' => 'Izul Fanriza', 'email' => 'izulfanz@mail.com', 'no_hp' => '08562703831', 'alamat' => 'Salatiga', 'email_verified_at' => now(), 'password' => bcrypt('12345678'), 'role' => 'siswapremium'],
            ['name' => 'Alviska Galuh', 'email' => 'alviskagan@mail.com', 'no_hp' => '082138262533', 'alamat' => 'Maguwo', 'email_verified_at' => now(), 'password' => bcrypt('12345678'), 'role' => 'siswabiasa'],
        ];

        User::insert($users);
    }
}
