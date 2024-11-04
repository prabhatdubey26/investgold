<!-- resources/views/index.blade.php -->
@extends('include/header_main')
@section('content')
<section class="pt-5">
        <div class="container">
            <div class="row"> 
        <div class="col-md-6 col-lg-6 pl-lg-6">
            <div class="headline">
                <h5>Buy & Sell Bullion 24/7, anytime & anywhere!!</h5>
                <p>
                    This innovative platform offers you a convenient way to trade Gold and Silver Bullion 24/7, with a user-friendly Mobile App called <br>
                    <span class="textcolor"> Investgold24/7</span>.</p>
            </div>
           <div class="row">
            <h6>Download the<span class="textcolor"> INVESTGOLD 247 App </span> today...</h6>
            <div class="col-md-6 col-lg-6 pl-lg-6">
                <img src="{{ asset('assets/storage/img/investimg1.png') }}" alt="img" width="100%">
            </div>
            
           </div>
        </div>

        <div class="col-6 mobile-img">
            <img src="{{ asset('assets/storage/img/investimg.png') }}" alt="img" width="100%">
        </div>
    </div>
    </div>
    </section>

    <!--video box-->
 <section class=" videobox">
<div class="container">

<div class="row">
    <div class="col-md-6 col-lg-6 pl-lg-6">
        <div class="heding-title">
          <p>WATCH INTRODUCTION</p>
        </div>
        <div class="ytbox">

          
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/YEe3tp5oE-E?si=1HfStVvI3WKKUjPP" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
    </div>

    <div class="col-md-6 col-lg-6 pl-lg-6">
        <div class="heding-title">
            <p>WATCH REGISTRATION GUIDE</p>
        </div>
        <div class="ytbox">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/YEe3tp5oE-E?si=1HfStVvI3WKKUjPP" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> 
		</div>  
	</div>
</div>
</div>
</section>
</div>

</body>
@endsection
