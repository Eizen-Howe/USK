<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $fillable = ['tanggal_pengaduan','nik','kategori','foto','status'];
    public function user(){
        return $this->belongsTo('App/User', 'nik');
    }
    public function reply(){
        return $this->hasOne('App/Tanggapan');
    }
}
