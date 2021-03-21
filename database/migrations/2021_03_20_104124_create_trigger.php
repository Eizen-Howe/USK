<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER DeleteUser AFTER DELETE ON `users` FOR EACH ROW
        BEGIN
            INSERT INTO logs (aksi, tabel, data_lama1, user, waktu)
            VALUES ("Delete", "masyarakat", old.nik, "admin", now());
        END
        ');
        DB::unprepared('
        CREATE TRIGGER DeletePetugas AFTER DELETE ON `users` FOR EACH ROW
        BEGIN
            INSERT INTO logs (aksi, tabel, data_lama1, user, waktu)
            VALUES ("Delete", "petugas", old.id_petugas, "admin", now());
        END
        ');
        DB::unprepared('
        CREATE TRIGGER DeletePengaduan AFTER DELETE ON `pengaduan` FOR EACH ROW
        BEGIN
            INSERT INTO logs (aksi, tabel, data_lama1, data_lama2, user, waktu)
            VALUES ("Delete", "pengaduan", old.nik, old.kategori, "admin", now());
        END
        ');
        DB::unprepared('
        CREATE TRIGGER InsertPetugas AFTER INSERT ON `petugas` FOR EACH ROW
        BEGIN
        INSERT INTO logs (aksi, tabel, data_baru1, user, waktu) VALUES ("INSERT", "petugas", new.nama_petugas,"admin", now());
        END
        ');
        DB::unprepared('
        CREATE TRIGGER UpdatePetugas AFTER UPDATE ON `petugas` FOR EACH ROW
        BEGIN
            INSERT INTO logs (aksi, tabel, data_lama1, data_lama2, data_baru1, data_baru2, user, waktu)
            VALUES ("Update", "petugas", old.nama_petugas, old.telp, new.nama_petugas, new.telp, "admin", now());
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DROP TRIGGER `DeleteUser`');
        Schema::dropIfExists('DROP TRIGGER `DeletePetugas`');
        Schema::dropIfExists('DROP TRIGGER `DeletePengaduan`');
        Schema::dropIfExists('DROP TRIGGER `InsertPetugas`');
        Schema::dropIfExists('DROP TRIGGER `UpdatePetugas`');
    }
}
