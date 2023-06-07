@extends('admin.master')

@section('title', 'Admin | Data Kelas')
@section('breadcrumb', 'Data Kelas')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('admin.kelas.create') }}" class="btn btn-success btn-sm my-3">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Kelas</a>
                </h3>
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
                                    <form action="{{ route('admin.kelas.destroy', $data->id) }}" onsubmit="return confirm('Apakah Anda Yakin ?')" method="post">
                                        <a href="{{ route('admin.kelas.edit', $data->id) }}"
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
        {{ $kelas->onEachSide(5)->links() }}
    </div>
    <script>
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
