@extends('_layouts.app')

@section('title', 'Pengaturan')

@section('content')

    <h1 class="title-1 mb-3">Pengaturan</h1>


    <div class="col-sm-7 mx-auto">
		@if (session('success'))
			<div class="alert alert-success alert-dismissible">
				{{ session('success') }}
				<button class="close" data-dismiss="alert">&times;</button>
			</div>
		@endif
    	<div class="card">
    	<form action="{{ route('setting.update') }}" method="post">
    		@csrf
    		<div class="card-header">
    			<h5 class="card-title title-5 mb-0">Edit Pengaturan</h5>
    		</div>
    		<div class="card-body">
    			<div class="form-group">
    				<label>Nama Aplikasi</label>
    				<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Aplikasi" name="name" value="{{ site('name') }}" autofocus>

    				 @error('name')
    				 	<span class="invalid-feedback"></span>
    				 @enderror
    			</div>
    		</div>
    		<div class="card-footer">
    			<button class="btn btn-primary" type="submit">Simpan</button>
    		</div>
    	</form>
    	</div>
    </div>

@endsection