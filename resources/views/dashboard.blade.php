@extends('layout-admin.master-admin')

@section('dashboard', 'active')
@section('title', '| Dashboard')

@section('judul')
    <h1>Dashboard</h1>
@endsection

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="title-page text-center">
                <h1>Data Utama</h1>
            </div>
        </div>
    </div>
    <br><br>
        <div class="info ">
            <div class="col-lg-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                    <h3>{{ $suratMasuk }}</h3>
                    <p>Surat Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users fa-3x"></i>
                </div>
                {{-- <a href="{{ route('kegiatan.index') }}" class="small-box-footer">olah kegiatan <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>

                <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>{{ $suratKeluar }}</h3>
                    <p>Surat Keluar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-id-card fa-3x"></i>
                </div>
                {{-- <a href="{{ route('kegiatan.index') }}" class="small-box-footer">olah kegiatan <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
    @section('data-table')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#tabel-data').DataTable();
            });
        </script>
    @endsection 
@endsection