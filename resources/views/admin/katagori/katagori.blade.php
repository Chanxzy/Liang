@extends('template.admin')
@section('konten')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Katagori
                </div>
                
                <div class="card-body">
                    <a href="/tambahkatagori" class="btn btn-primary">Create Katagori</a>
                    <br/>
                    <br/>
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama Kamar</th>
                        </thead>
                        
                        <tbody>
                            @foreach($katagori as $ka)
                            <tr>
                                <td>{{ $ka->nama_katagori }}</td>
                                <td> 
                                    <a href="/updatekatagori/{{ $ka->id }}" class="btn btn-warning">
                                        <img src="img/icon/pencil.png" alt="">
                                    </a>
                                    <a href="/deletekatagori/{{ $ka->id }}" class="btn btn-danger">
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
