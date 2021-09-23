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
                <form action="{{ url('/pasien') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>No NIK</label>
                        <input type="text" name="no_nik" value="{{ old('no_nik') }}" class="form-control @error('no_nik') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" name="nama_anggota" value="{{ old('nama_anggota') }}" class="form-control @error('nama_anggota') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label>Nama KK</label>
                        <input type="text" name="nama_kk" value="{{ old('nama_kk') }}" class="form-control @error('nama_kk') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control @error('tanggal_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telpon</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp') }}" class="form-control @error('no_telp') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label>Nomor BPJS</label>
                        <input type="text" name="no_bpjs" value="{{ old('no_bpjs') }}" class="form-control @error('no_bpjs') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label>Nomor RM Lama</label>
                        <input type="text" name="no_rm_lama" value="{{ old('no_rm_lama') }}" class="form-control">
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