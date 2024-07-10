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
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Penawaran</h3></div>
                                <div class="card-body">
                                   @if(session()->has('errors'))
                                   @foreach(session('errors')->all() as $e)
                                   <p>{{$e}}</p>
                                   @endforeach
                                   @endif
                                    <form method="post" action="{{ route('submit_penawaran') }}" enctype='multipart/form-data'>
                                         @csrf
                                         <input type="hidden" name="bantuan_id" value='{{$data->bantuan_id}}'>
                                         <div class="form-floating mb-3">
                                            <input class="form-control" id="bantuan" type="text" minlength="3" maxlength="30" placeholder="Masukkan nama bantuan" name="nama" value="{{$data->bantuan}}" />
                                            <label for="bantuan">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="bantuan" type="text" minlength="3" maxlength="30" placeholder="Masukkan nama bantuan" name="nama" value="{{$data->biaya}}" />
                                            <label for="bantuan">Biaya Awal</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="biaya" type="number" maxlength="100" placeholder="Masukkan biaya" name="biaya_penawaran" />
                                            <label for="biaya">Penawaran Biaya</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Buat Penawaran</button></div>
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
