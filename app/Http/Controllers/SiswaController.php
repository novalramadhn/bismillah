<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.layouts.siswa.index', compact('siswas', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::select('id', 'nama_kelas')->get();
        return view('admin.layouts.siswa.create', compact('kelas'));
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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nis' => 'required|min:5',
            'nama_siswa' => 'required|min:5',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|min:5',
            'kelas_id' => 'required',
        ]);

        $image = $request->file('img');
        $image->storeAs('public/siswas', $image->getClientOriginalName());

        Siswa::create([
            'img' => $image->getClientOriginalName(),
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
        ]);

        if (!$request) {
            return redirect()->route('siswas.createe')->with(['error' => 'Data gagal disimpan!']);
        } else {
            return redirect()->route('siswas.index')->with(['success' => 'Data berhasil disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::findorfail($id);

        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.layouts.siswa.detail', compact('siswa', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findorfail($id);

        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.layouts.siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_siswa' => 'required|min:5',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|min:5',
            'kelas_id' => 'required',
        ]);

        if ($request->hasFile('img')) {


            $image = $request->file('img');
            $image->storeAs('public/siswas', $image->getClientOriginalName());


            Storage::delete('public/siswas' . $siswa->image);


            $siswa->update([
                'img' => $image->getClientOriginalName(),
                'nama_siswa' => $request->nama_siswa,
                'jk' => $request->jk,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'kelas_id' => $request->kelas_id,

            ]);
        } else {

            //update post without image
            $siswa->update([
                'nama_siswa' => $request->nama_siswa,
                'jk' => $request->jk,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'kelas_id' => $request->kelas_id,
            ]);
        }

        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}