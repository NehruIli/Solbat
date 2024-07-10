@extends('layout')

@section('content')


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Course</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{route('welcome')}}">Beranda</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Course</p>
            </div>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <form action="/course">
                    <div class="input-group">
                        <!-- <div class="input-group-prepend">
                            <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Courses 1</a>
                                <a class="dropdown-item" href="#">Courses 2</a>
                                <a class="dropdown-item" href="#">Courses 3</a>
                            </div>
                        </div> -->
                        <input type="text" class="form-control border-light" style="padding: 30px 25px;"
                            placeholder="Keyword" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-secondary px-4 px-lg-5"type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('spesialisasi.filter') }}" method="GET">
                    @csrf
                    {{-- <div class="input-group mb-3">
                        <select class="form-select" name="spesialisasi_id" aria-label="Filter Spesialisasi">
                            <option value="">Semua Spesialisasi</option>
                            @foreach ($spesialisasi as $spes)
                                <option value="{{ $spes->spesialisasi_id }}">{{ $spes->nama_spesialisasi }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-secondary" type="submit">Filter</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

    <br>
    <br>
    <!-- Header End -->

    <div class="container-fluid bg-image py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="section-title text-center position-relative mb-5">
                        <br>
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">BANTUAN & PENAWARAN</h6>
                        <h1 class="display-4">Buat Bantuan dan Penawaran Anda</h1>
                        <p class="lead fw-normal text-black-50 mb-4">Segera buat bantuan dan  penawaran anda secepatnya, bantu mereka yang membutuhkan pertolongan!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-center">
                            <a class="justify-content btn btn-primary btn-lg px-4 me-sm-3" href="/make_course">Buat Bantuan</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- Courses Start -->
    @if ($data != null)
    <div class="container-fluid ">
        <div class="container ">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Help</h6>
                        <h1 class="display-4">Check Out Our Help New Releases</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($data as $d)
                <div class="card ms-3 fixed-card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('storage/'.$d->img_bantuan)}}" alt="Card image cap" ">
                    <div class="card-body">
                      <h5 class="card-title">{{$d->bantuan}}</h5>
                      <p class="card-text">{{$d->detail_bantuan}}</p>
                      <a href="/make_penawaran/{{$d->bantuan_id}}" class="btn btn-primary mb-1">Buat Penawaran</a>
                      <a href="/cekDetail/{{$d->bantuan_id}}" class="btn btn-primary">Detail Bantuan</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Courses End -->

@endsection
