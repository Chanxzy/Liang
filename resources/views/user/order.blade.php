<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Villa Liang</title>

  @include('partial.style')
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

  @foreach ($orderbaru as $index => $p)
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
                            <div class="form-group">
                              <div class="border rounded p-2 mb-2">
                                  <p class="m-0">{{ $p->nama_katagori }} Bedroom</p>
                              </div>
                            </div>
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
                            <label class="mt-3 mb-3" for="jumlah">Visitors</label>
                            <div class="border rounded p-2">
                                <p class="m-0">{{ $p->jumlah }} person</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mt-3 mb-3">Pay Amount</label>
                            <div class="border rounded p-2">
                              
                                <p class="m-0">Rp {{ $p->total }}</p>
                            </div>
                        </div>
                        @if ($p->status_bayar == 'sudah')
                            <p class="m-0 text-primary">
                              *Please check your email
                            </p>
                        @endif
                        @if ($p->status_bayar == 'ditolak')
                            <p class="m-0 text-danger">
                              *Please recheck the amount paid
                            </p>
                        @endif
                        
                        </div>
                        <div class="row mt-3 justify-content-center">
                            @if ($p->status_bayar == 'sudah')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                                            data-target="#orderBerhasilModal">Order Success</button>
                                    </div>
                                </div>
                            @elseif ($p->status_bayar == 'batal')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                            data-target="#orderBatalModal">Order Canceled</button>
                                    </div>
                                </div>
                            @elseif ($p->status_bayar == 'ditolak')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-warning btn-block" data-toggle="modal"
                                            data-target="#orderBatalModal">Order Rejected</button>
                                    </div>
                                </div>
                            @elseif ($p->status_bayar == 'proses')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#orderProsesModal">On Process</button>
                                    </div>
                                </div>
                            @else
                                <!-- Jika status bukan 'sudah', tampilkan tombol "Bayar", "Upload", dan "Batal" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#bayarModal{{ $p->id }}">Pay</button>
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
                                            data-target="#batalModal{{ $p->id }}">Cancel</button>
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
    <div class="modal fade" id="uploadModal{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Evidence</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal content for Upload -->
                <form method="post" action="{{ route('uploadbukti.uploadbukti', $p->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="bukti">Select File:</label>
                        <input type="file" class="form-control-file" name="bukti" id="bukti"
                            onchange="previewImage(event,{{ $p->id }})">
                        <div class="mt-2 d-flex justify-content-center">
                            <img id="imagePreview{{ $p->id }}" src="#" alt="Image Preview" style="max-width: 100%; max-height: 500px; display: none;">
                        </div>
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
      <div class="modal fade" id="batalModal{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="batalModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="batalModalLabel{{ $p->id }}">Confirmation Order Cancel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to cancel this order?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </form>
    </div>

    <!-- Modal for Bayar -->
    <div class="modal fade" id="bayarModal{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bayarModalLabel{{ $p->id }}">Pay</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <!-- Modal content for Bayar -->
            <p class="text-danger">Please pay for the order before 6 hours from the order process</p>
            <p class="text-danger">please pay according to the pay amount</p>
            <div class="mt-5 border rounded">
              <div class="input-group">
                  <input type="text" class="form-control disabled" id="payamount{{ $p->id }}" value="Rp {{ $p->total }}" readonly>
                  <div class="input-group-append">
                      <button class="btn btn-primary" id="copyButton" onclick="copyPayAmount({{ $p->id }})">
                        <i class="far fa-copy"></i>
                      </button>
                  </div>
              </div>
            </div>
            <div class="mt-2 border rounded">
              <div class="input-group">
                  <input type="text" class="form-control disabled" id="textToCopy" value="7721099974" readonly>
                  <div class="input-group-append">
                      <button class="btn btn-primary" id="copyButton" onclick="copyText()">
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
  @endforeach
  </div>


  {{-- order history --}}
  <div class="container">
    <h1 class="text-center mt-5" data-aos="zoom-in">
      <span class="banner1 about">Order History</span>
    </h1>
  </div>
  <hr data-aos="zoom-in">
  </br>
  <div class="d-flex flex-wrap " style="height: auto; justify-content: center;"  data-aos="fade-up">

  @foreach ($orderlama as $index => $p)
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
                            <div class="form-group">
                              <div class="border rounded p-2 mb-2">
                                  <p class="m-0">{{ $p->nama_katagori }} Bedroom</p>
                              </div>
                            </div>
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
                            <label class="mt-3 mb-3" for="jumlah">Visitors</label>
                            <div class="border rounded p-2">
                                <p class="m-0">{{ $p->jumlah }} person</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mt-3 mb-3">Pay Amount</label>
                            <div class="border rounded p-2">
                              
                                <p class="m-0">Rp {{ $p->total }}</p>
                            </div>
                        </div>
                        @if ($p->status_bayar == 'sudah')
                            <p class="m-0 text-primary">
                              *Please check your email
                            </p>
                        @endif
                        @if ($p->status_bayar == 'ditolak')
                            <p class="m-0 text-danger">
                              *Please recheck the amount paid and confirm to email or admin contact
                            </p>
                        @endif
                        
                        </div>
                        <div class="row mt-3 justify-content-center">
                            @if ($p->status_bayar == 'sudah')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                                            data-target="#orderBerhasilModal">Order Success</button>
                                    </div>
                                </div>
                            @elseif ($p->status_bayar == 'batal')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                            data-target="#orderBatalModal">Order Canceled</button>
                                    </div>
                                </div>
                            @elseif ($p->status_bayar == 'proses')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#orderProsesModal">On Process</button>
                                    </div>
                                </div>
                            @elseif ($p->status_bayar == 'ditolak')
                                <!-- Jika status adalah 'sudah', tampilkan tombol "Order Berhasil" -->
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-warning btn-block" data-toggle="modal"
                                            data-target="#orderDitolakModal">Order Rejected</button>
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
  @endforeach
  </div>
  



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    //copy text 
    function copyText() {
        var textToCopy = document.getElementById('textToCopy');
        textToCopy.select();
        document.execCommand('copy');
        // Optional: Show a tooltip or message to indicate successful copy
        var tooltip = document.getElementById('copyTooltip');
        tooltip.innerHTML = 'Text copied!';
    }

    //copy text payment
    function copyPayAmount(id) {
      // Find the input element
      const input = document.getElementById(`payamount${id}`);
      // Extract the numeric value without "Rp" using regular expression
      const numericValue = input.value.replace(/Rp\s*/, "");
      // Create a temporary input element and set its value to the numeric value
      const tempInput = document.createElement("input");
      tempInput.value = numericValue;
      // Append the temporary input element to the DOM
      document.body.appendChild(tempInput);
      // Select the content of the temporary input element
      tempInput.select();
      // Use the Clipboard API to copy the selected numeric value to the clipboard
      if (navigator.clipboard) {
        navigator.clipboard.writeText(numericValue);
      }
      // Remove the temporary input element from the DOM
      document.body.removeChild(tempInput);
    }

    // Optional: Reset tooltip after a short delay
    function resetTooltip() {
        var tooltip = document.getElementById('copyTooltip');
        tooltip.innerHTML = 'Copy Text';
    }

    //preview image
    function previewImage(event,id) {
        const imagePreview = document.getElementById(`imagePreview${id}`);
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    //flipcard
    $(document).ready(function() {
      $('.btn-detail').click(function(e) {
        e.preventDefault();
        $(this).closest('.card').find('.card-inner').toggleClass('flipped');
      });
    });
  </script>


  @include('partial.footer')
  <!-- Aktifkan tooltip -->
  <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
      });
  </script>
</body>

</html>
