<!-- resources/views/index.blade.php -->


@include('include/header_main')
@include('include/header')

<div>
<body>
<main id="page-home">
    <script src="{{ asset('assets/storage/js/jssor.slider.min.js') }}" type="text/javascript"></script>
    <script charset="utf-8" src="{{ asset('assets/storage/js/custom/slider.js') }}" type=""></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/storage/css/custom_style.css') }}" />
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
        @foreach($sliders as $slider)
        <div>
            <img data-u="image" src="{{ asset('sliders/' . $slider->image_path) }}" />
            <!-- Optionally, add additional content -->
            <div style="position: absolute; top: 300px; left: 30px; width: 480px; height: 130px; z-index: 0; background-color: rgba(255, 188, 5, 0.8); font-size: 30px; color: #000000; line-height: 38px; padding: 5px; box-sizing: border-box;">{{ $slider->description }}</div>
        </div>
        @endforeach
           
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->

<section class="section-spot-prices">
<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
<p class="strong text-gold">
<a href="#">
Gold Spot Price
</a>
</p>
</div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
<p><span>$2,349.70 / oz</span></p>
</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
<p>
<span><span class="text-success"><span class="fa fa-caret-up"></span> 0.61%</span> $14.30</span>
</p>
</div>
<div class="col-actions col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-xs hidden-sm">
<a href="#" style="display: block; color: black;">
Gold charts <span class="fa fa-line-chart"></span>
</a>
</div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
<a href="#" class="btn btn-primary btn-block">
Buy Gold <span class="fa fa-chevron-right"></span>
</a>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
<p class="strong text-silver">
<a href="#">
Silver Spot Price
</a>
</p>
</div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
<p><span>$28.07 / oz</span></p>
</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
<p>
<span><span class="text-success"><span class="fa fa-caret-up"></span> 0.29%</span> $0.08</span>
</p>
</div>
<div class="col-actions col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-xs hidden-sm">
<a href="#" style="display: block; color: black;">
Silver charts <span class="fa fa-line-chart"></span>
</a>
</div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
<a href="#" class="btn btn-primary btn-block">
Buy Silver <span class="fa fa-chevron-right"></span>
</a>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
<p class="strong text-normal">
<a href="#">
Gold / Silver Ratio
</a>
</p>
</div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
<p><span>83.71</span></p>
</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
<p>
<span><span class="text-success"><span class="fa fa-caret-up"></span> 0.32%</span></span>
</p>
</div>
<div class="col-actions col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-xs hidden-sm">
<a href="#" style="display: block; color: black;">
Ratio charts <span class="fa fa-line-chart"></span>
</a>
</div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
</div>
</div>
</div>
</section>
<section class="section-news">
<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-8 col-md-push-4 col-lg-8 col-lg-push-4 col-news">
<h2>Industry News</h2>
<div class="row">
<div class="row">
        @foreach($news as $news)
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <article class="card-article card-article-condensed">
                <div class="card-article_text">
                    <p class="h3 card-article_title">
                        <a href="#" target="_blank" id="featured-article">
                            {{$news->title}}
                        </a>
                    </p>
                </div>
            </article>
        </div>
        @endforeach        
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-md-pull-8 col-lg-4 col-lg-pull-8 col-featured">
@foreach($team->take(4) as $member)
    <article class="card-article card-article-stacked">
        <p class="card-article_image">
            <a href="#" target="_self" id="featured-article">
                <img data-u="image" src="{{ asset('photos/' . $member->url) }}" class="img-responsive" alt="See full story: Gold and Bitcoin: Vital Challengers to Fiat Currencies"/>
            </a>
        </p>
        <div class="card-article_text">
            <p class="h3 card-article_title">
                <a href="#" target="_self" id="featured-article">
                    {{$member->title}}
                </a>
            </p>
        </div>
    </article>
    @endforeach
    <a href="#" class="btn btn-primary">
        More exclusives <span class="fa fa-chevron-right"></span>
    </a>
