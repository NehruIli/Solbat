@extends('layout')

@section('content')

<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset('storage/'.Auth::user()->img_user)}}" alt="User" class="rounded-circle" width="150" height="200">
                    <div class="mt-3">
                        <p class="text-muted mb-1">{{Auth::user()->nama_depan . ' '. Auth::user()->nama_belakang}}</p>
                        <p class="text-muted mb-1">{{Auth::user()->pekerjaan}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <br>

            </div>
           <div class="col-md-8">
                <div class="card mb-3">
                  <form action="{{route('submit_profile', Auth::user()->user_id)}}" method="post"><div class="card-body">
                  @csrf
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Name Lengkap</h6>
                      </div>
                      <div class="col-sm-9 text-muted">
                        {{Auth::user()->nama_depan . ' '. Auth::user()->nama_belakang}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-muted">
                        {{Auth::user()->email}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nomer Handphone</h6>
                      </div>
                      <div class="col-sm-9 text-muted">
                          <input class="form-control" id="no_telepon" type="text" placeholder="Masukkan kemampuan anda secara detail." name="no_telepon" value="{{Auth::user()->no_telepon}}">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Alamat</h6>
                      </div>
                      <div class="col-sm-9 text-muted">
                        {{-- {{Auth::user()->alamat}} --}}
                        <input class="form-control" id="alamat" type="text" placeholder="Masukkan kemampuan anda secara detail." name="alamat" value="{{Auth::user()->alamat}}">
                      </div>
                    </div>
                    <hr>
                    @if (Auth::user()->kemampuan_detail != null)

                    <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Kemampuan Detail</h6>
                        </div>
                        <div class="col-sm-9 text-muted">
                            <textarea class="form-control" id="kemampuan_detail" type="textarea" placeholder="Masukkan kemampuan anda secara detail." name="kemampuan_detail">{{Auth::user()->kemampuan_detail}}</textarea>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Kemampuan Detail</h6>
                        </div>
                        <div class="col-sm-9 text-muted">
                            <textarea class="form-control" id="kemampuan_detail" type="textarea" placeholder="Masukkan kemampuan anda secara detail." name="kemampuan_detail"></textarea>
                        </div>
                    </div>

                    @endif
                    <hr>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-info add-new" >Submit</button>
                  </div></form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8"><h2>Spesialisasi<b></b></h2></div>
                                    <div class="col-sm-4 mt-2">
                                        <a href="{{route('make_spesialisasi')}}"" type="button" class="btn btn-info add-new"><i class="fa fa-plus" "></i> New</a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Spesialisasi</th>
                                        <th>Tingkatan</th>
                                        <th>Deskripsi Singkat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center justify-content-center" >

                                    @foreach ($spesialisasi as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$s->nama_spesialisasi}}</td>
                                        <td>{{$s->tingkatan}}</td>
                                        <td>{{$s->deskripsi_singkat}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{route('spesialisasi.edit', $s->spesialisasi_id)}}" class="edit btn" title="Edit" data-toggle="tooltip">✏️</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <form action="{{route('spesialisasi.destroy', $s->spesialisasi_id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="delete btn">🗑️</button>
                                                    </form>
                                                </div>
                                            </div>
                                                {{-- <a class="delete btn" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <br>



                        </div>
                    </div>
                </div>

                <br>


            </div>
        </div>
      </div>
    </div>
  </div>


              </div>
          </div>

        </div>
    </div>
@endsection
