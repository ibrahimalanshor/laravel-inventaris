@extends('_layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
	
	<div class="col-sm-8 mx-auto">
		<div class="card">
		<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card-header">
				<h2 class="card-title title-5 mb-0">Tambah Pengguna</h2>
			</div>
			<div class="card-body">
				<div class="form-row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ old('name') }}" autofocus>

							@error('name')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}">

							@error('username')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Level</label>
					<select class="form-control custom-select @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}">
						<option value="admin">Admin</option>
						<option value="pegawai">Pegawai</option>
					</select>

					@error('level')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password') }}">

							@error('password')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Konfirmasi Password</label>
							<input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Foto</label>
					<div class="custom-file">
						<div class="custom-file-label">Upload</div>
						<input type="file" class="form-control custom-file-input @error('file') is-invalid @enderror" name="file">
						
						@error('file')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>

				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary">Simpan</button>
				<a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
			</div>
		</form>
		</div>
	</div>

@endsection

@push('js')
	<script src="{{ asset('cool-admin/vendor/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
	<script>
		bsCustomFileInput.init()
	</script>
@endpush