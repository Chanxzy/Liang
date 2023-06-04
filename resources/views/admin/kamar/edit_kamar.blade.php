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
                    <a href="/kamar" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="POST" action="{{ route("updatekamar.update", $kamar->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nomor Kamar</label>
                            <input value="{{ $kamar->nomor_kamar }}" type="text" name="nomor_kamar" class="form-control" placeholder="nomor_kamar  ...">
                            @if($errors->has('nomor_kamar'))
                                <div class="text-danger">
                                    {{ $errors->first('nomor_kamar')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Gambar</label>
                            <input value="{{ $kamar->Gambar }}" type="text" name="Gambar" class="form-control" placeholder="Gambar  ...">
                            @if($errors->has('Gambar'))
                                <div class="text-danger">
                                    {{ $errors->first('Gambar')}}
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Harga</label>
                            <input value="{{ $kamar->harga }}" name="harga" class="form-control" placeholder="harga  ..."></input>
                            @if($errors->has('harga'))
                                <div class="text-danger">
                                    {{ $errors->first('harga')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Katagori</label>
                            <input value="{{ $kamar->katagori }}" name="katagori" class="form-control" placeholder="katagori  ..."></input>
                            @if($errors->has('katagori'))
                                <div class="text-danger">
                                    {{ $errors->first('katagori')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Kapasitas</label>
                            <input value="{{ $kamar->kapasitas }}" name="kapasitas" class="form-control" placeholder="kapasitas  ..."></input>
                            @if($errors->has('kapasitas'))
                                <div class="text-danger">
                                    {{ $errors->first('kapasitas')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input value="{{ $kamar->keterangan }}" name="keterangan" class="form-control" placeholder="keterangan  ..."></input>
                            @if($errors->has('keterangan'))
                                <div class="text-danger">
                                    {{ $errors->first('keterangan')}}
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