@extends('layout')

@section('content')
    <div class="container">
        <h1>Tambah Spesialisasi</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('spesialisasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_spesialisasi" class="form-label">Nama Spesialisasi</label>
                <input type="text" class="form-control" id="nama_spesialisasi" name="nama_spesialisasi">
            </div>
            <div class="mb-3">
                <label for="tingkatan" class="form-label">Tingkatan</label>
                <input type="text" class="form-control" id="tingkatan" name="tingkatan">
            </div>
            <div class="mb-3">
                <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                <textarea class="form-control" id="deskripsi_singkat" name="deskripsi_singkat"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Spesialisasi</button>
        </form>
    </div>
@endsection
