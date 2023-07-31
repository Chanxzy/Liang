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

	<div class="container">
		<div class="row">
		<div class="col-md-12">
			<div class="text-center">
			<h3>Villa Liang Ubud</h3>
			<p style="font-size: 12px">Jl. Tirta Tawar, Petulu, Kutuh Kaja, Ubud, Bali</p>
			<p style="font-size: 12px">Tel: (+62) 2081936172951 | Email: villaliangubud@gmail.com</p>
			</div>
		</div>
	</div>

	<h3 class="text-center">Laporan Pesanan</h3>
	</br>
	
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jumlah Tamu</th>
				<th>Check In</th>
				<th>Check Out</th>
				<th>Status</th>
				<th>Kamar</th>
				<th>Total</th>
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
                <td>{{ $p->status_bayar }}</td>
                <td>{{ $p->nama_katagori }}</td>
				<td>Rp{{ number_format($p->total, 0, ',', '.') }}</td>
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