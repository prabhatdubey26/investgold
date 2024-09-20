<!-- resources/views/index.blade.php -->


@include('include/header_main')
@include('include/header')


 <section class=" videobox">
<div class="container">

<div class="row">
    <div class="col-md-6 col-lg-6 pl-lg-6">
         <div class="heding-title">
          <p>BUY SOUTHAFRICAN PRODUCTS</p>
        </div>
        <div class="ytbox">
		<a href="{{ route('southafrica') }}">
		<img src="{{ asset('assets/storage/img/sa.png') }}" alt="img" width="100%">
          </a>
             </div>
    </div>

    <div class="col-md-6 col-lg-6 pl-lg-6">
         <div class="heding-title">
          <p>BUY MAURITIAN PRODUCTS</p>
        </div>
        <div class="ytbox">
		<a href="{{ route('mauritius') }}">
		<img src="{{ asset('assets/storage/img/maleshiya.png') }}" alt="img" width="100%"> </a>
        </div>  
	</div>
</div>
</div>
</section>

@include('include/footer')
