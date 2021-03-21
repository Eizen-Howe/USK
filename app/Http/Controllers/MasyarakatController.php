<?php

namespace App\Http\Controllers;

use App\Log;
use App\Masyarakat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('admin.masyarakat.list', ['masyarakat'=>$masyarakat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        $masyarakat = Masyarakat::findOrFail($nik);
        return view('admin.masyarakat.detail', ['masyarakat'=>$masyarakat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $masyarakat = Masyarakat::findOrFail($nik);
        $masyarakat->delete();
        $user = User::where('nik','=',$nik);
        $user->delete();
        return redirect('/masyarakat')->with('status','Data berhasil dihapus!');
    }
}
