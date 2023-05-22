@extends('admin.master')

@section('title', 'Admin | Tambah User')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data User</h3>
                </div>
                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- Body --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" id="kode_mapel" name="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" name="role"
                                        class="select2bs4 form-control @error('role') is-invalid @enderror">
                                        <option value="{{ old('role') }}">-- Pilih Role User --</option>
                                        <option value="admin">Admin</option>
                                        <option value="guru">Guru</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <a href="{{ route('users.index') }}" name="kembali" class="btn btn-default" id="back"><i
                                class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                            Tambahkan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
