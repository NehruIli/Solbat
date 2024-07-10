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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Spesialisasi</h3></div>
                                    <div class="card-body">
                                    @if(session()->has('errors'))
                                    @foreach(session('errors')->all() as $e)
                                    <p>{{$e}}</p>
                                    @endforeach
                                    @endif
                                        <form method="post" action="{{route('spesialisasi.update', $spesialisasi->spesialisasi_id)}}">
                                            @csrf
                                            @method('put')
                                            <select class="form-select mb-3" aria-label="Default select example" name="nama_spesialisasi">
                                                <option selected>{{ $spesialisasi->nama_spesialisasi }}</option>
                                                <option value="Otomotif" {{$spesialisasi->nama_spesialisasi == 'Otomotif' ? 'required' : ''}}>Otomotif</option>
                                                <option value="Alat Elektronik" {{$spesialisasi->nama_spesialisasi == 'Alat Elektronik' ? 'required' : ''}}>Alat Elektronik</option>
                                                <option value="Properti" {{$spesialisasi->nama_spesialisasi == 'Properti' ? 'required' : ''}}>Properti</option>
                                                <option value="Pekerjaan Fisik" {{$spesialisasi->nama_spesialisasi == 'Pekerjaan Fisik' ? 'required' : ''}}>Pekerjaan Fisik</option>
                                                <option value="Mengajar" {{$spesialisasi->nama_spesialisasi == 'Mengajar' ? 'required' : ''}}>Mengajar</option>
                                                <option value="Makanan & Minuman" {{$spesialisasi->nama_spesialisasi == 'Makanan & Minuman' ? 'required' : ''}}>Makanan & Minuman</option>
                                                <option value="Konveksi" {{$spesialisasi->nama_spesialisasi == 'Konveksi' ? 'required' : ''}}>Konveksi</option>
                                                <option value="Lain" {{$spesialisasi->nama_spesialisasi == 'Lain' ? 'required' : ''}}>Lain</option>
                                            </select>
                                            <select class="form-select mb-3" aria-label="Default select example" name="tingkatan">
                                                <option selected>{{ $spesialisasi->tingkatan }}</option>
                                                <option value="Pemula" {{$spesialisasi->tingkatan == 'Pemula' ? 'required' : ''}}>Pemula</option>
                                                <option value="Menengah" {{$spesialisasi->tingkatan == 'Menengah' ? 'required' : ''}}>Menengah</option>
                                                <option value="Profesional" {{$spesialisasi->tingkatan == 'Profesional' ? 'required' : ''}}>Profesional</option>
                                            </select>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="deskripsi_singkat" type="text" minlength="12" maxlength="255" placeholder="Masukkan alamat detail bantuan"
                                                name="deskripsi_singkat" >{{ $spesialisasi->deskripsi_singkat }}</textarea>
                                                <label for="deskripsi_singkat">Deskripsi Singkat</label>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="/profile" type="button" class="btn btn-secondary  data-bs-dismiss="modal">Keluar</a>
                                                <button type="submit" class="btn btn-primary ms-3">Simpan</button>
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

    </body>

@endsection
