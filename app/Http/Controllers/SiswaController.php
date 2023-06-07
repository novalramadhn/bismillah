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
    public function index(Request $request)
    {

        $keyword = $request->get('keyword');
        $siswas = Siswa::when($keyword, function ($query) use ($keyword) {
            $query->where('nama_siswa', 'like', "%{$keyword}%")
            ->orWhere('nis', 'like', "%{$keyword}%");
        })->paginate(10);
        // $siswas = Siswa::all();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.layouts.siswa.index', compact('siswas', 'kelas'));
    }

    public function siswa(Request $request)
    {
        $keyword = $request->get('keyword');
        $siswas = Siswa::when($keyword, function ($query) use ($keyword) {
            $query->where('nama_siswa', 'like', "%{$keyword}%")
            ->orWhere('nis', 'like', "%{$keyword}%");
        })->paginate(10);
        // $siswas = Siswa::all();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('guru.layouts.siswa.index', compact('siswas', 'kelas'));
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
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nis' => 'unique:siswas,nis',
            'nama_siswa' => 'required|min:5',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|min:5',
            'kelas_id' => 'required',
        ],[
            'nis.unique' => 'NISN sudah terdata'
        ]);

        $imageName = $request->nama_siswa . '.' . $request->img->extension();

        $request->img->storeAs('public/siswas', $imageName);

        Siswa::create([
            'img' => $imageName,
            'nis' => $request->input('nis'),
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
        ]);

        if (!$request) {
            return redirect()->route('admin.siswa.create')->with(['error' => 'Data gagal disimpan!']);
        } else {
            return redirect()->route('admin.siswa.index')->with(['success' => 'Data berhasil disimpan!']);
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

    public function shows($id)
    {
        $siswa = Siswa::findorfail($id);

        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('guru.layouts.siswa.detail', compact('siswa', 'kelas'));
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
    public function update(Request $request, $id)
    {

        $siswa = Siswa::findorfail($id);
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


            $imageName = $request->nama_siswa . '.' . $request->img->extension();
            $request->img->storeAs('public/siswas', $imageName);

            Storage::delete('public/siswas' . $siswa->img);


            $siswa->update([
                'img' => $imageName,
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

        return redirect()->route('admin.siswa.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deleteSiswa = Siswa::findorfail($id);
         $deleteSiswa->delete();

        return redirect()->route('admin.siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
