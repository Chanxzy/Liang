<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room / Booking</title>

    @include('partial.style')
</head>
<body>
    @include('partial.navbar')

    <div class="banner-image-booking w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="content text-center">
        <h1 data-aos="fade-up" class="banner text-white">
            <span class="banner2">VILLA LIANG</span>
        </h1>
        </div>
    </div>

    <div class="container">
        <h1 class="text-center m-5">
            <span class="banner1 font-bold">VILLA LIANG</span>
        </h1>    
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="img/foto/kokokan room/1550737833_21-02-2019_Kokokan_1b.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2 class="about responsive-text">KOKOKAN BEDROOM</h2>
                <p>Our largest bedroom is named after the white heron, thousands of which head home every evening to the nearby village of Petalu. This room boasts a deluxe ensuite with a bath-tub, air-con and a ceiling fan. It is beautifully furnished with solid, handmade teak furniture, a premium quality mattress, luxurious bed linen and features a day bed, a spacious wardrobe and a writing desk.</p>
                <div>
                    <a href="/detailkamar/1" class="btn rounded-pill text-white" style="background-color: #EF008C;">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="about responsive-text">MURAI BEDROOM</h2>
                <p>This is a slightly smaller bedroom than Kokokan and is named after the beautiful magpie pictured above. The room features a deluxe ensuite, air-con and a ceiling fan. The room is similarly furnished with solid, handmade teak furniture, a premium quality mattress, luxurious bed linen and features a day bed, a spacious wardrobe and a writing desk.</p>
                <div>
                    <a href="/detailkamar/3" class="btn rounded-pill text-white" style="background-color: #EF008C;">Book Now</a>
                </div>
            </div>
            <div class="col-md-4">
                <img src="img/foto/murai/1550738146_21-02-2019_Murai_1b-1.jpg" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="img/foto/kutilang room/1550738214_21-02-2019_Kutilang_3b.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2 class="about responsive-text">KUTILANG BEDROOM</h2>
                <p>This room is named after a type of small songbird. In English it is known as a warbler and comes in all different guises. Virtually identical to Murai bedroom this room too features a deluxe ensuite, air-con and a ceiling fan. The room is similarly furnished with solid, handmade teak furniture, a premium quality mattress, luxurious bed linen and features a day bed, a spacious wardrobe and a writing desk.
                </p>
                <div>
                    <a href="/detailkamar/2" class="btn rounded-pill text-white" style="background-color: #EF008C;">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="about responsive-text">WHOLE VILLA</h2>
                <p>This beautiful villa is set off with natural rock and timber finishes and carefully selected furniture and fittings to reflect the luxury setting. Villa Liang Ubud has 3 large bedrooms that can be configured as king sized single beds or as a king sized double. Each bedroom has its own en-suite and the main bedroom also has a luxurious bathtub. Each of the bedrooms connect directly with the large open lounge and kitchen and every room looks out onto the pool and the beautiful lush garden area. Just surround yourself with life’s luxuries and just chill in the quiet surrounds.</p>
                <div>
                    <a href="#" class="btn rounded-pill text-white" style="background-color: #EF008C;">Book Now</a>
                </div>
            </div>
            <div class="col-md-4">
                <img src="img/foto/pool/Villa-Liang-Ubud-7.jpg" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</br>
</body>

@include('partial.footer')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>