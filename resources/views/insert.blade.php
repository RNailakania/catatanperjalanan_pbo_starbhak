@extends('layout.main')
@section('judul', 'Tambah Catatan Perjalanan')
@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('simpan') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row g-2 mb-4">
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="Lokasi" placeholder="Lokasi">     
                            @error('Lokasi')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
  
                                <label for="floatingInputGrid">Lokasi</label>
                              </div>
  
                            </div>
                            <div class="col-md">
                              <div class="form-floating">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" name="suhutubuh" placeholder="Suhu Tubuh">
                                    
                                    @error('suhutubuh')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
          
                                    <label for="floatingInputGrid">Suhu Tubuh</label>
                                  </div>
                              </div>
                            </div>
                          </div>
  
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection