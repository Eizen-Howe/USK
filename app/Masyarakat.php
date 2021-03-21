<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masyarakat extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'nik';
    protected $table = 'masyarakat';
    protected $fillable = ['nik','nama','email','password','telp'];
    public function user(){
        return $this->hasOne('App\User');
    }
    public function aduan(){
        return $this->hasMany('App\Pengaduan');
    }
}
