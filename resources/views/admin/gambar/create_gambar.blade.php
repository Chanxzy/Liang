<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('partial.style')
    <title>Create Gambar</title>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <strong>TAMBAH GAMBAR</strong>
            </div>
            
            <div class="card-body">
                <a href="/katagori" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>
                
                <form method="post" action="{{ route("tambahgambar") }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control" placeholder="gambar ...">
                        @if($errors->has('gambar'))
                            <div class="text-danger">
                                {{ $errors->first('gambar')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>ID Kamar</label>
                        <input type="text" name="kamar_id" class="form-control" placeholder="kamar_id ...">
                        @if($errors->has('kamar_id'))
                            <div class="text-danger">
                                {{ $errors->first('kamar_id')}}
                            </div>
                        @endif
                    </div>
                </br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
</body>
</html>