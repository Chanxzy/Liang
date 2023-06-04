<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('partial.style')
  </head>
  <body>
    <!-- Navbar -->
    <!-- Topbar Navbar -->
      <nav data-aos="zoom-out" class="navbar fixed-top navbar-expand-lg navbar-light p-md-1">
        <div class="container">
          <a href="/">
            <img src="{{asset('img/foto/villaliang-logo-02.png')}}" hight="52.6px" width="110px" class="navbar-brand " alt="" />
          </a>
          <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="nabarNav" aria-expanded="false" aria-lable="Toggle Navbar">
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
              <li>
                <a href="login">
                  <img src="img/icon/profile.png" width="29" height="29" alt="">
                </a>
              </li>
              <li><hr class="dropdown-divider" /></li>
            </ul>
          </div>
      </nav>  
    
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
    <!-- End Navbar -->
  </body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</html>
