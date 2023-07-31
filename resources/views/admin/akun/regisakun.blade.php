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
.view{
    color: red;
}
</style>

        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h3>Akun user</h3>
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
                                <th>Action</th>
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
                                    <a href="/deleteakun/{{ $u->id }}" class="btn btn-action view btn-warning me-2 mr-1">
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
