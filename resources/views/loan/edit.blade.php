@extends('_layouts.app')

@section('title', 'Peminjaman Barang')

@section('content')

	<form action="{{ route('loan.update', $loan->id) }}" class="row" method="post">
	@csrf
	@method('PUT')
		<div class="col-sm-6 mx-auto">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title title-5 mb-0">Edit Peminjaman Barang</h2>
				</div>
				<div class="card-body">
					<input type="hidden" name="id" value="{{ $loan->id }}">
					<div class="form-group">
						<label>Nama Peminjam</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ $loan->name }}" autofocus>

						@error('name')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Tanggal Pinjam</label>
						<input type="date" class="form-control @error('loan_date') is-invalid @enderror" name="loan_date" placeholder="Tanggal Pinjam" value="{{ $loan->loan_date }}">

						@error('loan_date')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Tanggal Kembali</label>
						<input type="date" class="form-control @error('return_date') is-invalid @enderror" name="return_date" placeholder="Tanggal Kembali" value="{{ $loan->return_date }}">

						@error('return_date')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Status Peminjaman</label>
						<select class="form-control custom-select @error('status') is-invalid @enderror" name="status">
							<option value="0" {{ $loan->status ? '' : 'selected' }}>Dipinjam</option>
							<option value="1" {{ $loan->status ? 'selected' : '' }}>Dikembalikan</option>
						</select>

						@error('status')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title title-5 mb-0">Barang</h2>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Barang</label>
						<select class="form-control custom-select @error('stuff_id') is-invalid @enderror" name="stuff_id">
							@forelse ($stuffs as $stuff)
								<option value="{{ $stuff->id }}" {{ $loan->stuff_id === $stuff->id ? 'selected' : '' }}>{{ $stuff->name }}</option>
							@empty
								<option value="" disabled>Kosong</option>
							@endforelse
						</select>

						@error('stuff_id')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Total</label>
						<input type="number" class="form-control @error('total') is-invalid @enderror" name="total" placeholder="Total" value="{{ $loan->total }}">

						@error('total')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Kondisi Barang</label>
						<input type="text" class="form-control @error('condition') is-invalid @enderror" name="condition" placeholder="Kondisi Barang" value="{{ $loan->condition }}">

						@error('condition')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary" type="submit">Simpan</button>
					<a href="{{ route('loan.index') }}" class="btn btn-secondary">Kembali</a>
				</div>
			</div>
		</div>
	</form>	
		
@endsection