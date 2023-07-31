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
</br>
</br>
</br>
{{-- nama kamar --}}
    <div class="container">
        <div class="mb-2 mt-8">
            <h1 class="about font-bold mb-3">Villa Liang - {{ $k->katagori->nama_katagori }} </h1>
            <figcaption class="blockquote-footer">Ubud - Bali - Indonesia</figcaption>
        </div>
    </div>

{{-- caraousel --}}
    <section class="container sproduct">
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner mb-5">
                @foreach ( $k->gambar as $gak )
                        <div class="carousel-item active c-item">
                            <img src="{{ $gak->gambar}}" class="d-block w-100 c-img" alt="...">
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


{{-- card segala jenis --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text" style="font-weight: bold;">Category</h6>
                                    <div class="entry-content" ">
                                        <label class="text ms-1">{{ $k->katagori->nama_katagori }} Bedroom</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text" style="font-weight: bold;">Capasition</h6>
                                <div class="entry-content" ">
                                    <label class="text ms-1">{{ $k->kapasitas }} persons</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text" style="font-weight: bold;">Content</h5>
                                <div class="entry-content" ">
                                    <pre class="text m-3">{{ $k->keterangan }}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- card pemesanan --}}
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form class="text " method="post" action="{{ route("tambahpesanan.store", ['id'=>$k->id]) }}">
                            @csrf
                            <div class="form-group mb-2">
                                <div id="harga">{{ $k->harga }}/night</div>
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
                                        <label class="mt-3 mb-3" for="jumlah">Visitors</label>
                                        <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Enter the number of visitors">
                                    </div>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div>
                                    @foreach ($errors->all() as $er)
                                        <p class="text-danger">{{ $er }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <div class="mt-3" id="totalharga"></div>
                            <button type="submit" class="btn btn-primary mt-3">Order</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- maps --}}
    <div class="container mt-5">
        <div class="embed-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7809.736958908297!2d115.26567240568887!3d-8.502064554965266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23da6d68ea3c7%3A0xe200b73a9d47edb4!2sVilla%20Liang%20Ubud!5e1!3m2!1sid!2sid!4v1687610958006!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        
        </div>
    </div>

</div>
@endforeach
    
    <footer>
        @include('partial.footer')
    </footer>
    
    
    <script>
        // skrip nampilin total harga
        let totalharga = document.getElementById("totalharga");
        let checkin = document.getElementById("checkin");
        let checkout = document.getElementById("checkout");
        let harga = document.getElementById("harga");
        let permalam = parseFloat(harga.textContent.split('/')[0]);
        let checkindate;
        let checkoutdate;
    
        checkin.onchange = () => {
            checkindate = checkin.value;
            calculateTotalMalam();
        }
    
        checkout.onchange = () => {
            checkoutdate = checkout.value;
            calculateTotalMalam();
        }
    
        function calculateTotalMalam() {
            if (checkindate && checkoutdate) {
                let totalmalam = Math.ceil((new Date(checkoutdate).getTime() - new Date(checkindate).getTime()) / (1000 * 60 * 60 * 24));
                totalharga.textContent = `Rp ${permalam * totalmalam}`;
                
            }
        }

        //scrip disable tanggal
        const inputCheckin=document.getElementById('checkin')
        const inputCheckout=document.getElementById('checkout')
        inputCheckin.onchange=()=>{
            inputCheckout.min=inputCheckin.value
        }
    </script>
    
</body>
</html>