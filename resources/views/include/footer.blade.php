
<section class="top">
    <div class="container">

    <div class="row">
	<div class="footerbox col-lg-2">
         </div>
       <div class="footerbox col-lg-2">
        <img src="{{ asset('assets/storage/img/facebook.png') }}" alt="facebook">
       </div>
       <div class="footerbox col-lg-4">
        <p>© 2024 INVESTGOLD 247 <span class="textcolor">  POPI ACT 2021 <br>

            INVESTGOLD T&C'S |  AML Policy (Anti-Money Laundering)<br>
            
            </span>Gold & Silver Bullion Dealer - SOUTH AFRICA</p>
       </div>
       <div class="footerbox col-lg-4">
	   <ul class="footer-menu-about">
@foreach($navigations->where('type', 5) as $navigation)
        <li>
            <a href="{{ $navigation->link }}">{{ $navigation->title }}</a>
        </li>
@endforeach
</ul>

       
       </div>
    </div>
</div>
</section>

{{-- <script src="{{ asset('assets/storage/js/jquery-3.7.1.min.js') }}"></script> --}}
<script src="{{ asset('assets/storage/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/storage/js/popup_custom.js') }}"></script>

</html>