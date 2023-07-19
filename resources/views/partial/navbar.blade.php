<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{asset('style.css')}}" rel="stylesheet" />
  </head>
  <body>
    <!-- Navbar -->
    <nav data-aos="zoom-out" class="navbar fixed-top navbar-expand-lg navbar-light p-md-1">
      <div class="container">
        <a href="/">
          <img src="{{asset('img/foto/villaliang-logo-02.png')}}" height="52.6px" width="110px" class="navbar-brand" alt="" />
        </a>
        <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/" class="nav-link text-dark">Home</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li class="nav-item">
              <a href="/amenities" class="nav-link text-dark">Amenities</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li class="nav-item">
              <a href="/booking" class="nav-link text-dark">Room / Booking</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li class="nav-item">
              <a href="/gallery" class="nav-link text-dark">Gallery</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li class="nav-item">
              <a href="/contact" class="nav-link text-dark">Contact</a>
            </li>
            <li class="nav-item">
              @if (Auth::check())
                
                <div class="dropdown">
                  <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('gambarkamar/profile.png') }}" width="29" height="29" alt="">
                  </a>

                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/order">Pesanan</a></li>
                    <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                  </ul>
                </div>
              @else
              <a href="login" class="nav-link text-dark">Log In</a>
              @endif
            </li>
            <li><hr class="dropdown-divider" /></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- End Navbar -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
      var nav = document.querySelector("nav");

      window.addEventListener("scroll", function () {
        if (window.pageYOffset > 100) {
          nav.classList.add("bg-light", "shadow");
        } else {
          nav.classList.remove("bg-light", "shadow");
        }
      });
    </script>
  </body>
</html>
