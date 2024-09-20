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
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Phone Number</b> <span class="float-right">{{ $bankDetails->phone }}</span>
                </li>
                <li class="list-group-item">
                  <b>Bank Name</b> <span class="float-right">{{ $bankDetails->bank_name }}</span>
                </li>
                <li class="list-group-item">
                  <b>Bank ID</b> <span class="float-right">{{ $bankDetails->bank_id }}</span>
                </li>
                <li class="list-group-item">
                  <b>Account Number</b> <span class="float-right">{{ $bankDetails->account_no }}</span>
                </li>
                <li class="list-group-item">
                  <b>Address</b> <span class="float-right">{{ $bankDetails->address }}</span>
                </li>
              </ul>
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
