<!-- resources/views/index.blade.php -->


@include('include/header_main')
@include('include/header')

 <section class=" videobox">
<div class="container">

<div class="row">
   
  @foreach($products as $product)
    <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="card mb-4">
        <img src="{{ asset('assets/storage/img/products/South Africa/') }}/{{$product->image}}" style="width:60%;margin-left: 45px;" alt="1 oz American Silver Buffalo Coin Back"/>
        <div class="card-body text-center">
          <h5 class="card-title">{{$product->title}}</h5>
          <p class="card-text">
            <strong>Price: </strong>MUR {{$product->price}}
          </p>
          @if(!empty(session('user_id')))
          <button data-id="{{$product->id}}" data-name="{{$product->title}}" data-summary="{{$product->type}}" data-price="{{$product->price}}" data-quantity="1" data-image="{{ asset('assets/storage/img/products/South Africa/') }}/{{$product->image}}" class="btn btn-danger btn-sm my-cart-btn">Add to cart</button>
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
</div>
</section>
@include('include/footer')