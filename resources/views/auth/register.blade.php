<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script></head>

    <style>
      .bg-login {
      /* Set the background image */
      background-image: url('img/foto/pool/pool.jpg');
      /* Set the background size and other properties */
      background-size: cover;
      background-position: center;
      /* Set the section to take up the full viewport height */
      height: 100vh;
      position: relative;
    }
    </style>
</head>
<body>
    <section class="vh-100 bg-login">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-6">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body ">
                  <div class="row justify-content-center">
                    <div class=" order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
      
                      <form class="mx-1 mx-md-4" method="POST" action="{{ route('register') }}" >
                        @csrf
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" />
                            <label class="form-label" for="name">name</label>
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" />
                            <label class="form-label" for="username">Username</label>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="no_telp" name="no_telp" class="form-control" value="{{ old('no_telp') }}" />
                            <label class="form-label" for="no_telp">Phone Number</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"/>
                            <label class="form-label" for="email">Email</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="password" name="password" class="form-control" />
                            <label class="form-label" for="password">Password</label>
                          </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>