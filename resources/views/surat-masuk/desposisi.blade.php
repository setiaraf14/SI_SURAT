<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>KARTU DISPOSISI</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="row">

                </div>
                <div class="title-disposisi d-flex justify-content-center"><h3><b>KARTU DISPOSISI</b></h3></div>
                <br>
                <div class="section kartu-disposisi d-flex justify-content-center">
                    <table class="" width="40%">
                        <tbody>
                          <tr>
                              <td>
                                  <hr style="border: 1px solid black">
                                      <div class="d-flex justify-content-start">
                                        <div class="index-tanggal">
                                            <h6>INDEX &emsp; &emsp; &emsp;: <b style="color: white">SPASI</b> {{ $suratMasuk->indexSurat->index_prihal }}</h6>
                                            <h6>TGL PSYLN  &emsp; &emsp; &emsp;: <b style="color: white">SPASI</b>{{ $suratMasuk->tanggal_masuk_surat }} <h6>
                                        </div>
                                      </div>
                                    </div>
                                  <hr style="border: 1px solid black">
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <div class="d-flex justify-content-between">
                                    <div class="keterangan">
                                        <div class="d-flex justify-content-start bg-light m-1">
                                            <h6>PRIHAL  &emsp;: &emsp; &emsp; {{ Illuminate\Support\Str::of($suratMasuk->prihal)->limit(30) }} </h6>
                                        </div>
                                        <div class="d-flex justify-content-start bg-light m-1">
                                            <h6>Tgl./NO  &emsp;: &emsp; &emsp; {{$suratMasuk->nomor_surat}}-{{ $suratMasuk->tanggal_surat }}</h6>
                                        </div>
                                        <div class="d-flex justify-content-start bg-light m-1">
                                            <h6>ASAL &emsp;: &emsp; &emsp; {{ $suratMasuk->surat_dari }}</h6>
                                        </div>
                                    </div>
                                  </div>
                                  <hr style="border: 1px solid black">
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <div class="d-flex justify-content-start bg-light">
                                    <div class="intruksi-terusan">
                                        <div class="m-1" style="display: flex; justify-content: between;">
                                            <h6>INSTRUKSI/INFORMASI <b style="color: white">SPASI</b>: <b style="color: white">SPASI</b>Lanjutkan</h6>
                                        </div>
                                        <div class="d-flex justify-content-between m-1">
                                          <h6>TERUSAN &emsp; &emsp; &emsp;: &emsp; &emsp;
                                          <div class="terusan">
                                            <br>
                                            <ol>
                                                <li><h6>Yth. Kepala Dinas</h6></li>
                                                <li><h6>Yth. Sekertaris</h6></li>
                                            </ol>
                                          </div>
                                          </h6>
                                        </div>    
                                    </div>
                                </div>
                              </td> 
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script>
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh6U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>