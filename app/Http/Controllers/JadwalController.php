<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kelas = Kelas::pluck('nama_kelas', 'id');
        $haris = Hari::pluck('nama_hari', 'id');

        // Filter berdasarkan kelas yang dipilih
        $kelasId = $request->input('kelas');
        $hariId = $request->input('haris');

        $query = Jadwal::query();
        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }
        if ($hariId) {
            $query->where('hari_id', $hariId);
        }
        $jadwal = $query->orderBy('kelas_id', 'asc')->paginate(5);

        $gurus = Guru::orderBy('nama_guru')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        $waktus = Waktu::orderBy('jam')->get();
        $ruangs = Kelas::orderBy('ruangan')->get();
        return view('admin.layouts.jadwal.index', compact('jadwal', 'gurus', 'kelas', 'ruangs', 'haris', 'mapels', 'waktus'));
    }

    public function jadwal(Request $request)
    {
        $kelas = Kelas::pluck('nama_kelas', 'id');
        $haris = Hari::pluck('nama_hari', 'id');


        // Filter berdasarkan kelas yang dipilih
        $kelasId = $request->input('kelas');
        $hariId = $request->input('haris');

        $query = Jadwal::query();
        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }
        if ($hariId) {
            $query->where('hari_id', $hariId);
        }
        $jadwal = $query->orderBy('kelas_id', 'asc')->paginate(5);

        $gurus = Guru::orderBy('nama_guru')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        $ruangs = Kelas::orderBy('ruangan')->get();
        return view('guru.layouts.jadwal.index', compact('jadwal', 'gurus', 'kelas', 'ruangs', 'haris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal = Jadwal::all();
        $haris = Hari::orderBy('nama_hari', 'desc')->get();
        $gurus = Guru::orderBy('nama_guru')->get();
        $waktus = Waktu::orderBy('jam')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        $kelas = Kelas::orderBy('kode_kelas')->get();
        $ruangs = Kelas::orderBy('ruangan')->get();
        return view('admin.layouts.jadwal.create', compact('jadwal', 'gurus', 'kelas', 'ruangs', 'haris', 'mapels', 'waktus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        $request->validate(
            [
                'hari_id' => 'required',
                'kelas_id' => 'required',
                'mapel_id' => 'required',
                'guru_id' => 'required',
                'waktu_id' => 'required',
                'ruang_id' => 'required',
            ]
        );

        // Cek apakah ada jadwal pelajaran yang bertabrakan
        // $hari = $request->input('hari_id');
        // $kelas = $request->input('kelas_id');
        // $mapel = $request->input('mapel_id');
        // $guru = $request->input('guru_id');
        // $waktu = $request->input('waktu_id');
        // $ruang = $request->input('ruang_id');

        // if ($hari == Jadwal::select('hari_id'))
        // {

        // }
        $existingJadwal = Jadwal::where('hari_id', $request->input('hari_id'))
            ->where('kelas_id', $request->input('kelas_id'))
            ->where('waktu_id', $request->input('waktu_id'))

            ->first();

        if ($existingJadwal) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Jadwal pelajaran bertabrakan dengan jadwal yang ada.']);
        }

        $existingJadwalGuru = Jadwal::where('hari_id', $request->input('hari_id'))
            ->where('waktu_id', $request->input('waktu_id'))
            ->where('guru_id', $request->input('guru_id'))

            ->first();

        if ($existingJadwalGuru) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Guru Yang anda inputkan sudah mengajar.']);
        }

        Jadwal::create([
            'hari_id' => $request->input('hari_id'),
            'kelas_id' => $request->input('kelas_id'),
            'mapel_id' => $request->input('mapel_id'),
            'guru_id' => $request->input('guru_id'),
            'waktu_id' => $request->input('waktu_id'),
            'ruang_id' => $request->ruang_id,
        ]);

        if (!$request) {
            return redirect()->route('admin.jadwal.create')->with(['error' => 'Data gagal disimpan!']);
        } else {
            return redirect()->route('admin.jadwal.index')->with(['success' => 'Data berhasil disimpan!']);
        }
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
        return view('admin.layouts.jadwal.detail', compact('jadwal', 'hari', 'gurus', 'kelas', 'ruangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::findorFail($id);
        $haris = Hari::orderBy('nama_hari')->get();
        $gurus = Guru::orderBy('nama_guru')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $waktus = Waktu::orderBy('jam')->get();
        $ruangs = Kelas::orderBy('ruangan')->get();
        return view('admin.layouts.jadwal.edit', compact('jadwal', 'haris', 'gurus', 'kelas', 'ruangs', 'mapels', 'waktus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findorFail($id);
        $request->validate([
            'hari_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'guru_id' => 'required',
            'waktu_id' => 'required',
            'ruang_id' => 'required',
        ]);

        $jadwal->fill($request->post())->save();

        if (!$request) {
            return redirect()->route('admin.jadwal.edit')->with(['error' => 'Data gagal disimpan!']);
        } else {
            return redirect()->route('admin.jadwal.index')->with(['success' => 'Data berhasil disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findorFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
