<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>

    @include('partial.style')
</head>
<body>
    @include('partial.navbar')



    <div class="container" data-aos="zoom-in">
        <h1 class="text-center mt-5">
            <span class="banner1 about">CONTACT</span>
        </h1>    
    </div>
    <hr data-aos="zoom-in">
</br>    

    <div class="container">
        <div class="row">
            <div class="col-md-6"  data-aos="fade-right">
                <div class="container">
                    <h1 class="about font-bold">Contact Detail</h1>
                    <h1 class="text paragraf">
                        <p>Location</p>
                        <p>Jl. Tirta Tawar, Petulu, Kutuh Kaja, Ubud, Bali</p>
                    </br>
                        <p>Email</p>
                        <p>villaliangubud@gmail.com</p>
                    </br>
                        <p>Phone</p>
                        <p>(+62) 81936172951</p>
                    </h1>
                </div>
            </div>

            <div class="col-md-6"  data-aos="fade-left">
                {{-- maps --}}
                <div class="container">
                    <div class="embed-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7809.736958908297!2d115.26567240568887!3d-8.502064554965266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23da6d68ea3c7%3A0xe200b73a9d47edb4!2sVilla%20Liang%20Ubud!5e1!3m2!1sid!2sid!4v1687610958006!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        
                    </div>
                </div>
            </div>
        </br>    
        </br>    
        </br>  
        </div>
    </div>

    <footer>
        @include('partial.footer')
    </footer>
</body>
</html>