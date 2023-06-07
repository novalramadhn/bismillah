@extends('guru.master')

@section('title', 'Guru | Tambah Nilai')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Nilai</h3>
                </div>
                <form action="{{ route('guru.nilai.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="siswa_id">Siswa</label>
                                    <select id="siswa_id" name="siswa_id"
                                        class="select2bs4 form-control @error('siswa_id') is-invalid @enderror">
                                        <option value="">-- Pilih Siswa --</option>
                                        @foreach ($siswas as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas_id">Kelas</label>
                                    <select id="kelas_id" name="kelas_id"
                                        class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mapel_id">Mapel</label>
                                    <select id="mapel_id" name="mapel_id"
                                        class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                                        <option value="">-- Pilih Mapel --</option>
                                        @foreach ($mapels as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="semester_id">Semester</label>
                                    <select id="semester_id" name="semester_id"
                                        class="select2bs4 form-control @error('semester_id') is-invalid @enderror">
                                        <option value="">-- Pilih Semester --</option>
                                        @foreach ($semesters as $item)
                                            <option value="{{ $item->id }}">{{ $item->semester }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tugas">Tugas</label>
                                    <input type='text' id="tugas" name='tugas'
                                    class="form-control @error('tugas') is-invalid @enderror tugas"
                                    placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="uts">UTS</label>
                                    <input type='text' id="uts" name='uts'
                                        class="form-control @error('uts') is-invalid @enderror"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="uas">UAS</label>
                                    <input type='text' id="uas" name='uas'
                                        class="form-control @error('uas') is-invalid @enderror"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <input type='text' id="grade" name='grade'
                                        class="form-control @error('grade') is-invalid @enderror" disabled
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('guru.nilai.index') }}" name="kembali" class="btn btn-default" id="back"><i
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
