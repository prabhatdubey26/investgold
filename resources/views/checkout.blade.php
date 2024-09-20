@include('include/header_main')
@include('include/header')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default credit-card-box">
            <div class="panel-heading display-table">
                <h3 class="panel-title">Payment Details</h3>
            </div>
            <div class="panel-body">

                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <form role="form" action="{{ url('make-payment') }}" method="post" class="require-validation" id="payment-form">
                    @csrf
                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                   <input type="hidden" name="order_id" value="{{$lastOrder->id}}">
                    <div class="row mt-2">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block" type="button" onclick="payWithRazorpay({{ json_encode($lastOrder) }})">Pay Now ($ {{$lastOrder->total_price}})</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function payWithRazorpay(order) {
        console.log(order)
    //    let orders = JSON.parse(order)
        var options = {
            key: "{{ env('RAZORPAY_KEY') }}", // Your Razorpay key
            amount: order.total_price * 100, // Convert to paise
            currency: "INR", // Currency code
            name: "InvestGold",
            description: "Razorpay payment",
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
                name: order.user.name,
                email: order.user.email
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

@include('include/footer')
