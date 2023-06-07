@extends('guru.master')

@section('title', 'Guru | Data Nilai')
@section('breadcrumb', 'Data Nilai')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('guru.nilai.create') }}" class="btn btn-success btn-sm">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Nilai</a>
                    {{-- <a href="#" class="btn btn-success btn-sm my-3" target="_blank"><i class="nav-icon fas fa-file-export"></i> &nbsp; EXPORT EXCEL</a>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                  <i class="nav-icon fas fa-file-import"></i> &nbsp; IMPORT EXCEL
              </button> --}}
                </h3>

            </div>
            <!-- /.card-header -->

            <form action="{{ route('guru.nilai.index') }}" method="GET">
                <div class="mx-auto mt-auto p-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="kelas">Kelas:</label>
                        </div>
                        <div class="col-auto">
                            <select name="kelas" id="kelas" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Semua Kelas</option>
                                @foreach ($kelas as $id => $nama_kelas)
                                    <option value="{{ $id }}" @if (request('kelas') == $id) selected @endif>
                                        {{ $nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-auto">
                            <label for="semesters">Semester:</label>
                        </div>
                        <div class="col-auto">
                            <select name="semesters" id="semesters" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Semua Semester</option>
                                @foreach ($semesters as $id => $semester)
                                    <option value="{{ $id }}" @if (request('semesters') == $id) selected @endif>
                                        {{ $semester }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>



            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Siswa - Kelas</th>
                            <th>Mapel - Semester</th>
                            <th>Tugas</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Grade</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <h5 class="card-title">{{ $data->siswas->nama_siswa }}</h5>
                                    <p class="card-text"><small class="text-muted">{{ $data->kelas->nama_kelas }}</small></p>
                                </td>
                                <td>
                                    <h5 class="card-title">{{ $data->mapels->nama_mapel }}</h5>
                                    <p class="card-text"><small class="text-muted">{{ $data->semesters->semester }}</small></p>
                                </td>
                                <td>{{ $data->tugas }} </td>
                                <td>{{ $data->uts }} </td>
                                <td>{{ $data->uas }} </td>
                                <td>{{ $data->grade }} </td>
                                <td>
                                    <form action="{{ route('guru.nilai.destroy', $data->id) }}"
                                        onsubmit="return confirm('Apakah Anda Yakin ?')" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('guru.nilai.edit', $data->id) }}"
                                            class="btn btn-primary btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp;
                                            Edit</a>
                                        <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i>
                                            &nbsp; Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        {{-- {{ $nilai->onEachSide(5)->links() }} --}}
        <!-- /.card -->
    </div>
@endsection
