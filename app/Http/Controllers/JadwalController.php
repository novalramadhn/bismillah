<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $haris = Hari::orderBy('nama_hari')->get();
        $gurus = Guru::orderBy('nama_guru')->get();
        $kelas = Kelas::orderBy('kode_kelas','asc')->get();
        $ruangs = Kelas::orderBy('ruangan')->get();
        return view('admin.layouts.jadwal.index', compact('gurus', 'kelas', 'ruangs'));
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
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id = Jadwal::where('kode_kelas')->id;
        $jadwal = Jadwal::all();
        $hari = Hari::orderBy('nama_hari')->get();
        $gurus = Guru::orderBy('mapel_id')->get();
        $kelas = Kelas::findorFail($id);
        $ruangs = Kelas::orderBy('ruangan')->get();
        // dd($jadwal);
        return view('admin.layouts.jadwal.detail', compact('jadwal','hari', 'gurus', 'kelas', 'ruangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
