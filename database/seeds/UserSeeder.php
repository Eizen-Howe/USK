<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id_petugas' => '1',
            'name' => 'Erwin Rommel',
            'email' => 'desertfox@gmail.com',
            'password' => bcrypt('erwin'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'nik' => '3271046504930002',
            'name' => 'Michael Witmann',
            'email' => 'michael@gmail.com',
            'password' => bcrypt('tigerii'),
        ]);
        DB::table('users')->insert([
            'nik' => '3271046504930003',
            'name' => 'Hina Adachi',
            'email' => 'hina@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'id_petugas' => '2',
            'name' => 'Fritz Christen',
            'email' => 'fritz@gmail.com',
            'password' => bcrypt('laststand'),
            'role' => 'petugas',
        ]);
    }
}
