@extends('_layouts.app')

@section('title', 'Ganti Password')

@section('content')

    <h1 class="title-1 mb-3">Ganti Password</h1>


    <div class="col-sm-7 mx-auto">
		@if (session('success'))
			<div class="alert alert-success alert-dismissible">
				{{ session('success') }}
				<button class="close" data-dismiss="alert">&times;</button>
			</div>
		@endif
    	<div class="card">
    	<form action="{{ route('change.password') }}" method="post">
    		@csrf
    		<div class="card-header">
    			<h5 class="card-title title-5 mb-0">Password Baru</h5>
    		</div>
    		<div class="card-body">
    			<div class="form-group">
    				<label>Password</label>
    				<input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" autofocus>

    				 @error('password')
    				 	<span class="invalid-feedback"></span>
    				 @enderror
    			</div>
    			<div class="form-group">
    				<label>Konfiramsi Password</label>
    				<input type="password" class="form-control" placeholder="Konfiramsi Password" name="password_confirmation">
    			</div>
    		</div>
    		<div class="card-footer">
    			<button class="btn btn-primary" type="submit">Simpan</button>
    		</div>
    	</form>
    	</div>
    </div>

@endsection