@extends('admin.master')

@section('title', 'Admin | Edit Jadwal')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Jadwal</h3>
                </div>
                <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mapel_id">Mapel</label>
                                    <select id="mapel_id" name="mapel_id"
                                        class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                                        <option value="">-- Pilih Mapel --</option>
                                        @foreach ($mapels as $data)
                                            <option value="{{ $data->id }}"
                                                @if ($jadwal->mapel_id == $data->id) selected @endif>{{ $data->nama_mapel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas_id">Kelas</label>
                                    <select id="kelas_id" name="kelas_id"
                                        class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($jadwal->kelas_id == $item->id) selected @endif>{{ $item->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_id">Waktu</label>
                                    <select id="waktu_id" name="waktu_id"
                                        class="select2bs4 form-control @error('waktu_id') is-invalid @enderror">
                                        <option value="">-- Pilih Waktu --</option>
                                        @foreach ($waktus as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($jadwal->waktu_id == $item->id) selected @endif>{{ $item->jam }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guru_id">Guru</label>
                                    <select id="guru_id" name="guru_id"
                                        class="select2bs4 form-control @error('guru_id') is-invalid @enderror">
                                        <option value="">-- Pilih Guru --</option>
                                        @foreach ($gurus as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($jadwal->guru_id == $item->id) selected @endif>{{ $item->nama_guru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ruang_id">Ruangan</label>
                                    <select id="ruang_id" name="ruang_id"
                                        class="select2bs4 form-control @error('ruang_id') is-invalid @enderror">
                                        <option value="">-- Pilih Ruangan --</option>
                                        @foreach ($ruangs as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($jadwal->ruang_id == $item->id) selected @endif>{{ $item->ruangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="hari_id">Hari</label>
                                    <select id="hari_id" name="hari_id"
                                        class="select2bs4 form-control @error('hari_id') is-invalid @enderror">
                                        <option value="">-- Pilih Hari --</option>
                                        @foreach ($haris as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($jadwal->hari_id == $item->id) selected @endif>{{ $item->nama_hari }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('admin.jadwal.index') }}" name="kembali" class="btn btn-default" id="back"><i
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
