@extends('layout')

@section('content')

<div class="card">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Riwayat Bantuan<b></b></h2></div>
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
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody class="text-center justify-content-center" >
                    @foreach ($penawaran as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$b->bantuan->bantuan}}</td>
                        <td>{{$b->bantuan->durasi}} {{$b->bantuan->jenis_durasi}}</td>
                        <td>{{$b->bantuan->jenis_bantuan}}</td>
                        <td>Rp. {{$b->bantuan->biaya}}</td>
                        <td>{{$b->user->nama_depan}}</td>
                        <td>{{$b->status}}</td>

                        @php
                        $r = App\Models\Rating::where('bantuan_id',$b->bantuan_id)->where('user_id', $b->user->user_id)->count();
                        @endphp

                        @if($r == 0)
                            <td>
                                <form action="{{ route('ratings.store') }}" method="POST">
                                @csrf
                                    <input type="hidden" name="id" value="{{$b->user->user_id}}">
                                    <div class="form-group">
                                        <label for="rating">Rating : </label>
                                        <select name="rating" id="rating" class="form-control">
                                            <option value="1">1 ⭐</option>
                                            <option value="2">2 ⭐</option>
                                            <option value="3">3 ⭐</option>
                                            <option value="4">4 ⭐</option>
                                            <option value="5">5 ⭐</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Beri Rating</button>
                                </form>
                            </td>
                        @else
                        <td>{{$b->user->rating}} ⭐</td>
                        @endif


                    </tr>
                    @endforeach

                    {{-- @foreach ($bantuan as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$b->bantuan}}</td>
                        <td>{{$b->durasi}} {{$b->jenis_durasi}}</td>
                        <td>{{$b->jenis_bantuan}}</td>
                        <td>Rp. {{$b->biaya}}</td>
                        <td>{{$b->user->nama_depan}}</td>
                        <td>{{$b->status}}</td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
            <br>
        </div>
    </div>

</div>
<div class="card">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Riwayat Penawaran<b></b></h2></div>
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
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>

</div>


@endsection
