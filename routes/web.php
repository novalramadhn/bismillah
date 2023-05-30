<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Models\Mapel;
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
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autenthicating'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::group(['prefix' => 'admin'], function () {
    //dashboard
    Route::get('', [AdminController::class, 'index'])->name('admin.dashboard.index')->middleware('auth');

    //guru
    Route::resource('/gurus', \App\Http\Controllers\GuruController::class)->middleware('auth');

    //siswa
    Route::resource('/siswas', \App\Http\Controllers\SiswaController::class)->middleware('auth');

    //Jadwal
    Route::resource('/jadwals', \App\Http\Controllers\JadwalController::class)->middleware('auth');

    // kelas
    Route::resource('/kelas', \App\Http\Controllers\KelasController::class)->middleware('auth');

    //mapel
    Route::resource('/mapels', \App\Http\Controllers\MapelController::class)->middleware('auth');
    Route::delete('/mapels',[MapelController::class, 'deleteAll'])->name('mapel.deleteAll');

    //user
    Route::resource('/users', \App\Http\Controllers\UserController::class)->middleware('auth');

    //nilai


    //pengumuman


});
