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
	    			<dt class="col-sm-6">Nama Peminjam</dt>
	    			<dd class="col-sm-6">{{ $loan->name }}</dd>
	    			<dt class="col-sm-6">Nama Barang</dt>
	    			<dd class="col-sm-6">{{ $loan->stuff->name }}</dd>
	    			<dt class="col-sm-6">Total</dt>
	    			<dd class="col-sm-6">{{ $loan->total }}</dd>
	    			<dt class="col-sm-6">Kondisi</dt>
	    			<dd class="col-sm-6">{{ $loan->condition }}</dd>
	    			<dt class="col-sm-6">Status</dt>
	    			<dd class="col-sm-6"><span class="badge badge-{{ $loan->statusLabel }}">{{ $loan->statusText }}</span></dd>
	    			<dt class="col-sm-6">Tanggal Pinjam</dt>
	    			<dd class="col-sm-6">{{ $loan->loanDateNormal }}</dd>
	    			<dt class="col-sm-6">Tanggal Kembali</dt>
	    			<dd class="col-sm-6">{{ $loan->returnDateNormal }}</dd>
	    		</dl>
	    	</div>
		    <div class="card-footer">
		    	<a href="{{ route('loan.edit', $loan->id) }}" class="btn btn-primary">Edit</a>
		    	<a href="{{ route('loan.index') }}" class="btn btn-secondary">Kembali</a>
		    </div>
	    </div>
    </div>

@endsection