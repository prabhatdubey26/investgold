@include('user.include.header')
@include('user.include.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">
                    <!-- Back Button -->
<a href="{{ route('user.profile') }}" class="btn btn-primary">Back</a>
<br/><br/>
          <h1>Bank Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
            <form method="POST" action="{{ route('user.updateBankDetails') }}">
    @csrf

    <!-- Mobile Number -->
    <div class="form-group">
        <label for="phone">Mobile Number:</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
    </div>

    <!-- Bank Name -->
    <div class="form-group">
        <label for="bank_name">Bank Name:</label>
        <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $user->bank_name }}">
    </div>

    <!-- Bank ID -->
    <div class="form-group">
        <label for="bank_id">Bank ID:</label>
        <input type="text" class="form-control" id="bank_id" name="bank_id" value="{{ $user->bank_id }}">
    </div>

    <!-- Account Number -->
    <div class="form-group">
        <label for="account_no">Account Number:</label>
        <input type="text" class="form-control" id="account_no" name="account_no" value="{{ $user->account_no }}">
    </div>

    <!-- Address -->
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update Bank Details</button>
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

@include('user.include.footer')
