@extends('template.admin')
@section('konten')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Akun user
                </div>
                
                <div class="card-body">
                    <a href="/tambahakun" class="btn btn-primary">Create Akun</a>
                    <br/>
                    <br/>
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($user as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->role }}</td>
                                <td> 
                                    <a href="/deleteakun/{{ $u->id }}" class="btn btn-danger">
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
