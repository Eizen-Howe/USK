<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $fillable = ['aksi','tabel','data_lama1','data_lama2','data_baru1','data_baru2','user'];
}
