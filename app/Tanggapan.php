<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';

    public function report(){
        return $this->belongsTo('App/Pengaduan','id_pengaduan');
    }
    public function petugas(){
        return $this->belongsTo('App/Petugas','id_petugas');
    }
}
