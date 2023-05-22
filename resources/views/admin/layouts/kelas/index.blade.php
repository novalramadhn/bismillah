@extends('admin.master')

@section('title', 'Admin | Data Kelas')
@section('breadcrumb', 'Data Kelas')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('kelas.create') }}" class="btn btn-success btn-sm my-3">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Kelas</a>

                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                        <i class="nav-icon fas fa-minus-circle"></i> &nbsp; Drop
                    </button>
                </h3>
            </div>
            <div class="modal fade" id="dropTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="#">
                        @csrf
                        @method('delete')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus Semua Data?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Drop</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
             {{-- Body --}}
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Ruangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->kode_kelas }}</td>
                            <td>{{ $data->nama_kelas }}</td>
                            <td>{{ $data->ruangan }}</td>
                            <td>
                                    <form action="{{ route('kelas.destroy', $data->id) }}" onsubmit="return confirm('Apakah Anda Yakin ?')" method="post">
                                        <a href="{{ route('kelas.edit', $data->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            Data Kelas belum Tersedia!
                        </div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