</div>
</div>
</div>
</section>
<section class="section-newsletter" style="background-image: url('assets/storage/re/common/assets/images/newsletter-bg.jpg'); background-size: cover; background-position: center center; margin-bottom: 0;">
<div class="container-fluid">
<p class="h3">Stay Informed, Stay Profitable</p>
<p>Join Our Newsletter</p>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
<div class="collapse-subscribe-success collapse">
<div class="alert alert-success text-center" style="margin: 0; background: #102138; border-color: #102138; color: white;">
<p>You have subscribed!</p>
</div>
</div>
<div class="collapse-subscribe collapse in">
<form class="form-subscribe">
<div class="form-group" style="margin-bottom: 0;">
<label class="sr-only">Email address</label>
<div class="row">
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-input">
<input type="email" class="form-control" placeholder="Email address&hellip;" name="subscribe" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-submit">
<button type="submit" class="btn btn-block btn-primary">Submit</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<section class="section-products" style="background-image: url('assets/storage/re/common/assets/images/products-bg.jpg'); background-size: cover; background-position: center center; margin-top: 0;">
<div class="container-fluid">
<h2>The Best Selection, at the Best Price</h2>
<p>We make it a point to only carry a selection investor-grade precious metals. That's the most popular coins and bars, with low premiums and with ample demand to make selling just as easy and affordable. We even guarantee our price is the best, or we'll match it.</p>
<div id="product-container-gold" class="product-container ">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
<h3>Most Popular Gold Products</h3>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-right hidden-xs">
<a href="#" class="btn btn-default" style="min-width: 200px;">
Browse more gold <span class="fa fa-chevron-right"></span>
</a>
</div>
</div>
<div class="row row-products">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="item-coin" style="width: 100%;margin: 0;">
<div class="item-coin-info">
<h4 class="item-coin-name" style="word-wrap: break-word;">
<a data-product href="buy-online/instavault-gold-1-100th-ounce/index.html" class="product-title">
InstaVault Gold – (1/100th troy oz increments) </>
</h4>
<div class="item-coin-image">
<a class="product-image" href="buy-online/instavault-gold-1-100th-ounce/index.html" data-product="1037">
<img alt="InstaVault Gold – (1/100th troy oz increments)" width="200" title="InstaVault Gold – (1/100th troy oz increments)" border="0" src="{{ asset('assets/storage/img/products/thumbs/1-oz-american-gold-eagle-coin-BACK.jpg') }}" />
</a>
</div>
<div class="product-sku"></div>
<div class="item-coin-price-wrapper">
<div class="item-coin-as-low-as">
<span class>As low as</span>
</div>
<div class="item-coin-price">$24.00</div>
</div>
</div>
<form action="http://goldsilver.com/buy-online/instavault-gold-1-100th-ounce/?action=add_product" method="POST" name="order_form" class="item-coin-action" data-product-name="InstaVault Gold – (1/100th troy oz increments)" data-product-id="1037" data-product-price="24.00" data-product-brand data-product-category="Gold" onsubmit="if (!window.__cfRLUnblockHandlers) return false; event.preventDefault();" data-cf-modified-af58cf1c5e326eef6b4c8362->
<input type="hidden" name="gs_token_secure" value="171285407170375">
<input type="hidden" name="id" value="1037">
<input type="hidden" name="type" value="coin">
<input type="hidden" name="return_page" value="metal">
<input type="hidden" name="show_id" value="1">
<input type="hidden" name="metal_type" value="32">
<input type="hidden" name="supplier" value="36">
<div class="item-coin-quantity-wrapper">
<input type="number" name="cart_quantity" id="cart_quantity" class="item-coin-quantity" size="7" value="1" max min="0">
</div>
<input type="submit" class="item-coin-buy" name="order_quantity_submit" style="float: right;" value="Add to Cart">
<p class="hidden error-message">Please use valid input.</p>
</form>
<div class="item-coin-quantity-prices-wrapper">
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">1-999</div>
<div class="item-coin-quantity-range-price">$24.30</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">1000+</div>
<div class="item-coin-quantity-range-price">$24.00</div>
</div>
<div class="item-coin-quantity-price">
<a href="#" class="item-coin-quantity-price-details">More Details</a>
</div>
<div class="item-coin-quantity-price item-coin-quantity-backdrop" style="color: #333;">
Instantly Available - STORAGE ONLY </div>
</div>
<input type="hidden" id="product_object_1037" data-product-name="InstaVault Gold – (1/100th troy oz increments)" data-product-price="24.00" data-product-brand data-product-category="Gold" data-product-list="Home" data-product-position data-product-url="//goldsilver.com/buy-online/instavault-gold-1-100th-ounce/" value />
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="item-coin" style="width: 100%;margin: 0;">
<div class="item-coin-info">
<h4 class="item-coin-name" style="word-wrap: break-word;">
<a data-product href="buy-online/1-oz-american-gold-eagle-coin-2024/index.html" class="product-title">
1 oz American Gold Eagle Coin (2024) </>
</h4>
<div class="item-coin-image">
<a class="product-image" href="buy-online/1-oz-american-gold-eagle-coin-2024/index.html" data-product="1045">
<img alt="1 oz American Gold Eagle Coin (2024)" width="200" title="1 oz American Gold Eagle Coin (2024) - Front View" border="0" src="{{ asset('assets/storage/img/products/thumbs/1-oz-american-gold-eagle-coin-BACK.jpg') }}" />
</a>
</div>
<div class="product-sku"></div>
<div class="item-coin-price-wrapper">
<div class="item-coin-as-low-as">
<span class>As low as</span>
</div>
<div class="item-coin-price">$2,475.07</div>
</div>
</div>
<form action="http://goldsilver.com/buy-online/1-oz-american-gold-eagle-coin-2024/?action=add_product" method="POST" name="order_form" class="item-coin-action" data-product-name="1 oz American Gold Eagle Coin (2024)" data-product-id="1045" data-product-price="2,475.07" data-product-brand="US Mint" data-product-category="Gold" onsubmit="if (!window.__cfRLUnblockHandlers) return false; event.preventDefault();" data-cf-modified-af58cf1c5e326eef6b4c8362->
<input type="hidden" name="gs_token_secure" value="171285407170375">
<input type="hidden" name="id" value="1045">
<input type="hidden" name="type" value="coin">
<input type="hidden" name="return_page" value="metal">
<input type="hidden" name="show_id" value="1">
<input type="hidden" name="metal_type" value="32">
<input type="hidden" name="supplier" value="6">
<div class="item-coin-quantity-wrapper">
<input type="number" name="cart_quantity" id="cart_quantity" class="item-coin-quantity" size="7" value="1" max min="0">
</div>
<input type="submit" class="item-coin-buy" name="order_quantity_submit" style="float: right;" value="Add to Cart">
<p class="hidden error-message">Please use valid input.</p>
</form>
<div class="item-coin-quantity-prices-wrapper">
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">1-9</div>
<div class="item-coin-quantity-range-price">$2,485.07</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">10-19</div>
<div class="item-coin-quantity-range-price">$2,480.07</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">20+</div>
<div class="item-coin-quantity-range-price">$2,475.07</div>
</div>
<div class="item-coin-quantity-price">
<a href="#" class="item-coin-quantity-price-details">More Details</a>
</div>
<div class="item-coin-quantity-price item-coin-quantity-backdrop" style="color: #333;">
DELIVERY ONLY - In Stock </div>
</div>
<input type="hidden" id="product_object_1045" data-product-name="1 oz American Gold Eagle Coin (2024)" data-product-price="2,475.07" data-product-brand="US Mint" data-product-category="Gold" data-product-list="Home" data-product-position data-product-url="//goldsilver.com/buy-online/1-oz-american-gold-eagle-coin-2024/" value />
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="item-coin" style="width: 100%;margin: 0;">
<div class="item-coin-info">
<h4 class="item-coin-name" style="word-wrap: break-word;">
<a data-product href="buy-online/1-oz-gold-bar/index.html" class="product-title">
1 oz Gold Bar - Various Mints </>
</h4>
<div class="item-coin-image">
<a class="product-image" href="buy-online/1-oz-gold-bar/index.html" data-product="481">
<img alt="1 oz Gold Bar - Our Choice" width="200" title="1 oz Gold Bar - Our Choice" border="0" src="{{ asset('assets/storage/img/products/thumbs/1%20oz%20Gold%20Bar%20-%20Our%20Choice%20Fronts.png') }}" />
</a>
</div>
<div class="product-sku"></div>
<div class="item-coin-price-wrapper">
<div class="item-coin-as-low-as">
<span class>As low as</span>
</div>
<div class="item-coin-price">$2,399.70</div>
</div>
</div>
<form action="http://goldsilver.com/buy-online/1-oz-gold-bar/?action=add_product" method="POST" name="order_form" class="item-coin-action" data-product-name="1 oz Gold Bar - Various Mints" data-product-id="481" data-product-price="2,399.70" data-product-brand="Various Mints" data-product-category="Gold" onsubmit="if (!window.__cfRLUnblockHandlers) return false; event.preventDefault();" data-cf-modified-af58cf1c5e326eef6b4c8362->
<input type="hidden" name="gs_token_secure" value="171285407170375">
<input type="hidden" name="id" value="481">
<input type="hidden" name="type" value="bar">
<input type="hidden" name="return_page" value="metal">
<input type="hidden" name="show_id" value="1">
<input type="hidden" name="metal_type" value="32">
<input type="hidden" name="supplier" value="6">
<div class="item-coin-quantity-wrapper">
<input type="number" name="cart_quantity" id="cart_quantity" class="item-coin-quantity" size="7" value="1" max min="0">
</div>
<input type="submit" class="item-coin-buy" name="order_quantity_submit" style="float: right;" value="Add to Cart">
<p class="hidden error-message">Please use valid input.</p>
</form>
<div class="item-coin-quantity-prices-wrapper">
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">1-9</div>
<div class="item-coin-quantity-range-price">$2,403.70</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">10-24</div>
<div class="item-coin-quantity-range-price">$2,401.70</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">25+</div>
<div class="item-coin-quantity-range-price">$2,399.70</div>
</div>
<div class="item-coin-quantity-price">
<a href="#" class="item-coin-quantity-price-details">More Details</a>
</div>
<div class="item-coin-quantity-price item-coin-quantity-backdrop" style="color: #333;">
In Stock </div>
</div>
<input type="hidden" id="product_object_481" data-product-name="1 oz Gold Bar - Various Mints" data-product-price="2,399.70" data-product-brand="Various Mints" data-product-category="Gold" data-product-list="Home" data-product-position data-product-url="//goldsilver.com/buy-online/1-oz-gold-bar/" value />
</div>
</div>
</div>
</div>
<div id="product-container-silver" class="product-container ">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
<h3>Most Popular Silver Products</h3>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-right hidden-xs">
<a href="#" class="btn btn-default" style="min-width: 200px;">
Browse more silver <span class="fa fa-chevron-right"></span>
</a>
</div>
</div>
<div class="row row-products">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="item-coin" style="width: 100%;margin: 0;">
<div class="item-coin-info">
<h4 class="item-coin-name" style="word-wrap: break-word;">
<a data-product href="buy-online/instavault-silver-1-oz/index.html" class="product-title">
InstaVault Silver – (1 troy oz increments) </>
</h4>
<div class="item-coin-image">
<a class="product-image" href="buy-online/instavault-silver-1-oz/index.html" data-product="1038">
<img alt="InstaVault Silver – (1 troy oz increments)" width="200" title border="0" src="{{ asset('assets/storage/img/products/thumbs/1-oz-american-gold-eagle-coin-BACK.jpg') }}" />
</a>
</div>
<div class="product-sku"></div>
<div class="item-coin-price-wrapper">
<div class="item-coin-as-low-as">
<span class>As low as</span>
</div>
<div class="item-coin-price">$29.57</div>
</div>
</div>
<form action="http://goldsilver.com/buy-online/instavault-silver-1-oz/?action=add_product" method="POST" name="order_form" class="item-coin-action" data-product-name="InstaVault Silver – (1 troy oz increments)" data-product-id="1038" data-product-price="29.57" data-product-brand data-product-category="Silver" onsubmit="if (!window.__cfRLUnblockHandlers) return false; event.preventDefault();" data-cf-modified-af58cf1c5e326eef6b4c8362->
<input type="hidden" name="gs_token_secure" value="171285407170375">
<input type="hidden" name="id" value="1038">
<input type="hidden" name="type" value="coin">
<input type="hidden" name="return_page" value="metal">
<input type="hidden" name="show_id" value="1">
<input type="hidden" name="metal_type" value="31">
<input type="hidden" name="supplier" value="36">
<div class="item-coin-quantity-wrapper">
<input type="number" name="cart_quantity" id="cart_quantity" class="item-coin-quantity" size="7" value="1" max min="0">
</div>
<input type="submit" class="item-coin-buy" name="order_quantity_submit" style="float: right;" value="Add to Cart">
<p class="hidden error-message">Please use valid input.</p>
</form>
<div class="item-coin-quantity-prices-wrapper">
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">1-999</div>
<div class="item-coin-quantity-range-price">$29.86</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">1000+</div>
<div class="item-coin-quantity-range-price">$29.57</div>
</div>
<div class="item-coin-quantity-price">
<a href="#" class="item-coin-quantity-price-details">More Details</a>
</div>
<div class="item-coin-quantity-price item-coin-quantity-backdrop" style="color: #333;">
Instantly Available - STORAGE ONLY </div>
</div>
<input type="hidden" id="product_object_1038" data-product-name="InstaVault Silver – (1 troy oz increments)" data-product-price="29.57" data-product-brand data-product-category="Silver" data-product-list="Home" data-product-position data-product-url="//goldsilver.com/buy-online/instavault-silver-1-oz/" value />
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="item-coin" style="width: 100%;margin: 0;">
<div class="item-coin-info">
<h4 class="item-coin-name" style="word-wrap: break-word;">
<a data-product href="buy-online/1-oz-american-silver-eagle-coin-2024/index.html" class="product-title">
1 oz American Silver Eagle Coin (2024) </>
</h4>
<div class="item-coin-image">
<a class="product-image" href="buy-online/1-oz-american-silver-eagle-coin-2024/index.html" data-product="1046">
<img alt="1 oz American Silver Eagle Coin (2024)" width="200" title="1 oz American Silver Eagle Coin (2024)" border="0" src="{{ asset('assets/storage/img/products/thumbs/1-oz-american-silver-eagle-coin-BACK.jpg') }}" />
</a>
</div>
<div class="product-sku"></div>
<div class="item-coin-price-wrapper">
<div class="item-coin-as-low-as">
<span class>As low as</span>
</div>
<div class="item-coin-price">$36.47</div>
</div>
</div>
<form action="http://goldsilver.com/buy-online/1-oz-american-silver-eagle-coin-2024/?action=add_product" method="POST" name="order_form" class="item-coin-action" data-product-name="1 oz American Silver Eagle Coin (2024)" data-product-id="1046" data-product-price="36.47" data-product-brand="US Mint" data-product-category="Silver" onsubmit="if (!window.__cfRLUnblockHandlers) return false; event.preventDefault();" data-cf-modified-af58cf1c5e326eef6b4c8362->
<input type="hidden" name="gs_token_secure" value="171285407170375">
<input type="hidden" name="id" value="1046">
<input type="hidden" name="type" value="coin">
<input type="hidden" name="return_page" value="metal">
<input type="hidden" name="show_id" value="1">
<input type="hidden" name="metal_type" value="31">
<input type="hidden" name="supplier" value="6">
<div class="item-coin-quantity-wrapper">
<input type="number" name="cart_quantity" id="cart_quantity" class="item-coin-quantity" size="7" value="1" max min="0">
</div>
<input type="submit" class="item-coin-buy" name="order_quantity_submit" style="float: right;" value="Add to Cart">
<p class="hidden error-message">Please use valid input.</p>
</form>
<div class="item-coin-quantity-prices-wrapper">
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">1-19</div>
<div class="item-coin-quantity-range-price">$38.47</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">20-99</div>
<div class="item-coin-quantity-range-price">$37.97</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">100-499</div>
<div class="item-coin-quantity-range-price">$37.47</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">500+</div>
<div class="item-coin-quantity-range-price">$36.47</div>
</div>
<div class="item-coin-quantity-price">
<a href="#" class="item-coin-quantity-price-details">More Details</a>
</div>
<div class="item-coin-quantity-price item-coin-quantity-backdrop" style="color: #333;">
DELIVERY ONLY - In Stock </div>
</div>
<input type="hidden" id="product_object_1046" data-product-name="1 oz American Silver Eagle Coin (2024)" data-product-price="36.47" data-product-brand="US Mint" data-product-category="Silver" data-product-list="Home" data-product-position data-product-url="//goldsilver.com/buy-online/1-oz-american-silver-eagle-coin-2024/" value />
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="item-coin" style="width: 100%;margin: 0;">
<div class="item-coin-info">
<h4 class="item-coin-name" style="word-wrap: break-word;">
<a data-product href="buy-online/10-oz-silver-bar/index.html" class="product-title">
10 oz Silver Bar - Various Mints </>
</h4>
<div class="item-coin-image">
<a class="product-image" href="buy-online/10-oz-silver-bar/index.html" data-product="485">
<img alt="10 oz Silver Bar - Our Choice" width="200" title="10 oz Silver Bar - Our Choice" border="0" src="{{ asset('assets/storage/img/products/thumbs/10%20oz%20Silver%20Bar%20-%20Our%20Choice.png') }}" />
</a>
</div>
<div class="product-sku"></div>
<div class="item-coin-price-wrapper">
<div class="item-coin-as-low-as">
<span class>As low as</span>
</div>
<div class="item-coin-price">$314.20</div>
</div>
</div>
<form action="http://goldsilver.com/buy-online/10-oz-silver-bar/?action=add_product" method="POST" name="order_form" class="item-coin-action" data-product-name="10 oz Silver Bar - Various Mints" data-product-id="485" data-product-price="314.20" data-product-brand="Various Mints" data-product-category="Silver" onsubmit="if (!window.__cfRLUnblockHandlers) return false; event.preventDefault();" data-cf-modified-af58cf1c5e326eef6b4c8362->
<input type="hidden" name="gs_token_secure" value="171285407170375">
<input type="hidden" name="id" value="485">
<input type="hidden" name="type" value="bar">
<input type="hidden" name="return_page" value="metal">
<input type="hidden" name="show_id" value="1">
<input type="hidden" name="metal_type" value="31">
<input type="hidden" name="supplier" value="6">
<div class="item-coin-quantity-wrapper">
<input type="number" name="cart_quantity" id="cart_quantity" class="item-coin-quantity" size="7" value="1" max min="0">
</div>
<input type="submit" class="item-coin-buy" name="order_quantity_submit" style="float: right;" value="Add to Cart">
<p class="hidden error-message">Please use valid input.</p>
</form>
<div class="item-coin-quantity-prices-wrapper">
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">1-9</div>
<div class="item-coin-quantity-range-price">$321.20</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">10-49</div>
<div class="item-coin-quantity-range-price">$319.20</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">50-99</div>
<div class="item-coin-quantity-range-price">$316.20</div>
</div>
<div class="item-coin-quantity-price">
<div class="item-coin-quantity-range">100+</div>
<div class="item-coin-quantity-range-price">$314.20</div>
</div>
<div class="item-coin-quantity-price">
<a href="#" class="item-coin-quantity-price-details">More Details</a>
</div>
<div class="item-coin-quantity-price item-coin-quantity-backdrop" style="color: #333;">
In Stock </div>
</div>
<input type="hidden" id="product_object_485" data-product-name="10 oz Silver Bar - Various Mints" data-product-price="314.20" data-product-brand="Various Mints" data-product-category="Silver" data-product-list="Home" data-product-position data-product-url="//goldsilver.com/buy-online/10-oz-silver-bar/" value />
</div>
</div>
</div>
</div>
<div class="row" style="margin-top: 2.4em;">
<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
<a href="#" class="btn btn-block btn-default">Browse most popular products <span class="fa fa-chevron-right"></span></a>
</div>
</div>
</div>
</section>
<section class="section-more">
<div class="container-fluid">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-more-articles">
        <h2>More From Our Team</h2>
        <div class="row">
            @foreach($team->take(4) as $member)
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <article class="card-article card-article-stacked">
                    <p class="card-article_image">
                        <a href="#" target="_self" id="featured-article">
                            <img data-u="image" src="{{ asset('photos/' . $member->url) }}" class="img-responsive" alt="See full story: {{$member->title}}"/>
                        </a>
                    </p>
                    <div class="card-article_text">
                        <p class="h3 card-article_title">
                            <a href="#" target="_self" id="featured-article">
                                {{$member->title}}
                            </a>
                        </p>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        
        <a href="#" class="btn btn-primary">
            More InvestGold exclusives <span class="fa fa-chevron-right"></span>
        </a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <h2 class="h3"><a href="#">Investing Guide</a></h2>
        <p>Not sure where to start? We've got you covered. Explore our guide to precious metals investing so you know exactly what to buy, how to sell, and how to keep it safe.</p>
        <nav>
            <ul class="nav nav-stacked nav-pills">
                <li><a href="#"><span>Understanding the Market</span><span class="fa fa-chevron-right"></span></a></li>
                <li><a href="#"><span>What to Buy</span><span class="fa fa-chevron-right"></span></a></li>
                <li><a href="#"><span>How to Buy</span><span class="fa fa-chevron-right"></span></a></li>
                <li><a href="#"><span>Selling Bullion</span><span class="fa fa-chevron-right"></span></a></li>
                <li><a href="#"><span>Storage and Care</span><span class="fa fa-chevron-right"></span></a></li>
            </ul>
        </nav>
    </div>
