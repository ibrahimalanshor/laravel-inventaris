@extends('_layouts.app')

@section('title', 'Laporan')

@section('content')

    <h1 class="title-1 mb-3">Laporan</h1>

	<div class="card">
		<div class="card-header overview-wrap">
			<h2 class="title-5 mb-0 card-title">Laporan</h2>
			<div>
				<a href="{{ route('report.print', ['start_date' => $start_date, 'end_date' => $end_date, 'type' => $type]) }}" class="btn btn-primary btn-sm">Print</a>
				<a href="{{ route('report.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
			</div>
		</div>
		<div class="card-body">
			<dl class="row">
				<dt class="col-sm-4">Dari Tanggal</dt>
				<dd class="col-sm-1">:</dd>
				<dd class="col-sm-6">{{ localDate($start_date) }}</dd>
				<dt class="col-sm-4">Sampai Tanggal</dt>
				<dd class="col-sm-1">:</dd>
				<dd class="col-sm-6">{{ localDate($end_date) }}</dd>
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
						<th>Supplier</th>
						<th>Barang</th>
						<th>Jumlah</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($reports as $report)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ localDate($report->created_at) }}</td>
							<td>{{ $report->supplier->name }}</td>
							<td>{{ $report->stuff->name }}</td>
							<td>{{ $report->total }}</td>
						</tr>
					@empty
						<tr>
							<td colspan="5" align="center">Kosong</td>
						</tr>
					@endforelse
				</tbody>
			</table>
			<div class="mt-3">
				{{ $reports->withQueryString()->links() }}
			</div>
		</div>
	</div>

@endsection