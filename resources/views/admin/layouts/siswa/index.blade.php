@extends('admin.master')

@section('title', 'Admin | Data Siswa')
@section('breadcrumb', 'Data Siswa')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                <a href="{{ route('siswas.create') }}" class="btn btn-success btn-sm">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Siswa</a>
                    </button>
                    {{-- <a href="#" class="btn btn-success btn-sm my-3" target="_blank"><i
                            class="nav-icon fas fa-file-export"></i> &nbsp; EXPORT EXCEL</a>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                        <i class="nav-icon fas fa-file-import"></i> &nbsp; IMPORT EXCEL
                    </button> --}}
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                        <i class="nav-icon fas fa-minus-circle"></i> &nbsp; Drop
                    </button>
                </h3>
            </div>
            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="#" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <label>Pilih file excel</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
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
                                        <form action="{{ route('siswas.destroy', $siswa->id) }}"
                                            onsubmit="return confirm('Apakah Anda Yakin ?')" method="post">
                                            <a href="{{ route('siswas.show', $siswa->id) }}"
                                                class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ route('siswas.edit', $siswa->id) }}"
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
