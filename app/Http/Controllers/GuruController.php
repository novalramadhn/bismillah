<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
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

    public function guru(Request $request)
    {
        $keyword = $request->get('keyword');
        $gurus = Guru::when($keyword, function ($query) use ($keyword) {
            $query->where('nama_guru', 'like', "%{$keyword}%")
            ->orWhere('nip', 'like', "%{$keyword}%");
        })->paginate(10);
        $mapels = Mapel::orderBy('nama_mapel')->get();
        return view('guru.layouts.guru.index', compact('gurus', 'mapels'));
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
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nip' => 'unique:gurus,nip',
            'nama_guru' => 'required|min:4',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|min:5',
            // 'mapel_id' => 'required',
        ],[
            'nip.unique' => 'NIP sudah ada dalam sistem.'
        ]);

        $imageName = $request->nama_guru . '.' . $request->img->extension();

        $request->img->storeAs('gurus', $imageName);


        // $image = $request->file('img');
        // $image->storeAs('public/gurus', $image->getClientOriginalName());

        Guru::create([
            'img' => $imageName,
            'nip' => $request->input('nip'),
            'nama_guru' =>$request->nama_guru,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            // 'mapel_id' => $request->mapel_id,
        ]);

        if (!$request) {
            return redirect()->route('admin.guru.create')->with(['error' => 'Data gagal disimpan!']);
        } else {
            return redirect()->route('admin.guru.index')->with(['success' => 'Data berhasil disimpan!']);
        }

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

        // $mapels = Mapel::orderBy('nama_mapel')->get();
        // $mapel = Jadwal::where('guru_id', $guru);
        // $mapels = Mapel::find($id);
        return view('admin.layouts.guru.detail', compact('guru'));
        // return dd($mapel);
    }

    public function shows($id)
    {

        $guru = Guru::findorfail($id);

        // $mapels = Mapel::orderBy('nama_mapel')->get();
        return view('guru.layouts.guru.detail', compact('guru'));
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

        // $mapels = Mapel::orderBy('nama_mapel')->get();
        return view('admin.layouts.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::findorfail($id);
        $this->validate($request, [
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_guru' => 'required|min:5',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|min:5',
            // 'mapel_id' => 'required',
        ]);

        if ($request->hasFile('img')) {


            $imageName = $request->nama_guru . '.' . $request->img->extension();
            $request->img->storeAs('gurus/', $imageName);

            Storage::delete('gurus/' . $guru->img);

            $guru->update([
                'img' => $imageName,
                'nama_guru' => $request->nama_guru,
                'jk' => $request->jk,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                // 'mapel_id' => $request->mapel_id,

            ]);
        } else {

            //update post without image
            $guru->update([
                'nama_guru' => $request->nama_guru,
                'jk' => $request->jk,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                // 'mapel_id' => $request->mapel_id,
            ]);
        }

        return redirect()->route('admin.guru.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findorfail($id);
        $guru->delete();

        return redirect()->route('admin.guru.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
