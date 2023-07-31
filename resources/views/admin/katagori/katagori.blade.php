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
                    <h3>Katagori</h3>
                </div>
                
                <div class="card-body">
                    <a href="/tambahkatagori" class="btn btn-primary">Create Katagori</a>
                    <br/>
                    <br/>
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama Kamar</th>
                                <th>Action</th>
                        </thead>
                        
                        <tbody>
                            @foreach($katagori as $ka)
                            <tr>
                                <td>{{ $ka->nama_katagori }}</td>
                                <td> 
                                    <a href="/updatekatagori/{{ $ka->id }}" class="btn btn-action viewedit btn-warning me-2 mr-1">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="/deletekatagori/{{ $ka->id }}" class="btn btn-action viewdelete btn-danger me-2 mr-1">
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
