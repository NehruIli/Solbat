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
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Spesialisasi Anda</h3></div>
                                <div class="card-body">
                                   @if(session()->has('errors'))
                                   @foreach(session('errors')->all() as $e)
                                   <p>{{$e}}</p>
                                   @endforeach
                                   @endif
                                    <form method="post" action="{{ route('spesialisasi.update',$spesialis->id) }}">
                                         @csrf
                                         @method('put')
                                         <div class="form-floating mb-3">
                                            <input class="form-control" id="bantuan" type="text"placeholder="Masukkan namma spesialisasi" name="nama_spesialisasi" />
                                            <label for="bantuan">Nama Spesialisasi</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="bantuan" type="text"placeholder="Masukkan tingkatan" name="tingkatan" />
                                            <label for="bantuan">Tingkatan</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="deskripsi_singkat" type="text" minlength="12" maxlength="255" placeholder="Masukkan alamat detail bantuan" name="deskripsi_singkat" ></textarea>
                                            <label for="deskripsi_singkat">Deskripsi Singkat</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Buat Spesialisasi</button></div>
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
