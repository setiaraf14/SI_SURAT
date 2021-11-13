@extends('layout-admin.master-admin')

@section('Surat-Masuk', 'active')
@section('title', '| Surat-Masuk')

@section('judul')
    <h1>Create Surat Masuk</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Input Surat Masuk</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form action="{{ url('admin/surat-masuk/store-surat-masuk') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="surat_dari">Asal Surat</label>
                                    <input type="text" name="surat_dari" class="form-control @error('surat_dari') ins-invalid @enderror"  value="{{ old('surat_dari')}}" required>
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
                                <div class="form-group col-lg-6">
                                    <label for="nomor_surat">Nomor Surat</label>
                                    <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') ins-invalid @enderror"  value="{{ old('nomor_surat')}}" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="index-surat">Index Surat</label>
                                    <select name="index_surat_id" class="form-control" id="index-surat">
                                        <option value="" selected>-- SELECT --</option>
                                        @foreach($indexSurat as $dataIndex)
                                            <option value="{{ $dataIndex->id }}">{{ $dataIndex->index_prihal }}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!} {{ ($dataIndex->index_surat) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="prihal">Prihal</label>
                                    <input type="text" name="prihal" class="form-control @error('prihal') ins-invalid @enderror"  value="{{ old('prihal')}}" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="softcopy_surat">Soft Copy Surat (Optional)</label>
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

