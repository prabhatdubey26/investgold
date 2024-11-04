    <body>
    <div class="bgimg">
            <div class="overlay">

            </div>
    <div class="mainmenu">
        <section style="padding-top:10px;">
            <div class="container">
                <div class="mainheader">
                    <div class="mainheaderbox1">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('assets/storage/img/logo.png') }}" alt="logo">
                        </a>

                    </div>

                    @if(empty(session('user_id')))
                        <div class="mainheaderbox2">
                    <a href="https://www.facebook.com/krugerrands/" target="_blank">
                            <img src="{{ asset('assets/storage/img/latest.png') }}" alt="logo">
                        </a>
                        <a href="#" id="registerLink">Register</a>
                        <a href="#" id="loginLink">Login</a>
                        <a href="#">
                            <div style="float: right; cursor: pointer; position: relative;">
                                <span class="fa fa-shopping-cart fa-2x my-cart-icon"></span>
                                <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger my-cart-badge">
                                    0 <!-- Initial count -->
                                </span>
                            </div>                        
                        </a>
                    </div>
                        @else
                        <div class="mainheaderbox2">
                    <a href="https://www.facebook.com/krugerrands/" target="_blank">
                            <img src="{{ asset('assets/storage/img/latest.png') }}" alt="logo">
                        </a>
                        <a href="{{ url('user/dashboard/' . session('user_id')) }}">{{ session('user_name') }} <i class="fa fa-dollar"></i>{{ auth()->user()->wallet }}</a>
                        <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit"   class="btn">Logout</button>
                    </form> 
                        <a href="#">
                            <div style="float: right; cursor: pointer; position: relative;">
                                <span class="fa fa-shopping-cart fa-2x my-cart-icon"></span>
                                <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger my-cart-badge">
                                    0 <!-- Initial count -->
                                </span>
                            </div>   
                        </a>
                    </div>	
                    @endif
                </div>
            </div>
        </section>


        <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
            <!-- Logo Start -->
            <a class="navbar-brand" href="#">
                        
            </a>
            <!-- Logo End -->

            <!-- Main Menu Start -->
            <div class="collapse navbar-collapse main-menu">
                            <div class="nav-menu-wrapper">
                                <ul class="navbar-nav mr-auto" id="menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>

                                    <li class="nav-item submenu">
                                    <a class="nav-link" href="{{ route('shoppage') }}">Select Your Shop</a>
                                        <ul class="sub-menu">
                                            <li class="nav-item"><a class="nav-link" href="{{ route('mauritius') }}">Mauritian Product</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ route('southafrica') }}">South Africa Product</a></li>
                                            
                                        </ul>
                                    </li>                                
                                
                                    <li class="nav-item submenu"><a class="nav-link" href="#">Live Charts</a>
                                        <ul>                                        
                                            <li class="nav-item"><a class="nav-link" href="{{ route('livechart') }}">Live South Africa Rand/$</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ route('historicalchart') }}" >Mauritian Charts</a></li>                                       
                                        
                                        </ul>
                                    </li>
                                                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">CONTACT</a></li>
                                
                                </ul>
                            </div>
                    
            </div>
            <!-- Main Menu End -->
            <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- popup form -->
    <div id="popupForm" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            
            <span id="error_show"></span>
            <form id="multiStepForm">
            @csrf 
                <!-- Step 1 -->
                <fieldset class="step">
                <h2>Register Form</h2>
                    <div class="row">
                        <div class="inputfield col-md-12">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required/>
                            <div id="name-error" class="error-message"></div>
                        </div>
                        <div class="inputfield col-md-12">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required/>
                            <div id="email-error" class="error-message"></div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="inputfield col-md-6">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required/>
                            <div id="password-error" class="error-message"></div> 
                        </div>
                        <div class="inputfield col-md-6">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" id="confirm_password" name="confirm_password" required/>
                            <div id="confirm-password-error" class="error-message"></div> 
                        </div>
                    </div>
                    <div class="inputfield">
                        <button type="button" class="btn" onclick="nextStep(1)">Next</button>
                    </div>
                </fieldset>
                <!-- Step 2 -->
                <fieldset class="step">
                <h2>KYC Form</h2>
                    <div class="row">
                        <!--div class="inputfield col-md-12">
                            <label>Upload User Image:</label>
                            <input type="file" name="uimg" id="uimg" class="input">
                            <div id="uimg-error" class="error-message"></div>
                        </div-->
                        <div class="inputfield col-md-12">
                            <label>Document Type:</label>
                            <select name="type" class="form" id="type">
                                <option value="">Select ID</option>
                                <option value="1">ID Card</option>
                                <option value="2">Passport</option>
                                <option value="3">Driving Licence</option>
                            </select>
                            <div id="type-error" class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="inputfield col-md-6">
                            <label>Front Document 1 Up to 2MB:</label>
                            <input type="file" name="doc1" class="form" id="doc1">
                            <div id="doc1-error" class="error-message"></div>
                        </div>
                        <div class="inputfield col-md-6">
                            <label>Back Document 2 Up to 2MB:</label>
                            <input type="file" name="doc2" class="form" id="doc2">
                            <div id="doc2-error" class="error-message"></div>
                        </div>
                    </div>
                    <div class="inputfield">
                        <button type="button" class="btn" onclick="previousStep(1)">Previous</button>
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <!-- login popup open -->
    <div id="popupForm1" class="popup">
        <div class="popup-content">
        
            <span class="close" onclick="closePopup1()">&times;</span>
            @if ($errors->any())
        <div id="errorMessage" class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif
            <h2>Login Form</h2>
            <span id="error_show1"></span>
            <form id="loginForm1" method="POST" action="user-login">
                @csrf <!-- CSRF token -->
                <div class="inputfield col-md-12">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required/>
                    <div id="email-error" class="error-message"></div> 
                </div>
                <div class="inputfield col-md-12">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required/>
                    <div id="password-error" class="error-message"></div> 
                </div>
                <a href="#" id="forgotLink" style="text-decoration: underline;"> Forgot Password</a>
                <div class="inputfield">
                    <button type="submit" class="btn">Login</button>
                </div>
            </form>
        </div>
    </div>    


    <div id="forgotPassword" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeForgotPassword()">&times;</span>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('alert'))
                <div class="alert alert-danger">{{ session('alert') }}</div>
            @endif

            <h2>Forgot Password</h2>
            <span id="error_show1"></span>
            <form id="forgotPasswordForm" method="POST" action="forgot-password">
                @csrf <!-- CSRF token -->
                <div class="inputfield col-md-12">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required/>
                    <div id="email-error" class="error-message"></div> 
                </div>
                <div class="inputfield">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </div>  
 
    {{-- <script>
        // Remove error message after 4 seconds
        setTimeout(function() {
        // Show the popup
        

        // Remove the error message if it exists
        var errorMessage = document.getElementById('errorMessage');
        if (errorMessage) {
            document.getElementById("popupForm1").style.display = "block";
            //errorMessage.remove();
        } 
    }, 1000); // 14000 milliseconds = 14 seconds
    // 4000 milliseconds = 4 seconds
    
    
    function showCartTable() {
        var cartRowHTML = "";
        var itemCount = 0;
        var grandTotal = 0;

        var price = 0;
        var quantity = 0;
        var subTotal = 0;

        if (sessionStorage.getItem('shopping-cart')) {
            var shoppingCart = JSON.parse(sessionStorage.getItem('shopping-cart'));
            itemCount = shoppingCart.length;

            //Iterate javascript shopping cart array
            shoppingCart.forEach(function(item) {
                var cartItem = JSON.parse(item);
                price = parseFloat(cartItem.price);
                quantity = parseInt(cartItem.quantity);
                subTotal = price * quantity

                cartRowHTML += "<tr>" +
                    "<td>" + cartItem.productName + "</td>" +
                    "<td class='text-right'>$" + price.toFixed(2) + "</td>" +
                    "<td class='text-right'>" + quantity + "</td>" +
                    "<td class='text-right'>$" + subTotal.toFixed(2) + "</td>" +
                    "</tr>";

                grandTotal += subTotal;
            });
        }

        $('#cartTableBody').html(cartRowHTML);
        $('#itemCount').text(itemCount);
        $('#totalAmount').text("$" + grandTotal.toFixed(2));
    }

    function addToCart(element) {
        var productParent = $(element).closest('div.product-item');

        var price = $(productParent).find('.price span').text();
        var productName = $(productParent).find('.productname').text();
        var quantity = $(productParent).find('.product-quantity').val();

        var cartItem = {
            productName: productName,
            price: price,
            quantity: quantity
        };
        var cartItemJSON = JSON.stringify(cartItem);

        var cartArray = new Array();
        // If javascript shopping cart session is not empty
        if (sessionStorage.getItem('shopping-cart')) {
            cartArray = JSON.parse(sessionStorage.getItem('shopping-cart'));
        }
        cartArray.push(cartItemJSON);

        var cartJSON = JSON.stringify(cartArray);
        sessionStorage.setItem('shopping-cart', cartJSON);
        showCartTable();
    }
 --}}
    </script>

    <script type='text/javascript' src="{{ asset('js/jquery-2.2.3.min.js')}}"></script>
    <script type='text/javascript' src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script type='text/javascript' src="{{ asset('js/jquery.mycart.js')}}"></script>
    
    <script type="text/javascript">
    function openLoginPopup1() {
            document.getElementById('popupForm1').style.display = 'block';
    }
    $(function () {
        var goToCartIcon = function($addTocartBtn){
        var $cartIcon = $(".my-cart-icon");
        var $image = $('<img width="50px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
        $addTocartBtn.prepend($image);
        var position = $cartIcon.position();
        $image.animate({
            top: position.top,
            left: position.left
        }, 500 , "linear", function() {
            $image.remove();
        });
        }

        $('.my-cart-btn').myCart({
        currencySymbol: '$',
        classCartIcon: 'my-cart-icon',
        classCartBadge: 'my-cart-badge',
        classProductQuantity: 'my-product-quantity',
        classProductRemove: 'my-product-remove',
        classCheckoutCart: 'my-cart-checkout',
        affixCartIcon: true,
        showCheckoutModal: true,
        numberOfDecimals: 2,
        cartItems: [
        
        ],
        clickOnAddToCart: function($addTocart){
            goToCartIcon($addTocart);
        },
        afterAddOnCart: function(products, totalPrice, totalQuantity) {
            console.log("afterAddOnCart", products, totalPrice, totalQuantity);
        },
        clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
            console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
        },
        checkoutCart: function(products, totalPrice, totalQuantity) {
            var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
            checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
            $.each(products, function(){
            checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
            });
            // alert(checkoutString)

            console.log("checking out", products, totalPrice, totalQuantity);
        },
        });
    });
    </script>

