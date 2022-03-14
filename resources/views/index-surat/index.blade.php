@extends('layout-admin.master-admin')

@section('bootstrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('Index-Surat', 'active')
@section('title', '| Index-Surat')

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
                        <h3 class="card-title">Data Index Surat</h3>
                        @if(Auth::user()->role == "pegawai")
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Input Index Surat
                            </button>
                        @endif
                        {{-- modal-input-surat-masuk --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Input Index Surat</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('admin/index-surat/store-index-surat') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="index_surat">Index Surat</label>
                                                <input type="text" name="index_surat" class="form-control @error('index_surat') ins-invalid @enderror"  value="{{ old('index_surat')}}" required>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="index_prihal">Index Prihal</label>
                                                <input type="text" name="index_prihal" class="form-control @error('index_prihal') ins-invalid @enderror"  value="{{ old('index_prihal')}}" required>
                                            </div>                                    
                                        </div>        
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </form> 
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

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
                                        <th>#</th>
                                        <th>Index Surat</th>
                                        <th>Index Prihal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($indexSurat as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->index_surat }}</td>
                                            <td>{{ $data->index_prihal }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editIndexSurat{{ $loop->iteration }}">
                                                        Edit
                                                    </button>
                            
                                                    {{-- modal-input-surat-masuk --}}
                                                    <div class="modal fade" id="editIndexSurat{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="editIndexSurat{{ $loop->iteration }}Label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editIndexSurat{{ $loop->iteration }}Label">Edit Index Surat</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ url('admin/index-surat/store-index-surat/'.$data->id) }}" method="POST">
                                                                        @csrf
                                                                        <div class="form-row">
                                                                            <div class="form-group col-lg-6">
                                                                                <label for="index_surat">Index Surat</label>
                                                                                <input type="text" name="index_surat" class="form-control @error('index_surat') ins-invalid @enderror"  value="{{ $data->index_surat}}" required>
                                                                            </div>
                                                                            <div class="form-group col-lg-6">
                                                                                <label for="index_prihal">Index Prihal</label>
                                                                                <input type="text" name="index_prihal" class="form-control @error('index_prihal') ins-invalid @enderror"  value="{{ $data->index_prihal }}" required>
                                                                            </div>                                    
                                                                        </div>        
                                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                                    </form> 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ url('admin/index-surat/delete-index-surat/'.$data->id) }}" class="btn btn-danger">Hapus</a>
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
    @section('js-bootstrap')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @endsection
    @section('data-table')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#tabel-data').DataTable();
            });
        </script>
    @endsection 
        <script>
            CKEDITOR.replace( 'summary_ekskul' );
        </script>
@endsection