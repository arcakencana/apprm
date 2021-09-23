@extends('layouts.main')
@section('title', 'Pasien')

@section('content') 

<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-plus-circle"></i> Tambah Pasien 
                </h6>
            </div>
            <div class="card-body">
                <form>
                  <div class="form-group">
                    <input type="text" name="no_nik" class="form-control" placeholder="Nomor NIK">
                </div>
                <div class="form-group">
                    <input type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota">
                </div>
                <div class="form-group">
                    <input type="text" name="nama_kk" class="form-control" placeholder="Nama KK">
                </div>
                <div class="form-group">
                    <input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telpon">
                </div>
                <div class="form-group">
                    <input type="text" name="no_bpjs" class="form-control" placeholder="Nomor BPJS">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nomor RM Lama">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

@push('scripts')

@endpush