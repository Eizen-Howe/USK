<?php

namespace App\Http\Controllers;

use App\Log;
use App\Pengaduan;
use App\Petugas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            $petugas = Petugas::all()->count();
            $pengaduan = Pengaduan::all()->count();
            $user = User::where('role','=','user')->count();
            $log = Log::all();
            return view('dashboard',['petugas'=>$petugas, 'pengaduan'=>$pengaduan, 'user' => $user, 'log' => $log]);
        } else if(Gate::allows('petugas')){
            $belum = Pengaduan::where('status', '=', 'Belum di tanggapi')->count();
            $proses = Pengaduan::where('status', '=', 'Proses')->count();
            $selesai = Pengaduan::where('status', '=', 'Selesai')->count();
            return view('dashboard',['belum'=>$belum, 'proses'=>$proses, 'selesai'=>$selesai]);
        } else if(Gate::allows('user')){
            return redirect('/lapor');
        } else{
            return 'gagal';
        }
    }
}