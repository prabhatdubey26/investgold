<!-- resources/views/index.blade.php -->
@extends('include/header_main')
@section('title', 'Mauritius')
@section('content')

 <section class=" videobox">
<div class="container">

<div class="row">
    <div class="col-md-6 col-lg-6 pl-lg-6">

 <div class="heding-title">
          <p>BUY GOLD PRODUCTS</p>
        </div>

<div id="comp-lzjwus7z" class="MazNVa comp-lzjwus7z wixui-image rYiAuL" title="Gold Rounds"><a data-testid="linkElement" href="{{ route('mauritius_goldproducts') }}" target="_self" class="j7pOnl">
<img src="{{ asset('assets/storage/img/SkewCardgold.png') }}" alt="Gold Bullion" style="width:182px;height:450px;object-fit:cover;margin: 0px 140px;" width="182" height="450" srcSet="{{ asset('assets/storage/img/SkewCardgold.png') }}" fetchpriority="high"/></a></div>


    </div>

    <div class="col-md-6 col-lg-6 pl-lg-6">
         <div class="heding-title">
          <p>BUY SILVER PRODUCTS</p>
        </div>
      <div id="comp-lzcnq7d3" class="MazNVa comp-lzcnq7d3 wixui-image rYiAuL" title="Silver Rounds"><a data-testid="linkElement" href="{{ route('mauritius_silverproducts') }}" target="_self" class="j7pOnl"><img src="{{ asset('assets/storage/img/SkewCard.png') }}" alt="Skew Card.png" style="width:182px;height:450px;object-fit:cover;margin: 0px 140px;" width="182" height="450" srcSet="{{ asset('assets/storage/img/SkewCard.png') }}" fetchpriority="high"/></a></div>
	</div>
</div>
</div>
</section>
@endsection
