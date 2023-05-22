@extends('admin.master')

@section('title', 'Admin | Data User')
@section('breadcrumb', 'Data User')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-3">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data User</a>
                </h3>
            </div>
            {{-- Body --}}
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                    <div class="row">
                                        <form action="{{ route('users.destroy', $data->id) }}"
                                            onsubmit="return confirm('Apakah Anda Yakin ?')" method="post">
                                            <a href="{{ route('users.edit .edit', $data->id) }}"
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
                                Data User belum Tersedia!
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
