@extends('admin.master')

@section('title', 'Admin | Data Guru')
@section('breadcrumb', 'Data Guru')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('admin.guru.create') }}" class="btn btn-success btn-sm">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Guru</a>
                    {{-- <a href="#" class="btn btn-success btn-sm my-3" target="_blank"><i
                            class="nav-icon fas fa-file-export"></i> &nbsp; EXPORT EXCEL</a>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                        <i class="nav-icon fas fa-file-import"></i> &nbsp; IMPORT EXCEL
                    </button> --}}
                </h3>
                <form action="{{ route('admin.guru.index') }}" method="GET">
                    <div class="d-flex flex-row-reverse">
                        <div class="input-group input-group-sm mb-3 col-4 ">
                            <input type="text" name="keyword" class="form-control"
                                placeholder="Masukkan Nama/NIP">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
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
            {{-- Body --}}
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th style="padding-left: 48px">Foto</th> --}}
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($gurus as $guru)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>
                                                    <img src="{{ Storage::url('public/gurus/').$guru->img }}" class="rounded-2"
                                                        style="width: 100px">
                                                </td> --}}
                                <td>{{ $guru->nip }}</td>
                                <td>{{ $guru->nama_guru }}</td>
                                <td>
                                    @if ($guru->jk == 'L')
                                        <h5 class="card-title card-text mb-2">Laki-laki</h5>
                                    @else
                                        <h5 class="card-title card-text mb-2">Perempuan</h5>
                                    @endif
                                </td>
                                <td>{{ $guru->alamat }}</td>
                                <td>
                                    <div class="row">
                                        <form action="{{ route('admin.guru.destroy', $guru->id) }}"
                                            onsubmit="return confirm('Apakah Anda Yakin ?')" method="post">
                                            <a href="{{ route('admin.guru.show', $guru->id) }}"
                                                class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ route('admin.guru.edit', $guru->id) }}"
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
                                Data Guru belum Tersedia!
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{ $gurus->onEachSide(5)->links() }}
    </div>
    <script>
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
