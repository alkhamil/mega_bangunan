<html>
<head>
	<title>Laporan Pernyataan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>LAPORAN</h4>
		<h6>Gap Per Pernyataan</h5>
	</center>
	<br>
	<br>

	<table class='table table-bordered'>
		<thead class="text-center">
			<tr>
				<th>No</th>
				<th>Attribut</th>
				<th>Pernyataan</th>
				<th>Nilai Gap 5</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($criteria as $key => $item)
			@php
				$gap = $nilai['ratakenyataan'][$item->id] - $nilai['rataharapan'][$item->id];  
			@endphp
				<tr>
					<th class="text-center">{{ $key+1 }}</th>
					<td>{{ $item->content }}</td>
					<td>{{ $item->dimensi->name }}</td>
					<td class="text-center">{{ $gap }}</td>
					<td>{{ $keterangan->keterangan($gap) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>