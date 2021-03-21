<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Petugas extends Model
{
    use SoftDeletes;
    protected $table = 'petugas';
    protected $fillable = ['nama_petugas','email','password','telp', 'foto','level'];
    public function user(){
        return $this->hasOne('App/User');
    }
    public function replies(){
        return $this->hasMany('App/Tanggapan');
    }
}