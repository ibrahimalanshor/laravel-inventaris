@extends('_layouts.app')

@section('title', 'Barang')

@section('content')

    <h1 class="title-1 mb-3">Barang</h1>

    <div class="col-sm-8 mx-auto">
    	<div class="card">
	    	<div class="card-header">
	    		<h2 class="title-5 card-title mb-0">Detail Barang</h2>
	    	</div>
	    	<div class="card-body">
	    		<dl class="row">
	    			<dt class="col-sm-6">Nama</dt>
	    			<dd class="col-sm-6">{{ $stuff->name }}</dd>
	    			<dt class="col-sm-6">Spesifikasi</dt>
	    			<dd class="col-sm-6">{{ $stuff->spec }}</dd>
	    			<dt class="col-sm-6">Lokasi</dt>
	    			<dd class="col-sm-6">{{ $stuff->location }}</dd>
	    			<dt class="col-sm-6">Kondisi</dt>
	    			<dd class="col-sm-6"><span class="badge badge-{{ $stuff->conditionLabel }}">{{ $stuff->condition }}</span></dd>
	    			<dt class="col-sm-6">Total</dt>
	    			<dd class="col-sm-6">{{ $stuff->total }}</dd>
	    			<dt class="col-sm-6">Sumber</dt>
	    			<dd class="col-sm-6">{{ $stuff->origin }}</dd>
	    			<dt class="col-sm-6">Keterangan</dt>
	    			<dd class="col-sm-6">{{ $stuff->description }}</dd>
	    			<dt class="col-sm-6">Kategori</dt>
	    			<dd class="col-sm-6">{{ $stuff->category->name }}</dd>
	    		</dl>
	    	</div>
		    <div class="card-footer">
		    	<a href="{{ route('stuff.edit', $stuff->id) }}" class="btn btn-primary">Edit</a>
		    	<a href="{{ route('stuff.index') }}" class="btn btn-secondary">Kembali</a>
		    </div>
	    </div>
    </div>

@endsection