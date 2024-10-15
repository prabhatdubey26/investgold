
@include('include/header_main')
@include('include/header')


 <section class=" videobox">
<div class="container">

<div class="row">
   
  @foreach($products as $product)
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="card mb-4">
      <img src="{{ asset('assets/storage/img/products/Mauritius/Gold/') }}/{{$product->image}}" style="width:60%;margin-left: 45px;" alt="1 oz American Silver Buffalo Coin Back"/>
      <div class="card-body text-center">
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">
          <strong>Price: </strong>MUR {{$product->price}}
        </p>
        @if(!empty(session('user_id')))
        <button data-id="{{$product->id}}" data-name="{{$product->title}}" data-summary="{{$product->type}}" data-price="{{$product->price}}" data-quantity="1" data-image="{{ asset('assets/storage/img/products/Mauritius/Gold/') }}/{{$product->image}}" class="btn btn-danger btn-sm my-cart-btn">Add to cart</button>
    
       @else
       <button class="btn btn-danger btn-sm" onclick="openLoginPopup1()">Login to Add to Cart</button>
       @endif
        <span
          id="adding-cart-{{$product->id}}"
          class="btn btn-warning btn-block text-center added-msg"
          style="display: none"
          >Added.</span
        >
      </div>
    </div>
  </div>
  @endforeach
	{{-- <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="card mb-4">
    <img src="{{ asset('assets/storage/img/products/Mauritius/Gold/1kg Gold Medallion.png') }}"
     style="width:60%;margin-left: 45px;" alt="1 oz American Gold Eagle Coin Front"/>
        <div class="card-body">
          <h5 class="card-title">1 KG Gold Medallion</h5>
          
          <p class="card-text">
            <strong>Price: </strong>MUR {{$onekg}}
          </p>
          <a href="javascript:void(0);" data-product-id="2"  id="add-cart-btn-2"
         class="add-to-cart-button">Add to cart</a>
          <span
            id="adding-cart-2"
            class="btn btn-warning btn-block text-center added-msg"
            style="display: none"
            >Added.</span
          >
        </div>
      </div>
    </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="card mb-4">
    <img src="{{ asset('assets/storage/img/products/Mauritius/Gold/1oz Gold Medallion.png') }}"
     style="width:60%;margin-left: 45px;" alt="1 oz American Gold Eagle Coin Front"/>
        <div class="card-body">
          <h5 class="card-title">1 oz Gold Medallion</h5>
          
          <p class="card-text">
            <strong>Price: </strong>MUR {{$value}}
          </p>
          <a href="javascript:void(0);" data-product-id="3"  id="add-cart-btn-3"
         class="add-to-cart-button">Add to cart</a>
          <span id="adding-cart-3" class="btn btn-warning btn-block text-center added-msg" style="display: none" >Added.</span>
        </div>
      </div>
    </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="card mb-4">
    <img src="{{ asset('assets/storage/img/products/Mauritius/Gold/2oz Gold Medallion.png') }}"
     style="width:60%;margin-left: 45px;" alt="1 oz American Gold Eagle Coin Front"/>
        <div class="card-body">
          <h5 class="card-title">2 oz Gold Medallion</h5>
          
          <p class="card-text">
            <strong>Price: </strong>MUR {{$twooz}}
          </p>
          <a href="javascript:void(0);" data-product-id="4"  id="add-cart-btn-4"
         class="add-to-cart-button">Add to cart</a>
          <span id="adding-cart-4" class="btn btn-warning btn-block text-center added-msg" style="display: none">Added.</span>
        </div>
      </div>
    </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="card mb-4">
        <img src="{{ asset('assets/storage/img/products/Mauritius/Gold/5oz Gold Medallion.png') }}" style="width:60%;margin-left: 45px;" alt="1 oz American Gold Buffalo Coin Back"/>
        <div class="card-body">
          <h5 class="card-title">5 oz Gold Cast Bar</h5>
          
          <p class="card-text">
            <strong>Price: </strong>MUR {{$fiveoz}}
          </p>
          <a href="javascript:void(0);" data-product-id="5"  id="add-cart-btn-5"
         class="add-to-cart-button">Add to cart</a>
          <span id="adding-cart-5" class="btn btn-warning btn-block text-center added-msg" style="display: none">Added.</span>
        </div>
      </div>
    </div>
	<div class="col-xs-12 col-sm-6 col-md-3">
      <div class="card mb-4">
    <img src="{{ asset('assets/storage/img/products/Mauritius/Gold/10g Gold Minted Bar.png') }}"
     style="width:60%;margin-left: 45px;" alt="1 oz American Gold Eagle Coin Front"/>
        <div class="card-body">
          <h5 class="card-title">10 Gram Gold Medallion</h5>
          
          <p class="card-text">
            <strong>Price: </strong>MUR {{$tengram}}
          </p>
          <a href="javascript:void(0);" data-product-id="6"  id="add-cart-btn-6"
         class="add-to-cart-button">Add to cart</a>
          <span id="adding-cart-6" class="btn btn-warning btn-block text-center added-msg" style="display: none">Added.</span>
        </div>
      </div>
    </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="card mb-4">
    <img src="{{ asset('assets/storage/img/products/Mauritius/Gold/50g Gold Minted Bar.png') }}"
     style="width:60%;margin-left: 45px;" alt="1 oz American Gold Eagle Coin Front"/>
        <div class="card-body">
          <h5 class="card-title">20 Gram Gold Medallion</h5>
          
          <p class="card-text">
            <strong>Price: </strong>MUR {{$twentygram}}
          </p>
          <a href="javascript:void(0);" data-product-id="7"  id="add-cart-btn-7"
         class="add-to-cart-button">Add to cart</a>
          <span id="adding-cart-7" class="btn btn-warning btn-block text-center added-msg" style="display: none">Added.</span>
        </div>
      </div>
    </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="card mb-4">
    <img src="{{ asset('assets/storage/img/products/Mauritius/Gold/100g Gold Minted Bar.png') }}"
     style="width:60%;margin-left: 45px;" alt="1 oz American Gold Eagle Coin Front"/>
        <div class="card-body">
          <h5 class="card-title">100 Gram Gold Medallion</h5>
          
          <p class="card-text">
            <strong>Price: </strong>MUR {{$hundredgram}}
          </p>
          <a href="javascript:void(0);" data-product-id="8"  id="add-cart-btn-8"
         class="add-to-cart-button">Add to cart</a>
          <span id="adding-cart-8" class="btn btn-warning btn-block text-center added-msg" style="display: none">Added.</span>
        </div>
      </div>
    </div>
  
  </div> --}}
</div>
</section>
@include('include/footer')
