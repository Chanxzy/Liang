<!DOCTYPE html>
@include('partial.style')

<footer>
    <section class="" data-aos="fade-down">
        <div class="row mt-5 container-fluid" style="background-color: #D9D9D9; background-size: cover; background-position: center;">
            <div class="col-lg col-sm col-6" >
                <a href="#">
                    <img class="img-fluid" style="margin-top: 100px" src="{{asset('img/foto/villaliang-logo-02.png')}}" hight="187px" width="391px" alt="" />
                </a>
            </div>
    
            <div class="col-sm-6 col-md-4 ">
                <h1 class="about text pt-5 responsive-text" style="font-weight: bold;">Contact</h1>
                <a href="villaliangubud@gmail.com" class="pe-2 text text-footer1 responsive-text1">
                    <i>
                        <img src="{{ asset('img/icon/mail (1).png') }}" style="max-width: 44px; height: auto;" class="no-underline" alt="">
                    </i> 
                    villaliangubud@gmail.com
                </a>
            </br>                
                <a href="(+62) 2081936172951" class="pe-2 text-footer1 responsive-text1">
                    <i>
                        <img src="{{ asset('img/icon/phone.png') }}" style="width: 44px; height: 44px"  alt="">
                    </i> 
                    (+62) 2081936172951
                </a>                
            </br>
                <a href="https://goo.gl/maps/a5b4Y2k5AiAecj5c7?coh=178573&entry=tt" class="pe-2 text-footer1 responsive-text1">
                    <i>
                        <img src="{{ asset('img/icon/location.png') }}" style="width: 44px; height: 44px"  alt="">
                    </i> 
                    Jl. Tirta Tawar, Petulu, Kutuh Kaja, Ubud, Bali
                </a>                
            </div>

            <div  class="col-sm-6 col-md-4">
                <h4 class="about pt-5 responsive-text" style="font-weight: bold;">Find us on</h4>
                <a href="https://www.facebook.com/villaliangubudgianyar" class="no-underline">
                    <img src="{{ asset('img/icon/facebook.png') }}" style="width: 44px; height: 44px" alt="">
                </a>

                <a href="https://www.instagram.com/villaliangubud/" class="no-underline">
                    <img src="{{ asset('img/icon/instagram (1).png') }}" style="width: 44px; height: 44px" alt="">
                </a>
            </div>
        </div>
    </section>
</footer>
</html>