</div>

    
</div>
</section>
<section class="section-why">
<div class="container-fluid">
<div class="row">
<div class="col-copy col-xs-12 col-sm-12 col-md-7 col-lg-7">
<p class="subtitle">Trusted &amp; Proven</p>
<h2>Why InvestGold.com?</h2>
<p>For over a decade, InvestGold.com has been a leader in gold and silver investment, serving customers in virtually every country. InvestGold.com offers only the most liquid, low cost investment-grade bullion products, available for global delivery or storage in our network of secure, third-party vaults around the world.</p>
<p>Our goal is to make investing in precious metals as easy as possible. You can order online 24x7. Or, if you prefer to order over the phone or have questions about vault storage, home delivery, or products, you can call, chat online, or email us and we'll be happy to help.</p>
</div>
<div class="col-actions col-xs-12 col-sm-12 col-md-4 col-md-offset-1 col-lg-4">
<p class="clearfix">
<a href="#" class="btn-chat">
<span class="circle"><span class="fa fa-comment"></span></span>
<span><strong>Chat</strong> With Us</span>
</a>
</p>
<p class="clearfix">
<a href="tel:18883198166">
<span class="circle"><span class="fa fa-phone"></span></span>
<span><strong>Call</strong> 1-888-319-8166</span>
</a>
</p>
<p class="clearfix">
<a href="#">
<span class="circle"><span class="fa fa-envelope"></span></span>
<span><strong>Email</strong> Anytime</span>
</a>
</p>
</div>
</div>
</div>
</section>
<section class="section-newsletter section-newsletter-alt" style="background-image: url('assets/storage/re/common/assets/images/newsletter-alt-bg.png'); background-size: cover; background-position: center center; margin-bottom: 0; margin-top: 0;">
<div class="container-fluid">
<p class="h3" style="margin-bottom: 32px;">Join Our Newsletter Today</p>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
<div class="collapse-subscribe-success collapse">
<div class="alert alert-success text-center" style="margin: 0; background: #102138; border-color: #102138; color: white;">
<p>You have subscribed!</p>
</div>
</div>
<div class="collapse-subscribe collapse in">
<form class="form-subscribe">
<div class="form-group" style="margin-bottom: 0;">
<label class="sr-only">Email address</label>
<div class="row">
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-input">
<input type="email" class="form-control" placeholder="Email address&hellip;" name="subscribe" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-submit">
<button type="submit" class="btn btn-block btn-primary">Submit</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
</main>
<script type="af58cf1c5e326eef6b4c8362-text/javascript" src="{{ asset('assets/storage/re/includes/modules/cart.js') }}"></script>

