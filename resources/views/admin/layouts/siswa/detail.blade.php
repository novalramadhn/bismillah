@extends('admin.master')

@section('title', 'Admin | Data Siswa')
@section('breadcrumb', 'Data Siswa')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Detail Siswa</h3>
                </div>
                <div class="card-body">
                    <div class="row no-gutters ml-2 mb-2 mr-2">
                        <div class="col-md-4">
                            <img src="{{ Storage::url('public/siswas/') . $siswa->img }}" class="card-img img-thumbnails"
                                style="width: 300px">
                        </div>
                        <div class="col-md-1 mb-4"></div>
                        <div class="col-md-7">
                            <h5 class="card-title card-text mb-4">Nama : {{ $siswa->nama_siswa }}</h5>
                            <h5 class="card-title card-text mb-4">NIP : {{ $siswa->nis }}</h5>
                            <h5 class="card-title card-text mb-4">Kelas : {{ $siswa->kelas->nama_kelas }}</h5>
                            @if ($siswa->jk == 'L')
                                <h5 class="card-title card-text mb-4">Jenis Kelamin : Laki-laki</h5>
                            @else
                                <h5 class="card-title card-text mb-4">Jenis Kelamin : Perempuan</h5>
                            @endif
                            <h5 class="card-title card-text mb-4">Tempat Lahir : {{ $siswa->tmp_lahir }}</h5>
                            <h5 class="card-title card-text mb-4">Tanggal Lahir :
                                {{ date('l, d F Y', strtotime($siswa->tgl_lahir)) }}</h5>
                            <h5 class="card-title card-text mb-4">Alamat : {{ $siswa->alamat }}</h5>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.siswa.index') }}" name="kembali" class="btn btn-default" id="back"><i
                                class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
