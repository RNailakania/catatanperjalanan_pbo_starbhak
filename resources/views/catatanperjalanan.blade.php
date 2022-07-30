@extends('layout.main')
@section('judul', 'Catatan Perjalanan')
@section('isi')
<div class="container">
<div class="row justify-content-center">
    <div class="col-11">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Catatan Perjalanan</h1>
                {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif --}}

                <a href="{{ route('create') }}" class="btn btn-success mb-4">Tambah</a>

                {{-- table --}}

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Suhu Tubuh</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $catatanperjalanan as $item )
                         <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->created_at->isoFormat('MM/DD/YYYY'); }}</td>
                        <td>{{ $item->created_at->isoFormat('hh:mm:ss'); }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->suhutubuh }}</td>
                      </tr>   
                        @endforeach
                      
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
</div>
</div>
@endsection