@extends('admin.master')

@section('title', 'Admin | Data Siswa')
@section('breadcrumb', 'Data Siswa')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('admin.siswa.create') }}" class="btn btn-success btn-sm">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Siswa</a>
                </h3>
                <form action="{{ route('admin.siswa.index') }}" method="GET">
                    <div class="d-flex flex-row-reverse">
                        <div class="input-group input-group-sm mb-3 col-4 ">
                            <input type="text" name="keyword" class="form-control"
                                placeholder="Masukkan Nama/NIS">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- Body --}}

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th style="padding-left: 48px">Foto</th> --}}
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswas as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td>
                                    @if ($siswa->jk == 'L')
                                        <h5 class="card-title card-text mb-2">Laki-laki</h5>
                                    @else
                                        <h5 class="card-title card-text mb-2">Perempuan</h5>
                                    @endif
                                </td>
                                <td>{{ $siswa->kelas->nama_kelas }}</td>
                                <td>
                                    <div class="row">
                                        <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="post">
                                            <a href="{{ route('admin.siswa.show', $siswa->id) }}"
                                                class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ route('admin.siswa.edit', $siswa->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Siswa belum Tersedia!
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $siswas->links() }}
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
