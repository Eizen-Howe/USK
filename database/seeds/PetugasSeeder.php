<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            'nama_petugas' => 'Erwin Rommel',
            'email' => 'desertfox@gmail.com',
            'password' => bcrypt('erwin'),
            'telp' => '+491635557102',
            'level' => 'admin',
        ]);
        DB::table('petugas')->insert([
            'nama_petugas' => 'Fritz Christen',
            'email' => 'fritz@gmail.com',
            'password' => bcrypt('laststand'),
            'telp' => '+491555555339',
            'level' => 'petugas',
        ]);
    }
}
