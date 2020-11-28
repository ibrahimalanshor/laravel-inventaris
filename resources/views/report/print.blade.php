<!DOCTYPE html>
<html lang="en">

<head>
    
    <style>
    	 body {
		    margin: 0;
		    color: #000;
		    background-color: #fff;
		    font-family: sans-serif;
		  }
		  h1{
		  	text-align: center;
		  }
		  span{
		  	margin-left: 10px;
		  }
		  table{
		  	width: 100%;
		  	border-collapse: collapse;
		  	margin-top: 1rem
		  }
		  th, td{
		  	text-align: left;
		  	border: 1px solid #ddd;
		  	padding: 10px;
		  }
    </style>

</head>

<body>

	<h1>Laporan {{ ucfirst($type) }}</h1>

	<div>
		<b style="margin-right: 35px">Dari Tanggal</b>
		:
		<span>{{ localDate($start_date) }}</span>
	</div>

	<div>
		<b style="margin-right: 9px">Sampai Tanggal</b>
		:
		<span>{{ localDate($end_date) }}</span>
	</div>

	<table>
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

</body>

</html>