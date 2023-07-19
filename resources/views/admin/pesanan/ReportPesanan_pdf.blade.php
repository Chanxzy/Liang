<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
		<h5>Laporan Pesanan Villa Liang Ubud</h4>
		
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jumlah Tamu</th>
				<th>Check In</th>
				<th>Check Out</th>
				<th>Total</th>
				<th>Status</th>
				<th>Kamar</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($pesanan as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->name}}</td>
				<td>{{$p->jumlah}}</td>
				<td>{{$p->checkin}}</td>
				<td>{{$p->checkout}}</td>
				<td>Rp{{ number_format($p->total, 0, ',', '.') }}</td>
                <td>{{ $p->status_bayar }}</td>
                <td>{{ $p->nama_katagori }}</td>
			</tr>
			@endforeach
                    <tr>
            <td colspan="7">Total Harga:</td>
            <td>Rp{{ number_format($totalharga, 0, ',', '.') }}</td>
        </tr>
		</tbody>
	</table>
 
</body>
</html>