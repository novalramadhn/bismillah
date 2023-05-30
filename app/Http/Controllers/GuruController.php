<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $gurus = Guru::when($keyword, function ($query) use ($keyword) {
            $query->where('nama_guru', 'like', "%{$keyword}%")
            ->orWhere('nip', 'like', "%{$keyword}%");
        })->paginate(10);
        $mapels = Mapel::orderBy('nama_mapel')->get();
        return view('admin.layouts.guru.index', compact('gurus', 'mapels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mapels = Mapel::select('id', 'nama_mapel')->get();
        return view('admin.layouts.guru.create', compact('mapels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Guru $guru)
    {
        $this->validate($request, [
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nip' => 'required|min:5',
            'nama_guru' => 'required|min:5',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|min:5',
            'mapel_id' => 'required',
        ]);

        $imageName = $request->nama_guru . '.' . $request->img->extension();

        $request->img->storeAs('public/gurus', $imageName);

        // $image = $request->file('img');
        // $image->storeAs('public/gurus', $image->getClientOriginalName());

        Guru::create([
            'img' => $imageName,
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'mapel_id' => $request->mapel_id,
        ]);

        return redirect()->route('gurus.index')->with('success', 'Data berhasil ditambah!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $guru = Guru::findorfail($id);

        $mapels = Mapel::orderBy('nama_mapel')->get();
        return view('admin.layouts.guru.detail', compact('guru', 'mapels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::findorfail($id);

        $mapels = Mapel::orderBy('nama_mapel')->get();
        return view('admin.layouts.guru.edit', compact('guru', 'mapels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $this->validate($request, [
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_guru' => 'required|min:5',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|min:5',
            'mapel_id' => 'required',
        ]);

        if ($request->hasFile('img')) {


            $imageName = $request->nama_guru . '.' . $request->img->extension();
            $request->img->storeAs('public/gurus', $imageName);

            Storage::delete('public/gurus' . $guru->img);

            $guru->update([
                'img' => $imageName,
                'nama_guru' => $request->nama_guru,
                'jk' => $request->jk,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'mapel_id' => $request->mapel_id,

            ]);
        } else {

            //update post without image
            $guru->update([
                'nama_guru' => $request->nama_guru,
                'jk' => $request->jk,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'mapel_id' => $request->mapel_id,
            ]);
        }

        return redirect()->route('gurus.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('gurus.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
