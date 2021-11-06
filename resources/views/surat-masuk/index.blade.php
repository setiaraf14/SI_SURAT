@extends('layout-admin.master-admin')

@section('bootstrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Input Surat Masuk
                        </button>

                        {{-- modal-input-surat-masuk --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Input Surat Masuk</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="surat_dari">Asal Surat</label>
                                                <input type="text" name="surat_dari" class="form-control @error('surat_dari') ins-invalid @enderror"  value="{{ old('surat_dari')}}" required>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="nomor_surat">Nomor/Kode Surat</label>
                                                <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') ins-invalid @enderror"  value="{{ old('nomor_surat')}}" required>
                                            </div>                                    
                                        </div>
                    
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="prihal">Prihal</label>
                                                <input type="text" name="prihal" class="form-control @error('prihal') ins-invalid @enderror"  value="{{ old('prihal')}}" required>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="tanggal_surat">Tanggal Dari Surat</label>
                                                <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ old('tanggal_surat') }}" required>
                                                @error('tanggal_surat')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-12">
                                                <label for="softcopy_surat">Soft Copy Surat</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control @error('softcopy_surat') is-invalid @enderror" id="softcopy_surat" name="softcopy_surat" value="{{ old('softcopy_surat') }}">
                                                </div>
                                                    @error('softcopy_surat')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
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
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Data 1</th>
                                        <th>Data 2</th>
                                        <th>Data 3</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
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