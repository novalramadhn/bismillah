@extends('admin.master')

@section('title', 'Admin | Edit Kelas')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-6 col-md-6">
                <div class="card border-0 shadow rounded">
                    <div class="card-header bg-white">
                        <h4 class="card-title"><strong>Edit Data Guru</strong></h4>
                        <div class="card-tools">
                            <a href="{{ route('gurus.index') }}" class="btn btn-sm btn-danger warna">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gurus.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Foto</label>
                                <input type="file" class="form-control @error('img') is-invalid @enderror"
                                    name="img">

                                @error('img')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Guru</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru) }}" placeholder="Masukkan Nama Guru">

                                @error('nama_guru')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nomor Induk Pegawai</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="nip" value="{{ old('nip', $guru->nip) }}" placeholder="Masukkan NIP">

                                @error('nip')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L"
                                        @if ($guru->jk == 'L')
                                            selected
                                        @endif
                                    >Laki-Laki</option>
                                    <option value="P"
                                        @if ($guru->jk == 'P')
                                            selected
                                        @endif
                                    >Perempuan</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="alamat" value="{{ old('alamat', $guru->alamat) }}" placeholder="Masukkan Alamat">

                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mapel_id">Mapel</label>
                                <select id="mapel_id" name="mapel_id" class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                                    <option value="">-- Pilih Mapel --</option>
                                    @foreach ($mapels as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($guru->mapel_id == $item->id)
                                                selected
                                            @endif
                                        >{{ $item->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary warna">Simpan</button>
                            <button type="reset" class="btn btn-md btn-warning warna">Reset</button>
                            <style>
                                .warna {
                                    color: #ffffff;
                                }
                            </style>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
