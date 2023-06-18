<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Tambah Data Pesanan</title>
    </head>

    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>TAMBAH DATA</strong>
                </div>
                
                <div class="card-body">
                    <a href="/pesanan" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="{{ route("tambahpesanan") }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Check In</label>
                            <input type="date" name="checkin" class="form-control" placeholder="checkin ...">
                            @if($errors->has('konfliktanggal'))
                                <div class="text-danger">
                                    {{ $errors->first('konfliktanggal')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Check Out</label>
                            <input type="date" name="checkout" class="form-control" id="checkout" placeholder="checkout ...">
                            @if($errors->has('konfliktanggal'))
                                <div class="text-danger">
                                    {{ $errors->first('konfliktanggal')}}
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" placeholder="jumlah ..."></input>
                            @if($errors->has('jumlah'))
                                <div class="text-danger">
                                    {{ $errors->first('jumlah')}}
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