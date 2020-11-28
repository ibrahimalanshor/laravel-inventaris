@extends('_layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1 class="title-1 mb-3">Barang Masuk</h1>

    <div class="row">
    	
    	<div class="col-sm-4">
    		<div class="card">
    		<form action="{{ route('activity.store') }}" method="post">
			@csrf
    			<div class="card-header">
    				<h2 class="title-5 mb-0 card-title">
    					Tambah
    				</h2>
    			</div>
    			<div class="card-body">
    				<input type="hidden" name="type" value="masuk">
    				<div class="form-group">
    					<label>Barang</label>
    					<select name="stuff_id" class="form-control custom-select @error('stuff_id') is-invalid @enderror">
    						@forelse ($stuffs as $stuff)
    							<option value="{{ $stuff->id }}">{{ $stuff->name }}</option>
    						@empty
    							<option value="">Kosong</option>
    						@endforelse
    					</select>

    					@error('stuff_id')
    						<span class="invalid-feedback">
    							{{ $message }}
    						</span>
    					@enderror
    				</div>
    				<div class="form-group">
    					<label>Supplier</label>
    					<select name="supplier_id" class="form-control custom-select @error('supplier_id') is-invalid @enderror">
    						@forelse ($suppliers as $supplier)
    							<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
    						@empty
    							<option value="">Kosong</option>
    						@endforelse
    					</select>

    					@error('stuff_id')
    						<span class="invalid-feedback">
    							{{ $message }}
    						</span>
    					@enderror
    				</div>
    				<div class="form-group">
    					<label>Total</label>
    					<input type="number" class="form-control @error('total') is-invalid @enderror" name="total" placeholder="Total">

    					@error('total')
    						<span class="invalid-feedback">
    							{{ $message }}
    						</span>
    					@enderror
    				</div>
    			</div>
    			<div class="card-footer">
    				<button class="btn btn-primary">Tambah</button>
    			</div>
    		</div>
    	</form>
    	</div>

    	<div class="col">
    		@if (session('success'))
    			<div class="alert alert-success alert-dismissible">
    				{{ session('success') }}
    				<button class="close" data-dismiss="alert">&times;</button>
    			</div>
    		@endif
    		<div class="card">
    			<div class="card-header">
    				<h2 class="title-5 mb-0 card-title">
    					Data Pemasukan
    				</h2>
    			</div>
    			<div class="card-body">
    				<table class="table table-bordered mb-3" width="100%">
    					<thead>
    						<tr>
    							<th>No</th>
    							<th>Barang</th>
    							<th>Supplier</th>
    							<th>Total</th>
    							<th>Action</th>
    						</tr>
    					</thead>
    					<tbody>
    						@forelse ($activities as $activity)
    							<tr>
    								<td>{{ $loop->iteration }}</td>
    								<td>{{ $activity->stuff->name }}</td>
    								<td>{{ $activity->supplier->name }}</td>
    								<td>{{ $activity->total }}</td>
    								<td>{{ $activity->total }}</td>
    							</tr>
    						@empty
    							<tr>
    								<td colspan="5" align="center">Kosong</td>
    							</tr>
    						@endforelse
    					</tbody>
    				</table>
    				{{ $activities->links() }}
    			</div>
    		</div>
    	</div>

    </div>

@endsection