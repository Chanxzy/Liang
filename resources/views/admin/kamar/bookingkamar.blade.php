@extends('template.admin')
@section('konten')
<style>
.btn:active,
.btn:focus,
.btn:active:focus {
    box-shadow: none !important;
}
.btn-action{
    border-radius: 50px;
    font-size: 12px;
    background-color: #f5f5f5;
    border: none;
}
.viewedit{
    color: orange;
}
.viewdelete{
    color: red;
}
</style>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h3>Kamar Villa Liang</h3>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($kamar as $k)
                            <tr>
                                <td>{{ $k->nomor_kamar }}</td>
                                <td>
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ( $k->gambar as $gak )
                                            <div class="carousel-item active">
                                                <img src="{{ $gak->gambar}}" class="d-block w-100" alt="...">
                                            </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </td>
                                <td>{{ $k->harga }}</td>
                                <td>{{ $k->katagori->nama_katagori}}</td>
                                <td>{{ $k->kapasitas }}</td>
                                <td>{{ $k->keterangan }}</td>
                                <td> 
                                    <a href="/updatekamar/{{ $k->id }}" class="btn btn-action viewedit btn-warning me-2 mr-1">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="/deletekamar/{{ $k->id }}" class="btn btn-action viewdelete btn-danger me-2 mr-1">
                                        <i class="fa-solid fa-trash"></i>
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
