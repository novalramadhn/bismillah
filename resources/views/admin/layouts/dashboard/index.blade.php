@extends('admin.master')

@section('title', 'Admin | Dashboard')
@section('breadcrumb', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-6 col-lg-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3>

                    <p>Siswa Hadir</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>Siswa Berkegiatan Lain</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>150</h3>

                    <p>Siswa Sakit</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>150</h3>

                    <p>Siswa Alpha</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- ISI -->
@endsection
