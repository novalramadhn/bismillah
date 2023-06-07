@extends('admin.master')

@section('title', 'Admin | Tambah Guru')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Guru</h3>
                </div>
                <form action="{{ route('admin.guru.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_guru">Nama Guru</label>
                                    <input type="text" id="nama_guru" name="nama_guru"
                                        class="form-control @error('nama_guru') is-invalid @enderror">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="mapel_id">Mapel</label>
                                    <select id="mapel_id" name="mapel_id"
                                        class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                                        <option value="">-- Pilih Mapel --</option>
                                        @foreach ($mapels as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="tmp_lahir">Tempat Lahir</label>
                                    <input type="text" id="tmp_lahir" name="tmp_lahir"
                                        class="form-control @error('tmp_lahir') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" id="nip" name="nip"
                                        class="form-control @error('nip') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select id="jk" name="jk"
                                        class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                        <option value="{{ old('jk') }}">-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror">
                                </div>
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
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('admin.guru.index') }}" name="kembali" class="btn btn-default" id="back"><i
                                class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                            Tambahkan</button>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
