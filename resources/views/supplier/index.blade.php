@extends('_layouts.app')

@section('title', 'Supplier')

@section('content')

    <h1 class="title-1 mb-3">Supplier</h1>
	
	@if (session('success'))
		<div class="alert alert-success alert-dismissible">
			{{ session('success') }}
			<button class="close" data-dismiss="alert">&times;</button>
		</div>
	@endif

	<div id="alert"></div>

	<div class="card">
		<div class="card-header overview-wrap">
			<h2 class="card-title title-5 mb-0">Data Supplier</h2>
			<div>
				<a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">Tambah Supplier</a>
				<a href="{{ route('supplier.print') }}" class="btn btn-warning btn-sm">Cetak PDF</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Telepon</th>
						<th>Alamat</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>


@endsection

@push('footer')
	<div class="modal">
	<div class="modal-dialog">
	<div class="modal-content">
		<form method="post">
			@csrf
			@method('PUT')
			<div class="modal-header">
				<h5 class="modal-title">Edit Data</h5>
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="name" placeholder="Nama" autofocus>

					<span class="invalid-feedback"></span>
				</div>
				<div class="form-group">
					<label>No Telelpon</label>
					<input type="number" class="form-control" name="phone" placeholder="No Telelpon">
					
					<span class="invalid-feedback"></span>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea rows="3" class="form-control" name="address" placeholder="Alamat"></textarea>
					
					<span class="invalid-feedback"></span>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button class="btn btn-primary" type="submit">Simpan</button>
			</div>
		</form>
	</div>
	</div>
	</div>
@endpush

@push('css')
	<link rel="stylesheet" href="{{ asset('cool-admin/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('js')
	<script src="{{ asset('cool-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('cool-admin/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script>
		const ajaxUrl = '{{ route('supplier.datatables') }}'
		const updateUrl = '{{ route('supplier.update', ':id') }}'
		const deleteUrl = '{{ route('supplier.destroy', ':id') }}'
		const token = '{{ csrf_token() }}'
	</script>
	<script src="{{ asset('js/supplier.js') }}"></script>
Teleponscript src="{{ asset('js/supplier.js') }}"></script>
Alamatscript src="{{ asset('js/supplier.js') }}"></script>
@endpush