@extends('template.admin')
@section('konten')
<style>
/* Custom CSS to remove active state effect for buttons */
.btn:active,
.btn:focus,
.btn:active:focus {
    box-shadow: none !important;
}
.btn-status{
border-radius: 50px;
font-size: 12px;
font-weight: bold;
}
.btn-action{
    border-radius: 50px;
    font-size: 12px;
    background-color: #f5f5f5;
    border: none;
}
.view{
    color: blue;
}
.del{
    color: red;
}
</style>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                <h3>Pesanan Villa Liang</h3>
                </div>
                
                <div class="card-body">
                    <a href="/tambahpesanan" class="btn btn-primary">Create Pesanan</a>
                    
                    <br/>
                    <br/>
                    
                    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Nama Pelanggan</th>
            <th>Jumlah Tamu</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Total</th>
            <th>Bukti</th>
            <th>Status</th>
            <th>Kamar</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pesanan as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ $p->jumlah }}</td>
            <td>{{ $p->checkin }}</td>
            <td>{{ $p->checkout }}</td>
            <td>Rp{{ number_format($p->total, 0, ',', '.') }}</td>
            <td>
                <img src="{{ $p->bukti }}" style="max-width: 80px" alt="">
            </td>
            <td>
                @if ($p->status_bayar == 'sudah')
                    <button class="btn btn-status btn-success disabled">Sudah</button>
                @elseif ($p->status_bayar == 'batal')
                    <button class="btn btn-status btn-danger disabled">Batal</button>
                @elseif ($p->status_bayar == 'proses')
                    <button class="btn btn-status btn-primary disabled">Process</button>
                @else
                    <button class="btn btn-status btn-warning disabled">Belum</button>
                @endif
            </td>
            <td>{{ $p->nama_katagori }}</td>
            <td> 
                <div class="d-flex">
                    <a href="/updatepesanan/{{ $p->id }}" class="btn btn-action view btn-warning me-2 mr-1">
                        <i class="far fa-eye"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                </div>
            </div>
        </div>
@endsection
