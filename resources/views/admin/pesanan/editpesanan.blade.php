<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Edit Data Kamar</title>
    </head>

    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>EDIT DATA</strong>
                </div>
                
                <div class="card-body">
                    <a href="/pesanan" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>

                    <form method="POST" action="{{ route("updatepesanan.edit", $pesanan->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input disabled value="{{ $pesanan->name }}" type="text" name="name" class="form-control" placeholder="name  ...">
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Jumlah Tamu</label>
                            <input disabled value="{{ $pesanan->jumlah }}" type="text" name="jumlah" class="form-control" placeholder="jumlah  ...">
                            @if($errors->has('jumlah'))
                                <div class="text-danger">
                                    {{ $errors->first('jumlah')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Check In</label>
                            <input disabled value="{{ $pesanan->checkin }}" type="text" name="checkin" class="form-control" placeholder="checkin  ...">
                            @if($errors->has('checkin'))
                                <div class="text-danger">
                                    {{ $errors->first('checkin')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Check Out</label>
                            <input disabled value="{{ $pesanan->checkout }}" type="text" name="checkout" class="form-control" placeholder="checkout  ...">
                            @if($errors->has('checkout'))
                                <div class="text-danger">
                                    {{ $errors->first('checkout')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input disabled value="{{ $pesanan->total }}" type="text" name="total" class="form-control" placeholder="total  ...">
                            @if($errors->has('total'))
                                <div class="text-danger">
                                    {{ $errors->first('total')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Bukti</label>
                            <img src="{{ $pesanan->bukti }}"style="max-width: 680px" alt="bukti">
                            @if($errors->has('bukti'))
                                <div class="text-danger">
                                    {{ $errors->first('bukti')}}
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Status Bayar</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" {{ $pesanan->status_bayar=='sudah'?'checked':"" }} name="status_bayar" id="status_bayar">
                                <label class="form-check-label" for="status_bayar">
                                    Sudah
                                </label>    
                            </div>
                            @if($errors->has('status_bayar'))
                                <div class="text-danger">
                                    {{ $errors->first('status_bayar')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Kamar</label>
                            <input disabled value="{{ $pesanan->nama_katagori }}" name="nama_katagori" class="form-control" placeholder="nama_katagori  ..."></input>
                            @if($errors->has('nama_katagori'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_katagori')}}
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>