@extends('layouts.main')
@section('title', 'Pasien')

@section('content') 

<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Pasien 
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ url('/pasien', ['id' => Crypt::encryptString($pasien->no_rm)]) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No NIK</label>
                        <div class="col-sm-9">
                            <input type="text" name="no_nik" value="{{ $pasien->no_nik }}" class="form-control @error('no_nik') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Anggota</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_anggota" value="{{ $pasien->nama_anggota }}" class="form-control @error('nama_anggota') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama KK</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_kk" value="{{ $pasien->nama_kk }}" class="form-control @error('nama_kk') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" name="tgl_lahir" id="datepicker" value="{{ $pasien->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" name="alamat" value="{{ $pasien->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Telpon</label>
                        <div class="col-sm-9">
                            <input type="text" name="no_telp" value="{{ $pasien->no_telp }}" class="form-control @error('no_telp') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor BPJS</label>
                        <div class="col-sm-9">
                            <input type="text" name="no_bpjs" value="{{ $pasien->no_bpjs }}" class="form-control @error('no_bpjs') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor RM Lama</label>
                        <div class="col-sm-9">
                            <input type="text" name="no_rm_lama" value="{{ $pasien->no_rm_lama }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
</script>
@endpush