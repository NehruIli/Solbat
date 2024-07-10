@extends('layout')

@section('content')

<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset('storage/'.$agent->img_user)}}" alt="User" class="rounded-circle" width="150" height="200">
                    <div class="mt-3">
                        <p class="text-muted mb-1">{{$agent->nama_depan . ' '. $agent->nama_belakang}}</p>
                        <p class="text-muted mb-1">{{$agent->pekerjaan}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <br>

            </div>
           <div class="col-md-8">
                <div class="card mb-3">
                  <form action="{{route('submit_profile', $agent->user_id)}}" method="post"><div class="card-body">
                  @csrf
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Name Lengkap</h6>
                      </div>
                      <div class="col-sm-9 text-muted">
                        {{$agent->nama_depan . ' '. $agent->nama_belakang}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-muted">
                        {{$agent->email}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nomer Handphone</h6>
                      </div>
                      <div class="col-sm-9 text-muted">
                          {{$agent->no_telepon}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Alamat</h6>
                      </div>
                      <div class="col-sm-9 text-muted">
                        {{-- {{Auth::user()->alamat}} --}}
                        {{$agent->alamat}}
                      </div>
                    </div>
                    <hr>
                    @if ($agent->kemampuan_detail != null)

                    <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Kemampuan Detail</h6>
                        </div>
                        <div class="col-sm-9 text-muted">
                            {{$agent->kemampuan_detail}}
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
                    </form>
                  </div>
                </div>
                <br>
                <div class="container-lg">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8"><h2>Spesialisasi<b></b></h2></div>

                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Spesialisasi</th>
                                        <th>Tingkatan</th>
                                        <th>Deskripsi Singkat</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($spesialisasi as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$s->nama_spesialisasi}}</td>
                                        <td>{{$s->tingkatan}}</td>
                                        <td>{{$s->deskripsi_singkat}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

              </div>
          </div>

        </div>
    </div>
@endsection



