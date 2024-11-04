<!-- resources/views/index.blade.php -->

@extends('include/header_main')
@section('title', 'Product Gallery')
@section('content')
 <section class=" videobox">
<div class="container">

<div class="row">
  
<div class="container mt-5">
  <h2>Product Gallery</h2>
</div>

<div class="container products">
  <div class="row">
   
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="card mb-4">
        <img
          src="{{ asset('assets/storage/img/products/1ozAmericanGold BuffaloCoinBack.png') }}"
          class="card-img-top img-size"
          alt="1 oz American Gold Buffalo Coin Back"
        />
        <div class="card-body">
          <h5 class="card-title">1 oz American Gold Buffalo Coin Back</h5>
          <p class="card-text">
            Test
          </p>
          <p class="card-text">
            <strong>Price: </strong> $100
          </p>
          <a
            href="javascript:void(0);"
            data-product-id="11"
            id="add-cart-btn-11
            class="btn btn-warning btn-block text-center add-cart-btn add-to-cart-button"
            >Add to cart</a
          >
          <span
            id="adding-cart-11"
            class="btn btn-warning btn-block text-center added-msg"
            style="display: none"
            >Added.</span
          >
        </div>
      </div>
    </div>
	<div class="col-xs-12 col-sm-6 col-md-4">
      <div class="card mb-4">
        <img
          src="{{ asset('assets/storage/img/products/GoldEagleCoin.png') }}"
          class="card-img-top img-size"
          alt="1 oz American Gold Eagle Coin (Common Date) Front"
        />
        <div class="card-body">
          <h5 class="card-title">1 oz American Gold Eagle Coin (Common Date) Front</h5>
          <p class="card-text">
            Test
          </p>
          <p class="card-text">
            <strong>Price: </strong> $100
          </p>
          <a
            href="javascript:void(0);"
            data-product-id="11"
            id="add-cart-btn-11
            class="btn btn-warning btn-block text-center add-cart-btn add-to-cart-button"
            >Add to cart</a
          >
          <span
            id="adding-cart-11"
            class="btn btn-warning btn-block text-center added-msg"
            style="display: none"
            >Added.</span
          >
        </div>
      </div>
    </div>
  
  </div>
</div>
   

   
</div>
</div>
</section>

@endsection
