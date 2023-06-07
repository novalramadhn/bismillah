@extends('admin.master')

@section('title', 'Admin | Data Jadwal')
@section('breadcrumb', 'Data Jadwal')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success btn-sm">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Jadwal</a>
                    {{-- <a href="#" class="btn btn-success btn-sm my-3" target="_blank"><i class="nav-icon fas fa-file-export"></i> &nbsp; EXPORT EXCEL</a>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                  <i class="nav-icon fas fa-file-import"></i> &nbsp; IMPORT EXCEL
              </button> --}}
                </h3>

            </div>
            <!-- /.card-header -->
        <form action="{{ route('admin.jadwal.index') }}" method="GET">
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
                            <label for="haris">Hari:</label>
                        </div>
                        <div class="col-auto">
                            <select name="haris" id="haris" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Semua Hari</option>
                                @foreach ($haris as $id => $nama_hari)
                                    <option value="{{ $id }}" @if (request('haris') == $id) selected @endif>
                                        {{ $nama_hari }}</option>
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
                            <th>Hari</th>
                            <th>Pelajaran - Guru</th>
                            <th>Jam Pelajaran</th>
                            <th>Kelas - Ruang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->hari->nama_hari }}</td>
                                <td>
                                    <h5 class="card-title">{{ $data->mapels->nama_mapel }}</h5>
                                    <p class="card-text"><small class="text-muted">{{ $data->gurus->nama_guru }}</small></p>
                                </td>
                                <td>{{ $data->waktu->jam }}</td>
                                <td>
                                    <h5 class="card-title">{{ $data->kelas->nama_kelas }}</h5>
                                    <p class="card-text"><small class="text-muted">{{ $data->ruangs->ruangan }}</small></p>
                                </td>
                                <td>
                                    <form action="{{ route('admin.jadwal.destroy', $data->id) }}"
                                        onsubmit="return confirm('Apakah Anda Yakin ?')" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('admin.jadwal.edit', $data->id) }}"
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
            {{ $jadwal->onEachSide(5)->links() }}
        </div>
        <!-- /.card -->
    </div>
@endsection
