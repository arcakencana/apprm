@extends('layouts.main')
@section('title', 'Dashboard')

@section('content') 

<div class="row">
	<div class="col-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">
					<a href="{{ url('pasien/create') }}" class="btn btn-primary btn-sm">
						<i class="fas fa-plus-circle"></i> Tambah
					</a>
				</h6>
			</div>
			<div class="card-body">
				<form action="" method="get">
					<div class="form-group row">	
						<div class="col-sm-5">
							<input type="text" name="search" class="form-control" placeholder="Search..." autocomplete="off">
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary btn-sm">
								<i class="fa fa-search"></i> Cari
							</button>
						</div>
					</div>
				</form> 
				<div class="table-responsive">
					<table class="table table-bordered" style="font-size: 12px;">
						<thead>
							<tr>
								<th>No RM</th>
								<th>RM Lama</th>
								<th>Nama KK</th>
								<th>Nama Anggota</th>
								<th>Tanggal Lahir</th>
								<th>Alamat</th>
								<th>No BPJS</th>
								<th>No Telpon</th>
								<th>NIK</th>
								<th>#</th>
							</tr>
						</thead>

						<tbody>
							@foreach($pasien as $data)
							<tr>
								<td>{{ $data->no_rm }}</td>
								<td>{{ $data->no_rm_lama }}</td>
								<td>{{ $data->nama_kk }}</td>
								<td>{{ $data->nama_anggota }}</td>
								<td>{{ date('d-m-Y', strtotime($data->tgl_lahir)) }}</td>
								<td>{{ $data->alamat }}</td>
								<td>{{ $data->no_bpjs }}</td>
								<td>{{ $data->no_telp }}</td>
								<td>{{ $data->no_nik }}</td>
								<td>
									<div class="d-inline-flex">
										<a href="{{ url('/pasien', ['id' => Crypt::encryptString($data->no_rm)]).'/edit' }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>&nbsp;
										<form action="{{ url('/pasien', ['id' => Crypt::encryptString($data->no_rm)]) }}" method="post">
											@csrf
											@method('delete')

											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm Delete...')"><i class="fas fa-trash"></i> Delete</button>
										</form>
									</div>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
			{{ $pasien->appends(['select' => $select])->links() }}
		</div>
	</div>
</div>
</div>

@endsection

@push('scripts')
<script>
      //alert
      $(".alert").delay(3000).slideUp(400, function() {
      	$(this).alert('close');
      });
</script>
@endpush