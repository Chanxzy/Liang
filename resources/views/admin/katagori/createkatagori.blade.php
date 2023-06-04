<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('partial.style')
    <title>create katagori</title>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <strong>TAMBAH DATA</strong>
            </div>
            
            <div class="card-body">
                <a href="/katagori" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>
                
                <form method="post" action="{{ route("tambahkatagori") }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Nomor Kamar</label>
                        <input type="text" name="nama_katagori" class="form-control" placeholder="nama_katagori ...">
                        @if($errors->has('nama_katagori'))
                            <div class="text-danger">
                                {{ $errors->first('nama_katagori')}}
                            </div>
                        @endif
                    </div>
                </br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
</body>
</html>