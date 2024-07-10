@extends('layout')

@section('content')
    <div class="container mt-4">
        <h5><b>History Permintaan Bantuan</b></h5>
        <div class="row mt-2">
            <div class="col">
                <div class="table-main table-hover table-responsive">
                    <table class="table border-0" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>Nama Bantuan</th>
                                <th>Durasi</th>
                                <th>Jenis Bantuan</th>
                                <th>Biaya</th>
                                <th>tanggal pesan</th>
                                <th>Status</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bantuan as $b)
                                <tr>
                                    <td>{{$b->bantuan}}</td>
                                    <td>{{$b->durasi}} {{$b->jenis_durasi}}</td>
                                    <td>{{$b->jenis_bantuan}}</td>
                                    <td>Rp. {{$b->biaya}}</td>
                                    <td>{{$i->created_at}}</td>

                                    <td>
                                        @if ($i->status == 'diterima')
                                            <span class="badge badge-success">{{ $b->status }}</span>
                                        @elseif ($i->status == 'inprocess')
                                            <span class="badge badge-warning">{{ $b->status }}</span>
                                        @elseif ($i->status == 'cancel')
                                            <span class="badge badge-danger">{{ $b->status }}</span>
                                        @endif
                                    </td>

                                    @if ($b->status == 'diterima')
                                        <td colspan="2">
                                            <span class="btn btn-success">{{ $b->status }}</span>
                                        </td>
                                    @elseif ($b->status == 'cancel')
                                        <td colspan="2">
                                            <span class="btn btn-danger">{{ $b->status }}</span>
                                        </td>
                                    @elseif ($b->status == 'inprocess')
                                        <td>
                                            <a class="badge badge-success" href="{{ route('diterima', $b->bantuan_id) }}"><i
                                                    class="bi bi-check2-square"></i></a>
                                        </td>
                                        <td>
                                            <a class="badge badge-danger" href="{{ route('cancel', $b->bantuan_id) }}">
                                                <i class='bi bi-x-lg'></i>
                                            </a>
                                        </td>
                                    @endif

                                    {{-- <td>
                                        <a class="badge badge-danger" href="{{ route('batal', $i->id_pesanan) }}">
                                            <i class='bi bi-x-lg'></i>
                                        </a>
                                    </td> --}}
                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
