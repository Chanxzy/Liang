<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Villa Liang</title>
    </head>

    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>TAMBAH DATA</strong>
                </div>
                
                <div class="card-body">
                    <a href="/user" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="{{ route("tambahadmin") }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="name">
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>username</label>
                            <input  name="username" class="form-control"  placeholder="username">
                            @if($errors->has('username'))
                                <div class="text-danger">
                                    {{ $errors->first('username')}}
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email"></input type="email">
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
                                <label class="form-check-label" for="admin">Admin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="user" value="user">
                                <label class="form-check-label" for="user">User</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password"></input type="password">
                            @if($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password')}}
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