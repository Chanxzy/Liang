@extends('template.admin')
@section('konten')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                Pesanan Villa Liang
                </div>
                
                <div class="card-body">
                    <a href="/tambahpesanan" class="btn btn-primary">Create Pesanan</a>
                    <br/>
                    <br/>
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Bukti</th>
                                <th>Status Bayar</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($pesanan as $p)
                            <tr>
                                
                                <td>{{ $p->id_pelanggan->name }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->total}}</td>
                                <td>
                                    <img src="{{ $p->bukti }}" style="max-width: 80px" alt="">
                                </td>
                                <td>{{ $p->status_bayar }}</td>
                                <td>{{ $p->detail }}</td>
                                <td> 
                                    <a href="/updatepesanan/{{ $p->id }}" class="btn btn-warning">
                                        <img src="img/icon/pencil.png" alt="">
                                    </a>
                                    <a href="/deletepesanan/{{ $p->id }}" class="btn btn-danger">
                                        <img src="img/icon/trash.png" alt="">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
