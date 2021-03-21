<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Petugas;
use App\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a Dashboard for Officer
     */
    public function home()
    {
        $belum = Pengaduan::where('status', '=', 'Belum di tanggapi')->count();
        $proses = Pengaduan::where('status', '=', 'Proses')->count();
        $selesai = Pengaduan::where('status', '=', 'Selesai')->count();
        return view('dashboard',['belum'=>$belum, 'proses'=>$proses, 'selesai'=>$selesai]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.petugas.list', ['petugas'=>$petugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petugas.tambah');
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
            'nama' => 'required',
            'password' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'level' => 'required',
            'foto' => 'mimes:jpg,png,jpeg,gif,jfif|max:5120',
        ]);

        $petugas = new Petugas;
        $petugas->nama_petugas = $request->nama;
        $petugas->email = $request->email;
        $petugas->password = bcrypt( $request->password);
        $petugas->telp = $request->telp;
        $petugas->level = $request->level;
        if (!empty($request->hasFile('foto'))) {
            $request->file('foto')->move(public_path('uploads/'),$request->file('foto')->getClientOriginalName());
            $petugas->foto = $request->file('foto')->getClientOriginalName();
        }
        $petugas->save();

        $user = new User;
        $user->id_petugas = $petugas->id;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->level;
        $user->save();

        return redirect('/petugas')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petugas = Petugas::findORFail($id);
        // dd($petugas);
        return view('admin.Petugas.detail', ['petugas'=>$petugas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = Petugas::findORFail($id);
        return view('admin.Petugas.edit', ['petugas'=>$petugas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'level' => 'required',
        ]);
            
        $petugas = Petugas::findOrFail($id);
        $petugas->nama_petugas = $request->nama;
        $petugas->email = $request->email;
        $petugas->password = bcrypt( $request->password);
        $petugas->telp = $request->telp;
        $petugas->level = $request->level;
        $petugas->update();
        
        $user = User::where('id_petugas', '=', $petugas->id)->firstOrFail();
        if ($request->email == $user->email) {
            $user->name = $request->nama;
            $user->password = bcrypt($request->password);
            $user->role = $request->level;
        } else {
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = $request->level;
        }
        $user->update();

        return redirect('/petugas')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id_petugas', '=', $id);
        $user->delete();
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect('/petugas')->with('status','Data berhasil di hapus');
    }
}
