@extends('guru.master')

@section('title', 'Guru | Data Jadwal')
@section('breadcrumb', 'Data Jadwal')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <!-- /.card-header -->

            <form action="{{ route('guru.jadwal.index') }}" method="GET">
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
                            <label for="hari">Hari:</label>
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
                                <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                                <td>
                                    <h5 class="card-title">{{ $data->kelas->nama_kelas }}</h5>
                                    <p class="card-text"><small class="text-muted">{{ $data->ruangs->ruangan }}</small></p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        {{ $jadwal->onEachSide(5)->links() }}
        <!-- /.card -->
    </div>
@endsection
