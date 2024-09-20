@include('user.include.header')
@include('user.include.sidebar')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">
        <br/><br/>
          <h1>Wallet</h1>
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ Auth()->user()->wallet }}</h3>

              <p>Wallet</p>
            </div>
            <div class="icon">
              <i class="fa fa-wallet"></i>
            </div>
           
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Wallet</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
     <form method="POST" id="payment-form" action="{{ route('user.addwallet') }}">
    @csrf
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <!-- Mobile Number -->
    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" class="form-control" id="amount" name="amount" >
    </div>

    <!-- Submit Button -->
    <button type="button" onclick="payWithRazorpay()" class="btn btn-primary">Add</button>
</form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function payWithRazorpay() {

      let amount = document.getElementById("amount").value;
      if (!amount) {
         return alert("Please enter a amount.");
      }

        var options = {
            key: "{{ env('RAZORPAY_KEY') }}", // Your Razorpay key
            amount: amount * 100, // Convert to paise
            currency: "INR", // Currency code
            name: "InvestGold",
            description: "Add Wallet",
            image: "/images/logo-icon.png",
            handler: function (response) {
                console.log(response); // Log the entire response object
                if (response.razorpay_payment_id) {
                    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                    document.getElementById('payment-form').submit(); // Submit the form with payment ID
                } else {
                    console.error("Payment ID is not received.");
                    alert("Payment failed. Please try again.");
                }
            },
            prefill: {
                name: "{{Auth()->user()->name}}",
                email:"{{Auth()->user()->email}}"
            },
            theme: {
                color: "#ff7529"
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
        event.preventDefault(); // Prevent default form submission
    }
</script>
@include('user.include.footer')
