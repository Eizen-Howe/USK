<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $fillable = ['id_pengaduan', 'id_petugas','tgl_tanggapan','tanggapan'];

    public function report(){
        return $this->belongsTo('App/Pengaduan','id_pengaduan');
    }
    public function petugas(){
        return $this->belongsTo('App/Petugas','id_petugas');
    }
}
