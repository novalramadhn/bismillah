<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('logi');
// });

// -- Login --
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autenthicating'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');


// -- ADMIN --
Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {

    //dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard.index');

    //guru
    Route::group(['prefix' => '/guru'], function(){
        Route::get('/', [GuruController::class, 'index'])->name('admin.guru.index');
        Route::get('/show{id}', [GuruController::class, 'show'])->name('admin.guru.show');
        Route::get('/create', [GuruController::class, 'create'])->name('admin.guru.create');
        Route::post('/', [GuruController::class, 'store'])->name('admin.guru.store');
        Route::get('/edit{id}', [GuruController::class, 'edit'])->name('admin.guru.edit');
        Route::patch('/{id}', [GuruController::class, 'update'])->name('admin.guru.update');
        Route::delete('/delete{id}', [GuruController::class, 'delete'])->name('admin.guru.delete');
        Route::delete('/destroy{id}', [GuruController::class, 'destroy'])->name('admin.guru.destroy');
    });

    //siswa
    Route::group(['prefix' => '/siswa'], function(){
        Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa.index');
        Route::get('/show{id}', [SiswaController::class, 'show'])->name('admin.siswa.show');
        Route::get('/create', [SiswaController::class, 'create'])->name('admin.siswa.create');
        Route::post('/', [SiswaController::class, 'store'])->name('admin.siswa.store');
        Route::get('/edit{id}', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
        Route::patch('/{id}', [SiswaController::class, 'update'])->name('admin.siswa.update');
        Route::delete('/delete{id}', [SiswaController::class, 'delete'])->name('admin.siswa.delete');
        Route::delete('/destroy{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');

    });

    //Jadwal
    Route::group(['prefix' => '/jadwal'], function(){
        Route::get('/', [JadwalController::class, 'index'])->name('admin.jadwal.index');
        Route::get('/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
        Route::post('/', [JadwalController::class, 'store'])->name('admin.jadwal.store');
        Route::get('/edit{id}', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
        Route::patch('/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
        Route::delete('/delete{id}', [JadwalController::class, 'delete'])->name('admin.jadwal.delete');
        Route::delete('/destroy{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');

    });

    // kelas
    Route::group(['prefix' => '/kelas'], function(){
        Route::get('/', [KelasController::class, 'index'])->name('admin.kelas.index');
        Route::get('/create', [KelasController::class, 'create'])->name('admin.kelas.create');
        Route::post('/', [KelasController::class, 'store'])->name('admin.kelas.store');
        Route::get('/edit{id}', [KelasController::class, 'edit'])->name('admin.kelas.edit');
        Route::patch('/{id}', [KelasController::class, 'update'])->name('admin.kelas.update');
        Route::delete('/delete{id}', [KelasController::class, 'delete'])->name('admin.kelas.delete');
        Route::delete('/destroy{id}', [KelasController::class, 'destroy'])->name('admin.kelas.destroy');

    });

    //mapel
    Route::group(['prefix' => '/mapel'], function(){
        Route::get('/', [MapelController::class, 'index'])->name('admin.mapel.index');
        Route::get('/create', [MapelController::class, 'create'])->name('admin.mapel.create');
        Route::post('/', [MapelController::class, 'store'])->name('admin.mapel.store');
        Route::get('/edit{id}', [MapelController::class, 'edit'])->name('admin.mapel.edit');
        Route::patch('/{id}', [MapelController::class, 'update'])->name('admin.mapel.update');
        Route::delete('/delete{id}', [MapelController::class, 'delete'])->name('admin.mapel.delete');
        Route::delete('/destroy{id}', [MapelController::class, 'destroy'])->name('admin.mapel.destroy');

    });

    //user
    Route::group(['prefix' => '/user'], function(){
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        // Route::get('/edit{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        // Route::put('/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/delete{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::delete('/destroy{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    });

    //nilai
    Route::group(['prefix' => '/nilai'], function(){
        Route::get('/', [NilaiController::class, 'nilai'])->name('admin.nilai.index');
        Route::delete('/destroy{id}', [NilaiController::class, 'delete'])->name('admin.nilai.destroy');
    });

    //pengumuman


});

// -- GURU --
Route::group(['prefix' => '/guru', 'middleware' => 'auth'], function () {

    //dashboard
    Route::get('/', [AdminController::class, 'login'])->name('guru.dashboard.index');

    //guru
    Route::group(['prefix' => '/guru'], function(){
        Route::get('/', [GuruController::class, 'guru'])->name('guru.guru.index');
        Route::get('/show{id}', [GuruController::class, 'shows'])->name('guru.guru.show');
    });

    //siswa
    Route::group(['prefix' => '/siswa'], function(){
        Route::get('/', [SiswaController::class, 'siswa'])->name('guru.siswa.index');
        Route::get('/show{id}', [SiswaController::class, 'shows'])->name('guru.siswa.show');

    });

    //Jadwal
    Route::group(['prefix' => '/jadwal'], function(){
        Route::get('/', [JadwalController::class, 'jadwal'])->name('guru.jadwal.index');
    });

    //nilai
    Route::group(['prefix' => '/nilai'], function(){
        Route::get('/', [NilaiController::class, 'index'])->name('guru.nilai.index');
        Route::get('/create', [NilaiController::class, 'create'])->name('guru.nilai.create');
        Route::post('/', [NilaiController::class, 'store'])->name('guru.nilai.store');
        Route::get('/edit{id}', [NilaiController::class, 'edit'])->name('guru.nilai.edit');
        Route::patch('/{id}', [NilaiController::class, 'update'])->name('guru.nilai.update');
        Route::delete('/destroy{id}', [NilaiController::class, 'destroy'])->name('guru.nilai.destroy');
    });

    //pengumuman


});
