<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('masyarakat')->insert([
            'nik' => '3271046504930002',
            'nama' => 'Michael Witmann',
            'email' => 'michael@gmail.com',
            'password' => bcrypt('tigerii'),
            'telp' => '+491635557102'
        ]);
        DB::table('masyarakat')->insert([
            'nik' => '3271046504930003',
            'nama' => 'Hina Adachi',
            'email' => 'hina@gmail.com',
            'password' => bcrypt('123456'),
            'telp' => '+491635557152'
        ]);
    }
}
