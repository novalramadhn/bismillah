<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::orderBy('kode_kelas', 'asc')->paginate(6);
        return view('admin.layouts.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'unique:kelas,kode_kelas',
            'nama_kelas' => 'required',
            'ruangan' => 'required'
        ]);

        Kelas::create([
            'kode_kelas' => $request->input('kode_mapel'),
            'nama_kelas' => $request->nama_kelas,
            'ruangan' => $request->ruangan,
        ]);

        if (!$request) {
            return redirect()->route('admin.kelas.create')->with(['error' => 'Data gagal disimpan!']);
        } else {
            return redirect()->route('admin.kelas.index')->with(['success' => 'Data berhasil disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kela = Kelas::findorfail($id);

        return view('admin.layouts.kelas.edit', compact('kela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kela = Kelas::findorfail($id);
        $request->validate([
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
            'ruangan' => 'required',
        ]);

        $kela->fill($request->post())->save();

        return redirect()->route('admin.kelas.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kela = Kelas::findorFail($id);
        $kela->delete();

        return redirect()->route('admin.kelas.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }
}
