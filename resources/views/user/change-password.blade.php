@include($layout . '.include.header')
@include($layout . '.include.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Change Password</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Change Password</li>
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
                 <!-- Display Success Message -->
              @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            <!-- Display Error Messages -->
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
              <form method="POST" action="{{ route('user.changePassword') }}">
                @csrf
                <input type="hidden" name="role" value="{{ auth()->user()->role }}">
                <!-- New Password -->
                <div class="form-group">
                  <label for="new_password">New Password:</label>
                  <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                  <label for="confirm_password">Confirm Password:</label>
                  <input type="password" class="form-control" id="confirm_password" name="new_password_confirmation" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Change Password</button>
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
