@extends('layout.main')
@section('judul', 'Dashboard')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('catatanperjalanan') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" placeholder="Masukkan Lokasi" class="form-control" name="lokasi" required>
                @error('lokasi')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Suhu Tubuh</label>
                <input type="text" placeholder="Masukkan suhutubuh" class="form-control" name="suhutubuh" required>
                @error('suhutubuh')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection