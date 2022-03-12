@extends('layout-admin.master-admin')

@section('Surat-Masuk', 'active')
@section('title', '| Surat-Masuk')

@section('judul')
    <h1>Data Surat Masuk</h1>
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
                            <a type="button" class="btn btn-primary" href="{{ url('admin/surat-masuk/create-surat-masuk') }}">
                                Input Surat Masuk
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
                                        <th>Asal Surat</th>
                                        <th>Tanggal Masuk Surat</th>
                                        <th>Tanggal Dari Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Index Surat</th>
                                        <th>Prihal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suratMasuk as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->surat_dari }}</td>
                                            <td>{{ $data->tanggal_masuk_surat }}</td>
                                            <td>{{ $data->tanggal_surat }}</td>
                                            <td>{{ $data->nomor_surat }}</td>
                                            @if($data->indexSurat)
                                                @if ($data->indexSurat->index_surat)
                                                    <td>{{ $data->indexSurat->index_surat }}</td>
                                                @else
                                                    <td>-</td>
                                                @endif 
                                            @else
                                                <td>-</td>
                                            @endif
                                            <td>{{ $data->prihal }}</td>
                                            @if ($data->status == "Tindak Lanjuti")
                                                <td><span class="bg-success p-1">{{ $data->status }}</span></td>
                                            @elseif($data->status == "Tidak diLanjuti")
                                                <td><span class="bg-danger p-1">{{ $data->status }}</span></td>
                                            @else
                                                <td><span class="bg-info p-1">{{ $data->status }}</span></td>
                                            @endif
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    @if (Auth::user()->role == "pegawai")
                                                        <a href="{{ url('admin/surat-masuk/delete-surat-masuk/'.$data->id) }}" class="btn btn-danger m-1">Hapus</a>
                                                        <a href="{{ url('admin/surat-masuk/edit-surat-masuk/'.$data->id) }}" class="btn btn-warning m-1">Edit</a>   
                                                        <a href="{{ url('admin/surat-masuk/print/'.$data->id) }}" class="btn btn-primary m-1">Print</a>
                                                    @endif
                                                    <a href="{{ url('admin/surat-masuk/show-surat-masuk/'.$data->id) }}" class="btn btn-info m-1">Show surat</a>
                                                    @if (Auth::user()->role == "Kepala-Dinas")
                                                        <a href="{{ url('admin/surat-masuk/status-aprove/'.$data->id) }}" class="btn btn-success m-1">Tindak Lanjuti</a>
                                                        <a href="{{ url('admin/surat-masuk/status-disaprove/'.$data->id) }}" class="btn btn-danger m-1">TIdak dilanjutkan</a>   
                                                    @endif
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