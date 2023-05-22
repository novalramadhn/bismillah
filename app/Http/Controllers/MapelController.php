<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mapels = Mapel::orderBy('created_at', 'asc')->paginate(5);
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
        $this->validate($request, [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        Mapel::create($request->post());


        if (!$request) {
            return redirect()->route('mapels.create')->with(['error' => 'Data gagal disimpan!']);
        } else {
            return redirect()->route('mapels.index')->with(['success' => 'Data berhasil disimpan!']);
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
    public function edit(Mapel $mapel)
    {
        return view('admin.layouts.mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        $mapel->fill($request->post())->save();

        return redirect()->route('mapels.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapels.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }

    public function deleteAll(Mapel $mapel)
    {
        $mapel = Mapel::all();
        if ($mapel->count() >= 1) {
            Mapel::whereNotNull('id')->delete();
            return redirect()->back()->with('success', 'Data table mapel berhasil dihapus!');
        } else {
            return redirect()->back()->with('warning', 'Data table mapel kosong!');
        }
    }
}
