@extends('_layouts.app')

@section('title', 'Barang')

@section('content')

    <h1 class="title-1 mb-3">Barang</h1>
	
	@if (session('success'))
		<div class="alert alert-success alert-dismissible">
			{{ session('success') }}
			<button class="close" data-dismiss="alert">&times;</button>
		</div>
	@endif

	<div id="alert"></div>
	
	<div class="card">
		<div class="card-header overview-wrap">
			<h2 class="card-title title-5 mb-0">Data Barang</h2>
			<a href="{{ route('stuff.create') }}" class="btn btn-primary btn-sm">Tambah Barang</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Kondisi</th>
						<th>Jumlah</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

@endsection

@push('css')
	<link rel="stylesheet" href="{{ asset('cool-admin/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('js')
	<script src="{{ asset('cool-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('cool-admin/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script>
		const ajaxUrl = '{{ route('stuff.datatables') }}'
		const deleteUrl = '{{ route('stuff.destroy', ':id') }}'
		const csrf = '{{ csrf_token() }}'
	</script>
	<script src="{{ asset('js/stuff.js') }}"></script>
@endpush