<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Villa Liang</title>

    @include('partial.style')
    @include('partial.navbar')
</head>
<body>
    @foreach ( $kamar as $k )
    <section class="container sproduct">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ( $k->gambar as $gak )
                        <div class="carousel-item active">
                            <img src="{{ $gak->gambar}}" class="d-block w-100" alt="...">
                        </div>
                @endforeach 
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="card " style="background-color: #D9D9D9;">
                        <div class="card-body">
                        <h5 class="card-title about" style="font-weight: bold;">Bedroom</h5>
                        <div class="entry-content" ">
                            <pre class="text m-3">{{ $k->keterangan }}</pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form class="text" method="post" action="{{ route("tambahpesanan.store", ['id'=>$k->id]) }}">
                                        <div class="form-group">
                                            <label for="harga">{{ $k->harga }}/malam</label>
                                        </div>
                                        <div class="border rounded">
                                            <div class="m-3">
                                                <div class="row mt-3">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="checkin">Check-in</label>
                                                            <input type="date" id="checkin" name="checkin" class="mt-3 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="checkout">Check-out</label>
                                                            <input type="date" id="checkout" name="checkout" class="mt-3 form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mt-3 mb-3" for="jumlah">Jumlah Pengunjung</label>
                                                    <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Masukkan jumlah pengunjung">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Pesan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    
    <footer>
        @include('partial.footer')
    </footer>
    
</body>
</html>