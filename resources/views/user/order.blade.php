<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Villa Liang</title>

  <script>
    AOS.init({
        // Global settings:
        disable: false,
        startEvent: 'DOMContentLoaded',
        initClassName: 'aos-init', 
        animatedClassName: 'aos-animate', 
        useClassNames: false, 
        disableMutationObserver: false, 
        debounceDelay: 50, 
        throttleDelay: 99, 
        

        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 120, 
        delay: 0, 
        duration: 1000, 
        easing: 'ease', 
        once: false, 
        mirror: false, 
        anchorPlacement: 'top-bottom',

    });
    </script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <style>
    .card {
      width: 300px;
      position: relative;
      height: 450px;
      perspective: 1000px;
      border-radius: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
      margin-left: 20px;
      z-index: 0;
    }

    .card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      transition: transform 0.6s;
      transform-style: preserve-3d;
    }

    .card-front,
    .card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
    }

    .card-front {
      background-image: url("{{ asset ('img/foto/pool/pool1.jpg')}}");
      background-size: cover;
      background-position: center;
      color: white;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      border-radius: 15px;
    }

    .card-back {
      background-color: #ffffff;
      transform: rotateY(180deg);
      position: relative;
      padding: 0px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      border-radius: 15px;
    }

    .btn-detail {
      display: block;
      margin: 10px auto;
      border-radius: 15px;
      width: 120px;
    }

    .flipped {
      transform: rotateY(180deg);
    }

  </style>

</head>

<body>

  @include('partial.navbar')
  <div class="container">
    <h1 class="text-center mt-5" data-aos="zoom-in">
      <span class="banner1 about">Order</span>
    </h1>
  </div>
  <hr data-aos="zoom-in">

</br>
  <div class="d-flex flex-wrap " style="height: auto; justify-content: center;"  data-aos="fade-up">
  
  @foreach ($pesanan as $index => $p)
    <!-- Display item data -->
    <div class="card" style="margin-bottom: 20px;">
        <div class="card-inner">
            <div class="card-front">
                <h5>Order {{ $index + 1  }}</h5>
                <a href="#" class="btn btn-success btn-detail">Detail</a>
            </div>
            <div class="card-back">
                <div class="card-title">
                    <div class="mt-2 text text-dark text-bold">
                        <label>Order</label>
                    </div>
                </div>
                <div class="card-body">
                    <form class="text">
                        <div class="border rounded p-3">
                            <!-- Form fields -->
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkin">Check-in</label>
                                    <div class="border rounded p-2">
                                        <p class="m-0">{{ $p->checkin }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkout">Check-out</label>
                                    <div class="border rounded p-2">
                                        <p class="m-0">{{ $p->checkout }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mt-3 mb-3" for="jumlah">Jumlah Pengunjung</label>
                            <div class="border rounded p-2">
                                <p class="m-0">{{ $p->jumlah }} orang</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mt-3 mb-3">Total Bayar</label>
                            <div class="border rounded p-2">
                                <p class="m-0">Rp {{ $p->total }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row mt-3 justify-content-center">
                            @if ($p->status_bayar == 'sudah')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                                            data-target="#orderBerhasilModal">Order Berhasil</button>
                                    </div>
                                </div>
                            @elseif ($p->status_bayar == 'batal')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                            data-target="#orderBatalModal">Order Batal</button>
                                    </div>
                                </div>
                            @elseif ($p->status_bayar == 'proses')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#orderProsesModal">On Proses</button>
                                    </div>
                                </div>
                            @else
                                <!-- Jika status bukan 'sudah', tampilkan tombol "Bayar", "Upload", dan "Batal" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#bayarModal">Bayar</button>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#uploadModal{{ $p->id }}">Upload</button>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                            data-target="#batalModal">Batal</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <!-- Modal -->
    <div class="modal fade" id="uploadModal{{ $p->id }}" tabindex="-1" role="dialog"
        aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Modal Title - Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal content for Upload -->
                    <form method="post" action="{{ route('uploadbukti.uploadbukti', $p->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="bukti">Select File:</label>
                            <input type="file" class="form-control-file" name="bukti" id="bukti">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal for Batal -->
  <form action="{{ route("deletepesanan.destroy", $p->id) }}" method="post">
    @csrf
    <div class="modal fade" id="batalModal" tabindex="-1" role="dialog" aria-labelledby="batalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="batalModalLabel">Konfirmasi Pembatalan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin membatalkan order ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Iya</button>
        </div>
      </div>
    </div>
  </form>
  </div>
@endforeach
    
  </div>

  <!-- Modal for Bayar -->
<div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bayarModalLabel">Modal Title - Bayar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <!-- Modal content for Bayar -->
        <img src="{{ asset ('img/foto/frame.png')}}" alt="QR Code">
        <div class="mt-5 border rounded">
          <div class="input-group">
            <span class="form-control" id="inputText">7721099974</span>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" onclick="copyInputText()">
                <i class="far fa-copy"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function copyInputText() {
      var inputText = document.getElementById("inputText");
      var tempInput = document.createElement("input");
      tempInput.setAttribute("value", inputText.textContent || inputText.innerText);
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand("copy");
      document.body.removeChild(tempInput);
    }
</script>
  <script>
    $(document).ready(function() {
      $('.btn-detail').click(function(e) {
        e.preventDefault();
        $(this).closest('.card').find('.card-inner').toggleClass('flipped');
      });
    });
    
  </script>





  @include('partial.footer')
</body>

</html>
