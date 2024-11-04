<!-- resources/views/index.blade.php -->

@extends('include/header_main')
@section('title', 'South Africa Products')
@section('content')
 <section class=" videobox">
<div class="container">
<div class="row">
    <div class="col-md-6 col-lg-6 pl-lg-6">

 <div class="heding-title">
          <p>BUY GOLD PRODUCTS</p>
        </div>

<a data-testid="linkElement" href="{{ route('sa_goldproducts') }}" target="_self" class="j7pOnl">
<img src="{{ asset('assets/storage/img/products/South Africa/coins-01.png') }}" style="padding-left: 100px;" alt="Gold Bullion" srcSet="{{ asset('assets/storage/img/products/South Africa/coins-01.png') }}" /></a>


    </div>

    <div class="col-md-6 col-lg-6 pl-lg-6">
         <div class="heding-title">
          <p>BUY SILVER PRODUCTS</p>
        </div>
     <a data-testid="linkElement" href="{{ route('sa_silverproducts') }}" target="_self" class="j7pOnl">
	  <img src="{{ asset('assets/storage/img/products/South Africa/1oz Silver Krugerrand.png') }}" style="width: 335px;padding-left: 100px;" alt="Gold Bullion" srcSet="{{ asset('assets/storage/img/1oz Silver Krugerrand.png') }}" fetchpriority="high"/></a>
	</div>
</div>
</div>
</section>
@endsection
