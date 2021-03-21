<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengaduan');
            $table->char('nik', 16);
            $table->foreign('nik')->references('nik')->on('masyarakat');
            $table->enum('kategori', ['Aduan', 'Aspirasi']);
            $table->text('isi_laporan');
            $table->string('foto')->nullable();
            $table->enum('status', ['Belum di tanggapi','Proses','Ditolak','Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}
