@extends('layout-admin.master-admin')

@section('Surat-Keluar', 'active')
@section('title', '| Surat-Keluar')

@section('judul')
    <h1>Data Surat Keluar</h1>
@endsection

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Data Surat Masuk</h3>
                        @if(Auth::user()->role == "pegawai")
                            <a type="button" class="btn btn-primary" href="{{ url('admin/surat-keluar/create-surat-keluar') }}">
                                Input Surat Keluar
                            </a>
                        @endif
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-{{ session('style') }}" id="alert-notification">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h5>{{ session('message') }}</h5>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span id="close-notification">&times;</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Tujuan Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Prihal</th>
                                        <th>Index Surat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suratKeluar as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->tujuan_surat }}</td>
                                            <td>{{ $data->nomor_surat }}</td>
                                            <td>{{ $data->tanggal_surat }}</td>
                                            <td>{{ $data->prihal }}</td>
                                            {{-- <td>{{ $data->indexSurat->index_surat }}</td> --}}
                                            @if($data->indexSurat)
                                                @if ($data->indexSurat->index_surat)
                                                    <td>{{ $data->indexSurat->index_surat }}</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                            @else
                                                <td>-</td> 
                                            @endif
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ url('admin/surat-keluar/delete-surat-keluar/'.$data->id) }}" class="btn btn-danger">Hapus</a>
                                                    <a href="{{ url('admin/surat-keluar/show-surat-keluar/'.$data->id) }}" class="btn btn-info">Show surat</a>
                                                    <a href="{{ url('admin/surat-keluar/edit-surat-keluar/'.$data->id) }}" class="btn btn-warning">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
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