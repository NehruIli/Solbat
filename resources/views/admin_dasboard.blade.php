<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Solbat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>help@solbat.my.id</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <!-- <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a> -->
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <!-- <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><img src="{{asset('img/solbat.png')}}" width="55" height="55" alt=""></i>Solbat</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">

                @auth
                  <!-- Large button groups (default and split) -->
                  <div class="btn-group">

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="/profile" class="dropdown-item">Profil</a></li>
                        <li><a href="{{route('logout')}}" class="dropdown-item">Logout</a></li>
                    </ul>
                  </div>

                @else
                <a href="{{route('login')}}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
                @endauth

            </div>
        </nav>
    </div>
    <!-- Navbar End -->


<br>
<br>
<div class="container-lg">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"><h2>Spesialisasi<b></b></h2></div>
                <div class="col-sm-4">
                    <a href="{{route('make_spesialisasi')}}"" type="button" class="btn btn-info add-new"><i class="fa fa-plus" "></i> New</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Spesialisasi</th>
                    <th>Tingkatan</th>
                    <th>Deskripsi Singkat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spesialisasi as $s)
                <tr>
                    <td>{{$s->nama_spesialisasi}}</td>
                    <td>{{$s->tingkatan}}</td>
                    <td>{{$s->deskripsi_singkat}}</td>
                    <td>
                        <a href="/edit_spesialisasi"class="edit btn" title="Edit" data-toggle="tooltip"{{$s->spesialisasi_id}}"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete btn" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>
<br>
<div class="container-lg">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"><h2>Pesan Dari User<b></b></h2></div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Subjek</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $c)
                <tr>
                    <td>{{$c->nama}}</td>
                    <td>{{$c->subject}}</td>
                    <td>{{$c->message}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Riwayat Total Bantuan<b></b></h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                    <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Bantuan</th>
                        <th>Durasi</th>
                        <th>Jenis Bantuan</th>
                        <th>Biaya</th>
                        <th>Nama Penerima</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="text-center justify-content-center" >

                    @foreach ($bantuan as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$b->bantuan}}</td>
                        <td>{{$b->durasi}} {{$b->jenis_durasi}}</td>
                        <td>{{$b->jenis_bantuan}}</td>
                        <td>Rp. {{$b->biaya}}</td>
                        <td>{{$b->user->nama_depan}}</td>
                        <td>{{$b->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Riwayat Bantuan Bulanan<b></b></h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                    <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Waktu</th>
                        <th>Nama Bantuan</th>
                        <th>Durasi</th>
                        <th>Jenis Bantuan</th>
                        <th>Biaya</th>
                        <th>Nama Penerima</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="text-center justify-content-center" >

                    @foreach ($bulanan as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$b->created_at}}</td>
                        <td>{{$b->bantuan}}</td>
                        <td>{{$b->durasi}} {{$b->jenis_durasi}}</td>
                        <td>{{$b->jenis_bantuan}}</td>
                        <td>Rp. {{$b->biaya}}</td>
                        <td>{{$b->user->nama_depan}}</td>
                        <td>{{$b->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Riwayat Bantuan Harian<b></b></h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                    <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Waktu</th>
                        <th>Nama Bantuan</th>
                        <th>Durasi</th>
                        <th>Jenis Bantuan</th>
                        <th>Biaya</th>
                        <th>Nama Penerima</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="text-center justify-content-center" >

                    @foreach ($harian as $h)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$h->created_at}}</td>
                        <td>{{$h->bantuan}}</td>
                        <td>{{$h->durasi}} {{$b->jenis_durasi}}</td>
                        <td>{{$h->jenis_bantuan}}</td>
                        <td>Rp. {{$h->biaya}}</td>
                        <td>{{$h->user->nama_depan}}</td>
                        <td>{{$h->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>



    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><img src="{{asset('img/solbat.png')}}" width="55" height="55"></i>Solbat</h1>
                    </a>
                    <h3 class="text-white mb-4">Help Anytime and Anywhere</h3>
                </div>
                <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">Suggestion Box</h3>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 30px;"
                                placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Gresik, Indonesia</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope mr-2"></i>help@solbat.my.id</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <!-- <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a> -->
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Our Help</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Vehicle</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Electronic Device</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Electricity</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Teach</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Food</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-white-50 mb-2" href="about.html"><i class="fa fa-angle-right mr-2"></i>About</a>
                        <a class="text-white-50 mb-2" href="course.html"><i class="fa fa-angle-right mr-2"></i>Course</a>
                        <a class="text-white-50 mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Pages</a>
                        <a class="text-white-50" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; <a class="text-white" href="#">Solbat</a>. All Rights
                        Reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0">Designed by <a class="text-white" href="https://htmlcodex.com">Nehru & Ifal</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
