<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Semester;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kelas = Kelas::pluck('nama_kelas', 'id');
        $semesters = Semester::pluck('semester', 'id');


        // Filter berdasarkan kelas yang dipilih
        $kelasId = $request->input('kelas');
        $semesterId = $request->input('semesters');

        $query = Nilai::query();
        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }
        if ($semesterId) {
            $query->where('semester_id', $semesterId);
        }
        $nilai = $query->orderBy('siswa_id', 'asc')->paginate(10);

        $siswas = Siswa::orderBy('nama_siswa')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        return view('guru.layouts.nilai.index', compact('nilai','siswas', 'kelas', 'mapels','semesters'));
    }

    public function nilai(Request $request)
    {
        $kelas = Kelas::pluck('nama_kelas', 'id');
        $semesters = Semester::pluck('semester', 'id');


        // Filter berdasarkan kelas yang dipilih
        $kelasId = $request->input('kelas');
        $semesterId = $request->input('semesters');

        $query = Nilai::query();
        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }
        if ($semesterId) {
            $query->where('semester_id', $semesterId);
        }
        $nilai = $query->orderBy('siswa_id', 'asc')->paginate(10);

        $siswas = Siswa::orderBy('nama_siswa')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        return view('admin.layouts.nilai.index', compact('nilai','siswas', 'kelas', 'mapels','semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nilai = Nilai::all();
        $siswas = Siswa::orderBy('nama_siswa')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        $kelas = Kelas::orderBy('kode_kelas')->get();
        $semesters = Semester::orderBy('semester')->get();
        return view('guru.layouts.nilai.create', compact('nilai','siswas','mapels','kelas','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'semester_id' => 'required',
            'tugas' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
        ]);

        $nilai = new Nilai();
        $nilai->siswa_id = $request->siswa_id;
        $nilai->kelas_id = $request->kelas_id;
        $nilai->mapel_id = $request->mapel_id;
        $nilai->semester_id = $request->semester_id;
        $nilai->tugas = $request->tugas;
        $nilai->uts = $request->uts;
        $nilai->uas = $request->uas;
        $nilai->grade = $this->calculateGrade($request->tugas, $request->uts, $request->uas);
        $nilai->save();

        return redirect()->route('guru.nilai.index')->with('success', 'Penilaian siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $nilai = Nilai::findorFail($id);
        $siswas = Siswa::orderBy('nama_siswa')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        $kelas = Kelas::orderBy('kode_kelas')->get();
        $semesters = Semester::orderBy('semester')->get();
        return view('guru.layouts.nilai.edit', compact('nilai','siswas','mapels','kelas','semesters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'semester_id' => 'required',
            'tugas' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
        ]);

        $nilai = Nilai::findorFail($id);
        $nilai->siswa_id = $request->siswa_id;
        $nilai->kelas_id = $request->kelas_id;
        $nilai->mapel_id = $request->mapel_id;
        $nilai->semester_id = $request->semester_id;
        $nilai->tugas = $request->tugas;
        $nilai->uts = $request->uts;
        $nilai->uas = $request->uas;
        $nilai->grade = $this->calculateGrade($request->tugas, $request->uts, $request->uas);
        $nilai->save();

        return redirect()->route('guru.nilai.index')->with('success', 'Penilaian siswa berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::findorFail($id);
        $nilai->delete();

        return redirect()->route('guru.nilai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function delete($id)
    {
        $nilai = Nilai::findorFail($id);
        $nilai->delete();

        return redirect()->route('admin.nilai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function calculateGrade($tugas, $uts, $uas)
    {
        // Implementasikan logika perhitungan grade berdasarkan nilai tugas, UAS, dan UTS
        // Contoh sederhana:
        $totalNilai = ($tugas + $uts + $uas) / 3;

        if ($totalNilai >= 80) {
            return 'A';
        } elseif ($totalNilai >= 70) {
            return 'B';
        } elseif ($totalNilai >= 60) {
            return 'C';
        } elseif ($totalNilai >= 50) {
            return 'D';
        } else {
            return 'E';
        }
    }
}
