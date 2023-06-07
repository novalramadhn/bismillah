<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahKelas = Kelas::count();
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();
        $jumlahMapel = Mapel::count();
        $jumlahJadwal = Jadwal::count();
        $jumlahUser = User::count();

        $jumlahGuruL = Guru::where('jk', 'L')->count();
        $jumlahGuruP = Guru::where('jk', 'P')->count();
        $jumlahSiswaL = Siswa::where('jk', 'L')->count();
        $jumlahSiswaP = Siswa::where('jk', 'P')->count();

        // $chartGuru = Charts::create('bar', 'highcharts')
        // ->title('Jumlah Guru berdasarkan Jenis Kelamin')
        // ->labels(['Laki-laki', 'Perempuan'])
        // ->values([$jumlahGuruLaki, $jumlahGuruPerempuan])
        // ->colors(['#3c8dbc', '#f39c12'])
        // ->render();

        // $chartSiswa = Charts::create('bar', 'highcharts')
        // ->title('Jumlah Siswa berdasarkan Jenis Kelamin')
        // ->labels(['Laki-laki', 'Perempuan'])
        // ->values([$jumlahSiswaLaki, $jumlahSiswaPerempuan])
        // ->colors(['#3c8dbc', '#f39c12'])
        // ->render();

        return view('admin.layouts.dashboard.index', compact('jumlahKelas','jumlahGuru','jumlahSiswa','jumlahMapel','jumlahJadwal','jumlahUser',
        'jumlahGuruL','jumlahGuruP','jumlahSiswaL','jumlahSiswaP'));
    }

    public function login()
    {
        $jumlahKelas = Kelas::count();
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();
        $jumlahMapel = Mapel::count();
        $jumlahJadwal = Jadwal::count();
        $jumlahUser = User::count();

        $jumlahGuruL = Guru::where('jk', 'L')->count();
        $jumlahGuruP = Guru::where('jk', 'P')->count();
        $jumlahSiswaL = Siswa::where('jk', 'L')->count();
        $jumlahSiswaP = Siswa::where('jk', 'P')->count();

         return view('guru.layouts.dashboard.index', compact('jumlahKelas','jumlahGuru','jumlahSiswa','jumlahMapel','jumlahJadwal','jumlahUser',
        'jumlahGuruL','jumlahGuruP','jumlahSiswaL','jumlahSiswaP'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
