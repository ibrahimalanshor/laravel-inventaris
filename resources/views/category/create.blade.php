@extends('_layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
	
	<div class="col-sm-7 mx-auto">
		<div class="card">
		<form action="{{ route('category.store') }}" method="post">
			@csrf
			<div class="card-header">
				<h2 class="card-title title-5 mb-0">Tambah Kategori</h2>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ old('name') }}" autofocus>

					@error('name')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary">Simpan</button>
				<a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
			</div>
		</form>
		</div>
	</div>

@endsection