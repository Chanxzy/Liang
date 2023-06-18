@extends('template.admin')
@section('konten')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Gambar
                </div>
                
                <div class="card-body">
                    <a href="/tambahgambar" class="btn btn-primary">Create Gambar</a>
                    <br/>
                    <br/>
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID Kamar</th>
                                <th>Gambar</th>
                        </thead>
                        
                        <tbody>
                            @foreach($gambar as $ga)
                            <tr>
                                <td>{{ $ga->kamar_id }}</td>
                                <td>
                                    <img src="{{ $ga->gambar }}" style="max-width: 180px" alt="">
                                </td>
                                <td> 
                                    <a href="/deletegambar/{{ $ga->id }}" class="btn btn-danger">
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
