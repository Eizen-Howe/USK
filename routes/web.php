<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

// Admin Route
// Dashboard
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::middleware('auth','role:admin')->group(function(){
    
    // Petugas
    Route::get('/petugas', 'PetugasController@index');
    Route::get('/detailpetugas/{id}', 'PetugasController@show');
    Route::get('/editpetugas/{id}', 'PetugasController@edit');
    Route::put('/editpetugas/{id}', 'PetugasController@update');
    Route::get('/tambahpetugas', 'PetugasController@create');
    Route::post('/tambahpetugas', 'PetugasController@store');
    Route::delete('/deletepetugas/{id}', 'PetugasController@destroy');
    
    // Masyarakat
    Route::get('/masyarakat', 'MasyarakatController@index');
    Route::get('/detailmasyarakat/{nik}', 'MasyarakatController@show');
    Route::delete('/deletemasyarakat/{nik}', 'MasyarakatController@destroy');
    
    // Laporan
    Route::get('/laporan', 'LaporanController@index')->name('laporan');
    
    // Pengaduan
    Route::get('/pengaduan', 'PengaduanController@index')->middleware('auth','role:admin');
    Route::get('/detailpengaduan/{id}', 'PengaduanController@show');
    Route::delete('/deletepengaduan/{id}', 'PengaduanController@destroy');
});
// End Admin Route

// Petugas Route
Route::middleware('auth','role:petugas')->group(function(){
    Route::get('/pengaduanpetugas', function () {
        return view('/petugas/list');
    });
    Route::get('/editpengaduan', function () {
        return view('/petugas/edit');
    });
});
// End Petugas Route

// Rakyat Route
Route::middleware('auth','role:user')->group(function(){
    Route::get('/lapor', 'PengaduanController@create')->middleware('auth','role:user');
    Route::post('/lapor', 'PengaduanController@store')->middleware('auth','role:user');
    Route::post('/lapor', 'PengaduanController@store')->middleware('auth','role:user');
    Route::get('/listaduan', function () {
        return view('/masyarakat/list');
    });
    Route::get('/edituser', function () {
        return view('/masyarakat/edit');
    });
});
// End Rakyat Route