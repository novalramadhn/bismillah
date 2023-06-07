@extends('admin.master')

@section('title', 'Admin | Data Guru')
@section('breadcrumb', 'Data Guru')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Detail Guru</h3>
                </div>
                <div class="card-body">
                    <div class="row no-gutters ml-2 mb-2 mr-2">
                        <div class="col-md-4">
                            <img src="{{ Storage::url('public/gurus/'). $guru->img }}" class="card-img img-thumbnails"
                                style="width: 300px">
                        </div>
                        <div class="col-md-1 mb-4"></div>
                        <div class="col-md-7">
                            <h5 class="card-title card-text mb-4">Nama : {{ $guru->nama_guru }}</h5>
                            <h5 class="card-title card-text mb-4">NIP : {{ $guru->nip }}</h5>
                            {{-- <h5 class="card-title card-text mb-4">Guru Mapel : {{ $guru->mapels->nama_mapel }}</h5> --}}
                            @if ($guru->jk == 'L')
                                <h5 class="card-title card-text mb-4">Jenis Kelamin : Laki-laki</h5>
                            @else
                                <h5 class="card-title card-text mb-4">Jenis Kelamin : Perempuan</h5>
                            @endif
                            <h5 class="card-title card-text mb-4">Tempat Lahir : {{ $guru->tmp_lahir }}</h5>
                            <h5 class="card-title card-text mb-4">Tanggal Lahir :
                                {{ date('l, d F Y', strtotime($guru->tgl_lahir)) }}</h5>
                            <h5 class="card-title card-text mb-4">Alamat : {{ $guru->alamat }}</h5>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.guru.index') }}" name="kembali" class="btn btn-default" id="back"><i
                                class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
