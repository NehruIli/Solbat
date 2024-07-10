@extends('layout')

@section('content')

<div class="card">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Approval<b></b></h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                    <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Bantuan</th>
                        <th>Pemberi Bantuan</th>
                        <th>Biaya Awal</th>
                        <th>Tawaran Biaya</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody class="text-center justify-content-center" >

                    @foreach ($penawaran as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$b->bantuan->bantuan}}</td>
                        <td>{{$b->user->nama_depan}} {{$b->user->nama_belakang}}</td>
                        <td>Rp. {{$b->bantuan->biaya}}</td>
                        <td>Rp. {{$b->biaya_penawaran}}</td>
                        <td>{{$b->status}}</td>
                        <td>
                            <form action="{{route('approved', $b->penawaran_bantuan_id)}}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">✅</button>
                            </form>
                            <form action="{{route('reject', $b->penawaran_bantuan_id)}}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger">❌</button>
                            </form>
                            {{-- <a href="#" class="btn btn-danger">😒</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
