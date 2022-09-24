<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">Catatan Perjalanan</div>
                    <div class="card-body">
                        {{-- updatenya --}}
                        <form action="{{ url('catatanperjalanan',$catatanperjalanan->id) }}" method="get">
                            {{ csrf_field() }}
                            @method ('PUT')
                            <div class="form-grup">
                                <div class="row g-2">
                                    <div class="col-md">
                                        <label class="form-label">Lokasi</label>
                                            <input type="text" class="form-control" name="lokasi" placeholder="Input Lokasi In Here" value="{{ $catatanperjalanan->lokasi }}">
                                            @error('lokasi')
                                            <div class="text-warning">{{ $message }}</div>
                                            @enderror
                                    </div>
                    
                                    <div class="col-md">
                                            <label class="form-label">Suhu Tubuh</label>
                                            <input type="text" class="form-control" name="suhutubuh" placeholder="Input Suhu Tubuh In Here" value="{{ $catatanperjalanan->suhutubuh }}">
                                            @error('suhutubuh')
                                            <div class="text-warning">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success mt-3 mb-3">Update</button>
                            </div>
                        </form>
                        {{-- end update --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>