<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Villa Liang</title>

    @include('partial.style')
    
</head>
<body>
    @include('partial.navbar')

    <!-- Banner Image -->
    <div class="banner-image d-flex justify-content-center align-items-center">
        <div class="content text-center">
            <h1 data-aos="fade-up" class="banner text-white">
                <span class="banner1">Welcome</span> <br />
                <span>to</span> </br> <span class="banner2">VILLA LIANG</span>
            </h1>
        </div>
    </div>
    </br>
    <!--End Banner Image-->

    <!--About-->
    <div class="container">
        <h1 class="text-center">
            <span class="about">About</span> </br>
            <span class="banner1 font-bold">VILLA LIANG</span> </br>
            <span class="about1">Have an Amazing Experience with us</span>
        </h1>
        <h1 class="text-center text paragraf">
            <p>Completed in late 2018, Villa Liang Ubud is a luxurious, fully self -contained, 3 bedroom villa, decorated to the highest standard in a modern Balinese style incorporating lots of natural finishes including, rock, marble and timber. It is set in the rice fields yet is only a 10 minutes walk to Ubud’s main road or a 5 minute drive or ride to the centre of town where the local king’s palace and the market are located.</p>
            <p>The villa features a beautiful inground swimming pool set amongst a lush tropical style garden. It integrates the living spaces, including the wide pool surrounds, with the outdoors, allowing for a tranquil and very private environment.</p>
            <p>Enjoy the pool-side Bali hut with its traditional grass roof, wifi internet, the Bali styled high ceilings in all of the rooms, along with the sumptuous bedding on the Super King-sized single or double beds.
            </p>
            <p>Each of the 3 bedrooms can be booked separately as a Bed and Breakfast set-up or you can book and enjoy the whole villa exclusively with just you and your family or friends or perhaps just for a romantic holiday as a couple.</p>
            <p>The word ‘liang’ in the Balinese language means ‘happy’. We want our villa to make you feel happy, comfortable and rested and for your time with us to be a memorable one.</p>
        </h1>
    </div>
</br>
    <!-- End About -->

    <!-- Foto -->
    <section class="container sproduct justify-content-center my-3">
        <div class="row mt-3"> 
            <div class="col-lg-5 col-xl-12 col-12">
                <img class="img-fluid w-100 pb-1" style="height: 50vh" src="img/foto/dining/AR307482_1600_1067.jpg" id="MainImg" alt="">
    
                <div class="small-img-group pt-1">
                    <div class="small-img-col pe-1">
                        <img src="img/foto/pool/Villa-Liang-Ubud-15.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col px-1">
                        <img src="img/foto/lounge/Villa-Liang-Ubud-6.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col px-1">
                        <img src="img/foto/kitchen/Villa-Liang-Ubud-32.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col px-1">
                        <img src="img/foto/bathroom/1550736331_21-02-2019_Bathroom_4b.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col px-1">
                        <img src="img/foto/kokokan room/1550737833_21-02-2019_Kokokan_1b.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col px-1">
                        <img src="img/foto/kutilang room/1550738174_21-02-2019_Kutilang_1b.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col ps-1">
                        <img src="img/foto/murai/1550738146_21-02-2019_Murai_1b-1.jpg" width="100%" class="small-img" alt="">
                    </div>
                </div>
            </div>

    </section>
    

    <script>
        var MainImg = document.getElementById('MainImg');
        var smallimg = document.getElementsByClassName('small-img');
        
        smallimg[0].onclick = function(){
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function(){
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function(){
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function(){
            MainImg.src = smallimg[3].src;
        }
        smallimg[4].onclick = function(){
            MainImg.src = smallimg[4].src;
        }
        smallimg[5].onclick = function(){
            MainImg.src = smallimg[5].src;
        }
        smallimg[6].onclick = function(){
            MainImg.src = smallimg[6].src;
        }
    </script>
    <!-- End Foto -->

    @include('partial.footer')
</body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>