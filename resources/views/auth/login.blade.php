<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<style>
.img-fluid {
    max-width: 100%;
    height: 100%;
    object-fit: cover;}
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script></head>
<body>
    <section class="vh-100 bg-login">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem; z-index: 100;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block c-img">
                    <img src="img/foto/pool/pool.jpg"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;max-width: 100%;height: 100%;object-fit: cover;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form method="POST" action="{{ route("login") }}">
                        @csrf

                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Log in</span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                        @if($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif

                        <div class="form-outline mb-4">
                          <input type="username" id="username" class="form-control form-control-lg" name="username"/>
                          <label class="form-label" for="username">Username</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" id="password" class="form-control form-control-lg" name="password"/>
                          <label class="form-label" for="password">Password</label>
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>
      
                        <a class="small text-muted" href="/formforgotpass">Forgot password?</a>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? 
                          <a href="{{ url('register') }}" 
                            style="color: #393f81;">Register here</a></p>
                      
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