<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE FUNCTION LaporanStatus (stats varchar(10) CHARSET utf8) RETURNS int
            no sql deterministic
            BEGIN
                DECLARE amount int;
                SELECT COUNT(*) AS statusLap INTO amount FROM pengaduan WHERE status = stats;
                RETURN amount;
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
        DB::unprepared('DROP FUNCTION LaporanStatus');
    }
}
