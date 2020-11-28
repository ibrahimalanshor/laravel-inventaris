@extends('_layouts.app')

@section('title', 'Edit Barang')

@section('content')

	<form action="{{ route('stuff.update', $stuff->id) }}" class="row" method="post">
	@csrf
	@method('PUT')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title title-5 mb-0">Edit Barang</h2>
				</div>
				<div class="card-body">
					<input type="hidden" name="id" value="{{ $stuff->id }}">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ $stuff->name }}" autofocus>

						@error('name')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control custom-select @error('category_id') is-invalid @enderror" name="category_id">
							@forelse ($categories as $category)
								<option value="{{ $category->id }}" {{ $stuff->category_id === $category->id  ? 'selected' : '' }}>{{ $category->name }}</option>
							@empty
								<option value="" disabled>Kosong</option>
							@endforelse
						</select>

						@error('category_id')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Spesifikasi</label>
						<input type="text" class="form-control @error('spec') is-invalid @enderror" name="spec" placeholder="Spesifikasi" value="{{ $stuff->spec }}">

						@error('spec')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Lokasi</label>
						<input type="text" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="Lokasi" value="{{ $stuff->location }}">

						@error('location')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title title-5 mb-0">Detail Barang</h2>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Kondisi</label>
						<select class="form-control custom-select @error('condition') is-invalid @enderror" name="condition">
							<option value="baru" {{ $stuff->condition === 'baru' ? 'selected' : '' }}>Baru</option>
							<option value="bekas" {{ $stuff->condition === 'bekas' ? 'selected' : '' }}>Bekas</option>
							<option value="rusak" {{ $stuff->condition === 'rusak' ? 'selected' : '' }}>Rusak</option>
						</select>

						@error('condition')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Sumber</label>
						<input type="text" class="form-control @error('origin') is-invalid @enderror" name="origin" placeholder="Sumber" value="{{ $stuff->origin }}">

						@error('origin')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea rows="3" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Keterangan">{{ $stuff->description }}</textarea>

						@error('description')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Simpan</button>
					<a href="{{ route('stuff.index') }}" class="btn btn-secondary">Batal</a>
				</div>
			</div>
		</div>
	</form>	
		
@endsection