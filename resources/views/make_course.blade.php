@extends('layout')

@section('content')



<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Bantuan</h3></div>
                                    <div class="card-body">
                                       @if(session()->has('errors'))
                                       @foreach(session('errors')->all() as $e)
                                       <p>{{$e}}</p>
                                       @endforeach
                                       @endif
                                        <form method="post" action="{{ route('submit') }}" enctype='multipart/form-data'>
                                             @csrf
                                             <div class="form-floating mb-3">
                                                <input class="form-control" id="bantuan" type="text" minlength="3" maxlength="30" placeholder="Masukkan nama bantuan" name="bantuan" />
                                                <label for="bantuan">Nama Bantuan</label>
                                            </div>
                                            <select class="form-select mb-3" aria-label="Default select example" name="jenis_bantuan">
                                                <option selected>Pilih jenis bantuan anda</option>
                                                <option value="Otomotif">Otomotif</option>
                                                <option value="Alat Elektronik">Alat Elektronik</option>
                                                <option value="Properti">Properti</option>
                                                <option value="Pekerjaan Fisik">Pekerjaan Fisik</option>
                                                <option value="Mengajar">Mengajar</option>
                                                <option value="Makanan & Minuman">Makanan & Minuman</option>
                                                <option value="Konveksi">Konveksi</option>
                                                <option value="Lain">Lain</option>
                                          </select>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="detail_bantuan" type="text" minlength="12" maxlength="255" placeholder="Masukkan detail dari bantuan anda" name="detail_bantuan" ></textarea>
                                                <label for="detail_bantuan">Detail Bantuan</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="durasi" type="number" placeholder="Masukkan durasi" name="durasi"/>
                                                        <label for="durasi">Durasi Bantuan</label>
                                                    </div>
                                                </div>
                                                <div class='col-md-6'>
                                                   <select class="form-select mb-3 h-100" style='' aria-label="Default select example" name="jenis_durasi">
                                                      <option selected>Jenis Durasi</option>
                                                      <option value="Menit">Menit</option>
                                                      <option value="Jam">Jam</option>
                                                      <option value="Hari">Hari</option>
                                                      <option value="Minggu">Minggu</option>
                                                      <option value="Bulan">Bulan</option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="biaya" type="number" maxlength="100" placeholder="Masukkan biaya" name="biaya" />
                                                <label for="biaya">Biaya</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="almt_bantuan" type="text" minlength="12" maxlength="255" placeholder="Masukkan alamat detail bantuan" name="almt_bantuan" ></textarea>
                                                <label for="alamat">Alamat Bantuan</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="img_bantuan" type="file" placeholder="Masukkan gambar" name="img_bantuan" />
                                                <label for="img_bantuan">Gambar Bantuan</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Buat Bantuan</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>








@endsection
