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
.viewdelete{
    color: red;
}
</style>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h3>Gambar</h3>
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
                                <th>Action</th>
                        </thead>
                        
                        <tbody>
                            @foreach($gambar as $ga)
                            <tr>
                                <td>{{ $ga->kamar_id }}</td>
                                <td>
                                    <img src="{{ $ga->gambar }}" style="max-width: 180px" alt="">
                                </td>
                                <td> 
                                    <a href="/deletegambar/{{ $ga->id }}" class="btn btn-action viewdelete btn-danger me-2 mr-1">
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
