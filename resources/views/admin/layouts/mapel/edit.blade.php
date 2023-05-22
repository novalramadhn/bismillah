@extends('admin.master')

@section('title', 'Admin | Tambah Kelas')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Kelas</h3>
                </div>
                <form action="{{ route('mapels.update', $mapel->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="font-weight-bold">Kode Mapel</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="kode_mapel" value="{{ old('kode_mapel', $mapel->kode_mapel) }}"
                                        placeholder="Masukkan Kode Mapel">

                                    @error('kode_mapel')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Mapel</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="nama_mapel" value="{{ old('nama_mapel', $mapel->nama_mapel) }}"
                                        placeholder="Masukkan Nama Kelas">

                                    @error('nama_mapel')
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
                        <a href="{{ route('mapels.index') }}" name="kembali" class="btn btn-default" id="back"><i
                                class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                            Tambahkan</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
