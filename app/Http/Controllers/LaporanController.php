<?php

namespace App\Http\Controllers;

use App\ViewPengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            if(!empty($request->from_date)){
                if($request->from_date === $request->to_date){
                    $laporan = ViewPengaduan::whereDate('tanggal_pengaduan', '=', $request->from_date)->select('v_pengaduan.*');
                } else {
                    $laporan = ViewPengaduan::whereBetween('tanggal_pengaduan', array($request->from_date,$request->to_date))->select('v_pengaduan.*');
                }
            } else {
                $laporan = ViewPengaduan::select('v_pengaduan.*');
            }
            return DataTables::of($laporan)
                                ->addIndexColumn()
                                ->make(true);
            }
            return view('admin.laporan.laporan');
    }
}
