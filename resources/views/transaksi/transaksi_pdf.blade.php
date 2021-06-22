<!DOCTYPE html>
<html>
<head>
	<title>Laporan Transaksi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
			<h4>Laporan transaksi</h4>
		</center>
		<br/>
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
                    <th>Kelas</th>
                    <th>nominal</th>
                    <th>Status</th>
                    <th>tanggal pembayaran</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($transaksi as $data)
				<tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td style="font: uppercase;">{{ $data->kelas }}</td>
                    @if ($data->status == 'menabung')
                    <td>Rp.{{ number_format($data->nominal) }}</td>
                    <td><span class="badge badge-info">{{ $data->status }}</span></td>
                    @else
                    <td>- Rp.{{ number_format($data->nominal) }}</td>
                    <td><span class="badge badge-danger">{{ $data->status }}</span></td>
                    @endif
                    <td>{{ $data->created_at->format('d M Y - H:i:s') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

</body>
</html>
