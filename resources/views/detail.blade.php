@extends('layout')

@section('content')


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Help Detail</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="/welcome">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Help Detail</p>
            </div>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
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
                        placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Detail Bantuan
                            </h6>
                            <h1 class="display-4">Detail Bantuan</h1>
                        </div>
                        <img class="img-fluid rounded w-100 mb-4" src="{{asset('storage/'.$data->img_bantuan)}}" alt="Image">
                        <h2>{{$data->bantuan}}</h2>
                        <p>{{$data->detail_bantuan}}</p>
                    </div>


                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">Help Detail</h3>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Ask for help</h6>
                            <h6 class="text-white my-3">{{$data->bantuan}}</h6>
                        </div>
                       <!-- <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Rating</h6>
                            <h6 class="text-white my-3">4.5 <small>(250)</small></h6>
                        </div>
                         <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Lectures</h6>
                            <h6 class="text-white my-3">15</h6>
                        </div> -->
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Durasi</h6>
                            <h6 class="text-white my-3">{{$data->durasi}} {{$data->jenis_durasi}}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Jenis Bantuan</h6>
                            <h6 class="text-white my-3">{{$data->jenis_bantuan}}</h6>
                        </div>
                        <!-- <div class="d-flex justify-content-between px-4">
                            <h6 class="text-white my-3">Details : </h6>
                            <h6 class="text-white my-3">Lampu putus, dan ukurannya sangat besar</h6>
                        </div> -->
                        <h5 class="text-white py-3 px-4 m-0">Biaya Bantuan : Rp {{$data->biaya}},-</h5>
                        <div class="py-3 px-4">
                            <a class="btn btn-block btn-secondary py-3 px-5" href="/make_penawaran/{{$data->bantuan_id }}">Bantu Sekarang</a>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h2 class="mb-3">Categories</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Vehicle</a>
                                <span class="badge badge-primary badge-pill">150</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Electronic Device</a>
                                <span class="badge badge-primary badge-pill">131</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Electricity</a>
                                <span class="badge badge-primary badge-pill">78</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Teach</a>
                                <span class="badge badge-primary badge-pill">24</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Food</a>
                                <span class="badge badge-primary badge-pill">16</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h2 class="mb-4">Recent Help Need</h2>
                        <a class="d-flex align-items-center text-decoration-none mb-4" href="">
                            <img class="img-fluid rounded" src="img/repair1.jpg" alt="">
                            <div class="pl-3">
                                <h6>Reparasi Mesin Motor</h6>
                                <div class="d-flex">
                                    <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>Chris
                                        Hemsworth</small>
                                    <!-- <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5
                                        (250)</small> -->
                                </div>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none mb-4" href="">
                            <img class="img-fluid rounded" src="img/repair1.jpg" alt="">
                            <div class="pl-3">
                                <h6>Reparasi Mesin Motor</h6>
                                <div class="d-flex">
                                    <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>Chris
                                        Hemsworth</small>
                                    <!-- <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5
                                        (250)</small> -->
                                </div>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none mb-4" href="">
                            <img class="img-fluid rounded" src="img/repair1.jpg" alt="">
                            <div class="pl-3">
                                <h6>Reparasi Mesin Motor</h6>
                                <div class="d-flex">
                                    <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>Chris
                                        Hemsworth</small>
                                    <!-- <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5
                                        (250)</small> -->
                                </div>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none mb-4" href="">
                            <img class="img-fluid rounded" src="img/repair1.jpg" alt="">
                            <div class="pl-3">
                                <h6>Reparasi Mesin Motor</h6>
                                <div class="d-flex">
                                    <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>Chris
                                        Hemsworth</small>
                                    <!-- <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5
                                        (250)</small> -->
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->


    <!-- Footer Start -->
    <!-- Contact Start -->
        <!-- Contact End -->


@endsection
