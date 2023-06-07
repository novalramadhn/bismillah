@extends('admin.master')

@section('title', 'Admin | Tambah Kelas')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Kelas</h3>
                </div>
                <form action="{{ route('admin.kelas.update', $kela->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="font-weight-bold">Kode Kelas</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="kode_kelas" value="{{ old('kode_kelas', $kela->kode_kelas) }}"
                                        placeholder="Masukkan Kode Kelas">

                                    @error('kode_kelas')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Kelas</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="nama_kelas" value="{{ old('nama_kelas', $kela->nama_kelas) }}"
                                        placeholder="Masukkan Nama Kelas">

                                    @error('nama_kelas')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Ruangan</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="ruangan" value="{{ old('ruangan', $kela->ruangan) }}"
                                        placeholder="Masukkan Nama Ruangan">

                                    @error('ruangan')
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
                        <a href="{{ route('admin.kelas.index') }}" name="kembali" class="btn btn-default" id="back"><i
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
