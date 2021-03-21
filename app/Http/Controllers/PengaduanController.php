<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selesai = DB::select("SELECT LaporanStatus('Selesai')")[0];
        $proses = DB::select("SELECT LaporanStatus('Proses')")[0];
        $pengaduan = Pengaduan::latest('tanggal_pengaduan')->paginate(10);
        return view('admin.pengaduan.list', ['pengaduan'=>$pengaduan, 'selesai'=>$selesai, 'proses'=>$proses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl' => 'required',
            'nik' => 'required',
            'kategori' => 'required',
            'isi' => 'required',
            'foto' => 'mimes:jpeg,png,jpg,gif,svg,jfif|max:5120',
        ]);

        $aduan = new Pengaduan;
        $aduan->tanggal_pengaduan = $request->tgl;
        $aduan->nik = $request->nik;
        $aduan->kategori = $request->kategori;
        $aduan->isi_laporan = $request->isi;

        if(!empty($request->hasFile('foto'))){
            $request->file('foto')->move(public_path('uploads/'), $request->file('foto')->getClientOriginalName());
            $aduan->foto = $request->file('foto')->getClientOriginalName();
        }
        $aduan->save();

        return redirect('/lapor')->with('status', $request->kategori.' telah terkirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.detail', ['pengaduan'=>$pengaduan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('call HapusAduan(?)',array($id));
        return redirect('/pengaduan')->with('status','data berhasil di hapus');
    }
}
