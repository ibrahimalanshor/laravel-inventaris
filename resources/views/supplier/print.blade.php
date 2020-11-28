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
		  table{
		  	width: 100%;
		  	border-collapse: collapse;
		  }
		  th, td{
		  	text-align: left;
		  	border: 1px solid #ddd;
		  	padding: 10px;
		  }
    </style>

</head>

<body>

	<h1>Data Supplier</h1>

	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>No Telepon</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($suppliers as $supplier)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $supplier->name }}</td>
					<td>{{ $supplier->phone }}</td>
					<td>{{ $supplier->address }}</td>
				</tr>
			@empty
				{{-- empty expr --}}
			@endforelse
		</tbody>
	</table>

</body>

</html>