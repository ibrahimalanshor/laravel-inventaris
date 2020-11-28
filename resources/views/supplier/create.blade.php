@extends('_layouts.app')

@section('title', 'Tambah Supplier')

@section('content')
	
	<div class="col-sm-7 mx-auto">
		<div class="card">
		<form action="{{ route('supplier.store') }}" method="post">
			@csrf
			<div class="card-header">
				<h2 class="card-title title-5 mb-0">Tambah Supplier</h2>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ old('name') }}" autofocus>

					@error('name')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>No Telelpon</label>
					<input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="No Telelpon" value="{{ old('phone') }}">

					@error('phone')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea rows="3" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Alamat" value="{{ old('address') }}"></textarea>

					@error('address')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary">Simpan</button>
				<a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
			</div>
		</form>
		</div>
	</div>

@endsection