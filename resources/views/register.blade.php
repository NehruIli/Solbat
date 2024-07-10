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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                                             @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="nama_depan"/>
                                                        <label for="inputFirstName">Nama Depan</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="nama_belakang"/>
                                                        <label for="inputLastName">Nama Belakang</label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" minlength="8" maxlength="30" placeholder="name@example.com" value="{{ old('email')}}" autofocus/>
                                                <label for="inputEmail">Alamat Email</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" name="password" minlength="8" maxlength="16" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" minlength="8" maxlength="16" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Konfirmasi Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputNID" type="text" minlength="12" maxlength="16" placeholder="Enter your NID" name="NIK" />
                                                <label for="inputNID">Nomer Induk Kependudukan</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputNumberHP" type="number" minlength="10" maxlength="16" placeholder="Enter number hanphone" name="no_telepon" />
                                                <label for="inputNumberHP">Nomer Handphone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="pekerjaan" type="text" placeholder="Masukkan nama perkerjaan" name="pekerjaan" />
                                                <label for="pekerjaan">Nama Pekerjaan</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputAddress" type="text" placeholder="Enter your address" name="alamat"/>
                                                <label for="inputAddress">Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="img_user" type="file" placeholder="Masukkan foto anda" name="img_user" />
                                                <label for="img_bantuan">Foto User</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('login')}}">Have an account? Go to login</a></div>
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
