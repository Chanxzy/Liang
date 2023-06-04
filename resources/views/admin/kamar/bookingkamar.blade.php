@extends('template.admin')
@section('konten')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Kamar Villa Liang
                </div>
                
                <div class="card-body">
                    <a href="/tambahkamar" class="btn btn-primary">Create Kamar</a>
                    <br/>
                    <br/>
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nomer Kamar</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Katagori</th>
                                <th>Kapasitas</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($kamars as $k)
                            <tr>
                                <td>{{ $k->nomor_kamar }}</td>
                                <td>
                                    <img src="{{ $k->Gambar }}" style="max-width: 80px" alt="">
                                </td>
                                <td>{{ $k->harga }}</td>
                                {{ dd($k->katagori) }}
                                <td>{{ $k->katagori}}</td>
                                <td>{{ $k->kapasitas }}</td>
                                <td>{{ $k->keterangan }}</td>
                                <td> 
                                    <a href="/updatekamar/{{ $k->id }}" class="btn btn-warning">
                                        <img src="img/icon/pencil.png" alt="">
                                    </a>
                                    <a href="/deletekamar/{{ $k->id }}" class="btn btn-danger">
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
