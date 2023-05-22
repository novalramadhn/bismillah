@extends('admin.master')

@section('title', 'Admin | Tambah Kelas')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Kelas</h3>
                </div>
                <form action="{{ route('kelas.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama_guru">Kode Kelas</label>
                                    <input type="text" id="kode_kelas" name="kode_kelas"
                                        class="form-control @error('kode_kelas') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="nama_mapel">Nama Kelas</label>
                                    <input type="text" id="nama_kelas" name="nama_kelas"
                                        class="form-control @error('nama_kelas') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="ruangan">Ruangan</label>
                                    <input type="text" id="ruangan" name="ruangan"
                                        class="form-control @error('ruangan') is-invalid @enderror">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('kelas.index') }}" name="kembali" class="btn btn-default" id="back"><i
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
