@extends('admin.master')

@section('title', 'Admin | Tambah Mapel')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Mapel</h3>
                </div>
                <form action="{{ route('mapels.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama_guru">Kode Mapel</label>
                                    <input type="text" id="kode_mapel" name="kode_mapel"
                                        class="form-control @error('kode_mapel') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="nama_mapel">Nama Mapel</label>
                                    <input type="text" id="nama_mapel" name="nama_mapel"
                                        class="form-control @error('nama_mapel') is-invalid @enderror">
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
