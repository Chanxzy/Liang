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
                Report Villa Liang
                </div>
                
                <div class="card-body">
                    <div class=" d-flex justify-content-between">
                        <div class="col-md-4 pt-4">
                            @php
                                $params=request()->query()
                            @endphp
                            
                            <form action="{{ route('cetak_pdf', $params) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Print PDF</button>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <form action="{{ route('report') }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="start-date">Start Date</label>
                                        <input type="date" name="start" class="form-control" id="start-date">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="end-date">End Date</label>
                                        <input type="date" name="end" class="form-control" id="end-date">
                                    </div>
                                    <div class="col-md-1 pt-4">
                                        <button  type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                <th>Status</th>
                                <th>Kamar</th>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection


