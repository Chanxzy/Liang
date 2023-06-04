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
                    <a href="/katagori" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="POST" action="{{ route("updatekatagori.update", $katagori->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama Katagori</label>
                            <input value="{{ $katagori->nama_katagori }}" type="text" name="nama_katagori" class="form-control" placeholder="nama_katagori  ...">
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