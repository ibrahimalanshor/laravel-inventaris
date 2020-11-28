@extends('_layouts.app')

@section('title', 'User')

@section('content')

    <h1 class="title-1 mb-3">User</h1>

    <div class="row">
    	
    	<div class="col-sm-6">
    		<img src="{{ $user->photoSrc }}" class="img-fluid">
    	</div>

	    <div class="col-sm-6">
	    	<div class="card">
		    	<div class="card-header">
		    		<h2 class="title-5 card-title mb-0">Detail User</h2>
		    	</div>
		    	<div class="card-body">
		    		<dl class="row">
		    			<dt class="col-sm-6">Nama</dt>
		    			<dd class="col-sm-6">{{ $user->name }}</dd>
		    			<dt class="col-sm-6">Username</dt>
		    			<dd class="col-sm-6">{{ $user->username }}</dd>
		    			<dt class="col-sm-6">Level</dt>
		    			<dd class="col-sm-6">{{ $user->level }}</dd>
		    		</dl>
		    	</div>
			    <div class="card-footer">
			    	<a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
			    	<a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
			    </div>
		    </div>
	    </div>

	</div>

@endsection