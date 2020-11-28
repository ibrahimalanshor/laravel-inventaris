@extends('_layouts.app')

@section('title', 'Laporan')

@section('content')

    <h1 class="title-1 mb-3">Laporan</h1>

    <div class="row">
    	<div class="col-sm-4 mx-auto">
    		<div class="card">
    		<form action="{{ route('report.show') }}">
    			<div class="card-header">
    				<h2 class="title-5 mb-0 card-title">Lihat Laporan</h2>
    			</div>
    			<div class="card-body">
    				<div class="form-group">
    					<label>Dari Tanggal</label>
    					<input type="date" name="start_date" class="form-control">
    				</div>
    				<div class="form-group">
    					<label>Sampai Tanggal</label>
    					<input type="date" name="end_date" class="form-control">
    				</div>
    				<div class="form-group">
    					<label>Jenis</label>
    					<select name="type" class="form-control">
    						<option value="masuk">Pemasukan</option>
    						<option value="keluar">Pengeluaran</option>
    					</select>
    				</div>
    			</div>
    			<div class="card-footer">
    				<button class="btn btn-primary" type="submit">Tampilkan</button>
    			</div>
    		</form>
    		</div>
    	</div>
    	@isset ($reports)
    	    <div class="col">
	    		<div class="card">
	    			<div class="card-header overview-wrap">
	    				<h2 class="title-5 mb-0 card-title">Laporan</h2>
	    				<button class="btn btn-primary btn-sm">Print</button>
	    			</div>
	    			<div class="card-body">
		    			<dl class="row">
		    				<dt class="col-sm-4">Dari Tanggal</dt>
		    				<dd class="col-sm-1">:</dd>
		    				<dd class="col-sm-6">{{ $start_date }}</dd>
		    				<dt class="col-sm-4">Sampai Tanggal</dt>
		    				<dd class="col-sm-1">:</dd>
		    				<dd class="col-sm-6">{{ $end_date }}</dd>
		    				<dt class="col-sm-4">Jenis</dt>
		    				<dd class="col-sm-1">:</dd>
		    				<dd class="col-sm-6">{{ $type }}</dd>
		    			</dl>
		    			<hr>
	    				<table class="table table-bordered" width="100%">
	    					<thead>
	    						<tr>
	    							<th>No</th>
	    							<th>Tanggal Masuk</th>
	    							<th>Barang</th>
	    							<th>Jumlah</th>
	    						</tr>
	    					</thead>
	    					<tbody>
	    						@forelse ($reports as $report)
	    							<tr>
	    								<td>{{ $loop->iteration }}</td>
	    								<td>{{ $report->created_at }}</td>
	    								<td>{{ $report->stuff->name }}</td>
	    								<td>{{ $report->total }}</td>
	    							</tr>
	    						@empty
	    							{{-- empty expr --}}
	    						@endforelse
	    					</tbody>
	    				</table>
	    				<div class="mt-3">
	    					{{ $reports->links() }}
	    				</div>
	    			</div>
	    		</div>
	    	</div>
    	@endisset
    </div>

@endsection