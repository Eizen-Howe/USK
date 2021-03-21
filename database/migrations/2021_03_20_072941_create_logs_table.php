<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('aksi');
            $table->string('tabel');
            $table->string('data_lama1')->nullable();
            $table->string('data_lama2')->nullable();
            $table->string('data_baru1')->nullable();
            $table->string('data_baru2')->nullable();
            $table->string('user');
            $table->dateTime('waktu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