<div class="modal" tabindex="-1" role="dialog" id="add_cart_modal">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1;">
<span aria-hidden="true">&times;</span>
</button>
<h3 id="add_cart_response_message" class="text-center"></h3>
</div>
<div class="modal-body">
<div style="display: flex; justify-content: space-between; align-items: center">
<div class="col">
<img src width="100" class="image-modal">
</div>
<div class="col" style="padding: 10px;">
<h5 class="qty-modal"></h5>
</div>
<div class="col" style="padding: 10px;">
<h5 class="name-modal"></h5>
</div>
</div>
</div>
<div id="modal-instavault" class="modal-body">
<h2 class="font-weight-bold">You've Selected InstaVault</h2><h3 style="heavy">Low-premium metals for storage</h3> <p>Great choice! InstaVault is unique, and with it you get:</strong></p><p>&bull; Instant exposure to physical metal, held in your name in our secure vault storage<br/>
&bull;
Ability to buy and sell in fractional units quickly<br/>
&bull;
Option to convert to whole, individual coins and bars for delivery later if you choose (fees apply)<br/>
</p> </div>
<div class="modal-footer">
<div style="float:left;">
<button type="button" class="btn btn-info btn-sm" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">Back to Products</span>
</button>
</div>
<div style="float:right;">
<a href="#" class="btn btn-success btn-sm"><span>Continue to Cart</span></a>
</div>
</div>
</div>
</div>
</div>

</div> 

</div>
@include('include/footer')
