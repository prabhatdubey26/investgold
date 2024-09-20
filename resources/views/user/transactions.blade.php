@include('user.include.header')
@include('user.include.sidebar')

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
          <h1>Wallet Transactions</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Transactions</li>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Method</th>
                            <th>Currency</th>
                            <th>Amount</th>
                            <th>Transaction Type</th>
                            <th>Payment Status</th>
                            <th>Remark</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            @php
                                $json = json_decode($transaction->json_response);
                            @endphp
                            <tr>
                                <td>{{ $json->r_payment_id }}</td>
                                <td>{{ $transaction->method }}</td>
                                <td>{{ $transaction->currency }}</td>
                                <td>{{ number_format($transaction->amount, 2) }}</td>
                                <td class="text-center"> <span class="badge badge-success"> + {{ ucfirst($transaction->transaction_type) }} </span></td>
                                <td class="text-center" ><span class="badge badge-success"> {{ ucfirst($transaction->payment_status) }} </span></td>
                                <td>{{ $transaction->remarks }}</td>
                                <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                        @if($transactions->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No transactions found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </table>
            <div class="pagination">
              {{ $transactions->links() }}
            </div>
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
@include('user.include.footer')
