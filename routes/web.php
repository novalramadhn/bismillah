<?php

use App\Http\Controllers\AdminController;
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

Route::group(['prefix' => 'admin'], function () {
    //dashboard
    Route::get('', [AdminController::class, 'index'])->name('admin.dashboard.index');

    //guru
    Route::resource('/gurus', \App\Http\Controllers\GuruController::class);

    //siswa
    Route::resource('/siswas', \App\Http\Controllers\SiswaController::class);

    //Jadwal


    // kelas
    Route::resource('/kelas', \App\Http\Controllers\KelasController::class);

    //mapel
    Route::resource('/mapels', \App\Http\Controllers\MapelController::class);
    Route::delete('/mapels/deleteAll', 'MapelController@deleteAll')->name('mapel.deleteAll');

    //user
    Route::resource('/users', \App\Http\Controllers\UserController::class);

    //nilai


    //pengumuman


});
