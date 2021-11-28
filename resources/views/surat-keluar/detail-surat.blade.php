@extends('layout-admin.master-admin')

@section('Surat-Masuk', 'active')
@section('title', '| Surat-Masuk')

@section('judul')
    <h1>Detail Surat Keluar : -{{ $suratKeluar->nomor_surat }}</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Detail Surat Keluar : -{{ $suratKeluar->nomor_surat }}</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <iframe src="{{Storage::url($suratKeluar->softcopy_surat)}}" style="width:900px; height:1100px;" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
@endsection

@section('js-select-2')
    <script>
        $(document).ready(function () {
            $("#index-surat").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select"
            });
        });
    </script>
@endsection

