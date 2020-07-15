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
	<div class="row">
		<div class="col-md-12">
			<h5 class="text-center">KUNINGAN MEGA BANGUNAN</h5>
			<p class="text-center">Jl. RE Martadinata Dusun Puhun, RT.016/RW.003, Ancaran, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45514</p>
		</div>
	</div>
	<br>
	<br>
	<table>
		<tr>
			<td>Hari pencetakan</td>
			<td>:</td>
			<td>{{ date('d M Y') }}</td>
		</tr>
		<tr>
			<td>Periode pencetakan</td>
			<td>:</td>
			<td>{{ $qDari.' s/d '.$qSampai }}</td>
		</tr>
		<tr>
			<td>Daftar Responden</td>
			<td>:</td>
			<td>{{ $respondens }}</td>
		</tr>
	</table>
	<table class='table table-sm table-bordered'>
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
				<tr @if($gap < 0) class="bg-warning" @endif>
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