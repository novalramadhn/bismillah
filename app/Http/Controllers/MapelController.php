<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mapels = Mapel::orderBy('nama_mapel', 'asc')->paginate(5);
        return view('admin.layouts.mapel.index', compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Mapel $mapel)
    {
        $request->validate([
        'kode_mapel' => 'unique:mapels,kode_mapel',
        'nama_mapel' => 'required',
    ], [
        'kode_mapel.unique' => 'Kode mapel sudah ada dalam sistem.'
    ]);

        Mapel::create([
            'kode_mapel' => $request->input('kode_mapel'),
            'nama_mapel' => $request->nama_mapel,
        ]);

        if (!$request) {
            return redirect()->route('admin.mapel.create')->with(['error' => 'Data gagal disimpan!']);
        } else {
            return redirect()->route('admin.mapel.index')->with(['success' => 'Data berhasil disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::findorFail($id);
        return view('admin.layouts.mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mapel = Mapel::findorFail($id);
        $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        $mapel->fill($request->post())->save();

        return redirect()->route('admin.mapel.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::findorFail($id);
        $mapel->delete();

        return redirect()->route('admin.mapel.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }


}
