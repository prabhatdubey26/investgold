@include($layout . '.include.header')
@include($layout . '.include.sidebar')

<style>
  .leading-5 {
    margin-top: 15px;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Order List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <table class="table table-responsive" >
                <thead>
                    <tr>
                        <th>OrderID</th>
                        @if(Auth::user()->role==1)
                        <th>User</th>
                        @endif
                        <th>Product</th>
                        <th>Price</th>
                        <th>Tax and Fee</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            @if(Auth::user()->role==1)
                            <td>
                              <p>Name :{{ $order->user->name }}</p>
                              <p>Email :{{ $order->user->email }}</p>
                            </td>
                            @endif
                            <td>
                              @php
                              $products = json_decode($order->product_details, true);
                              @endphp
                               @if (!empty($products))
                               <ul>
                                   @foreach ($products as $product)
                                       <li>
                                           {{ $product['name'] }} - 
                                           {{ $product['quantity'] }} x 
                                           {{ number_format($product['price'], 2) }} 
                                       </li>
                                   @endforeach
                               </ul>
                           @else
                               <p>No products found.</p>
                           @endif
                            </td>
                            <td>
                              {{ $order->total_price }}
                            </td>
                            <td>
                              @php
                              $json = json_decode($order->json_response, true);
                              @endphp
                              <p> Fee : {{ $json['fee'] ?? '0.00'  }}</p>
                              <p>Tax :  {{ $json['fee'] ?? '0.00' }}</p>
                              <p>Total :  {{ $json['amount'] ?? '0.00' }}</p>
                            </td>
                            <td>
                               {{$order->payment_status}}
                            </td>
                            <td>
                             
                              @if(Auth::user()->role==1)
                              <select onchange="changeOrderStatus({{$order->id}}, this.value)" class="form-control">
                                <option value="created" {{ $order->order_status === 'created' ? 'selected' : '' }}>Created</option>
                                <option value="processing" {{ $order->order_status === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $order->order_status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            @else
                            {{$order->order_status}}
                            @endif
                           </td>
                           <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="pagination"> --}}
              {{ $orders->links() }}
            {{-- </div> --}}
        </div>
 
  </section>
  <!-- /.content -->
</div>
<script>
  function changeOrderStatus(orderId, newStatus) {
    $.ajax({
        url: '/admin/order-status/' + orderId,
        method: 'POST',
        data: {
            status: newStatus,
            _token: $('meta[name="_token"]').attr('content'), // Include CSRF token
        },
        success: function(data) {
            if (data.success) {
                $('#order-status-' + orderId).text(data.status);
                alert('Order status updated successfully!');
            }
        },
        error: function(error) {
            console.error("Error updating order status:", error);
            alert('Failed to update order status. Please try again.');
        }
    });
}

</script>
@include($layout . '.include.footer')
