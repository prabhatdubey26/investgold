<div class="phoenix-wrapper">
<a href="#skip-menu" class="sr-only">Skip past the menu</a>
<a href="#accessibility-controls" class="sr-only">Skip to accessibility controls</a>
<div class="header">
<div class="wrap--inner container">
<div class="row">
<a href="index.html" class="logo col-xs-6 col-sm-5 col-md-4">
</a>
<div class="col-xs-6 col-sm-7 col-md-8">
<a href="#" class="cart">
MY CART <span id="cart_count_contents_holder" style="display: none">(<span id="cart_count_contents"></span>)</span>
</a>

<div class="my-account-nav dropdown visible-xs">
<a href="#" id="my-account-menu">
<i class="fa fa-user"></i>&nbsp;&nbsp;Account </a>
</div>
@if(empty(session('user_id')))
        <ul class="register-login text-right hidden-xs">
            <li>
                <a href="#" id="registerLink">Register</a>
            </li>
            <li>
                <a href="#" id="loginLink">Login</a>
            </li>
        </ul>
        @else
        <ul class="register-login text-right hidden-xs">
            <li>
            <a href="{{ url('user/dashboard/' . session('user_id')) }}">{{ session('user_name') }}</a>
            </li>
            <li>
                <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit"   class="btn">Logout</button>
                </form>
            </li>
        </ul>
        @endif
       
<div class="phone-wrapper hidden-xs hidden-sm">
<a href="#" class="phone">
(999) 999-9999 </a>
<span class="language">Call Invest Gold</span>
</div>
</div>
</div>
</div>
</div>
<div class="navigation">
<div class="wrap--inner container">
<div class="row">
<a href="#" class="hamburger hidden-sm hidden-md hidden-lg col-sm-2 col-3">MENU</a>
<ul class="menu col-md-12" style="margin-bottom: 0px!important">
@foreach($navigations->where('type', 1) as $navigation)
        <li>
            <a href="{{ $navigation->link }}">{{ $navigation->title }}</a>
        </li>
@endforeach
</ul>
</div>
</div>
</div>
</div>

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
            <div class="inputfield">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</div>

<script>
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
</script>