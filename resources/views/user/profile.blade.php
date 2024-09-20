@include('user.include.header')
@include('user.include.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateProfileModal">
          Update Profile
        </button>
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
              @if($user?->kyc?->image)
                  <img class="profile-user-img img-fluid img-circle"
                      src="{{ asset('image/' . $user->kyc->image) }}"
                      alt="User profile picture">
              @else
                  <img class="profile-user-img img-fluid img-circle"
                  src="{{ asset('/assets/template/dist/img/user2-160x160.jpg') }}"
                      alt="User profile picture">
              @endif

              </div>

              <br/>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Name</b> <span class="float-right">{{ $user->name }}</span>
                </li>
                <li class="list-group-item">
                  <b>Phone Number</b> <span class="float-right">{{ $user->phone }}</span>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <span class="float-right">{{ $user->email }}</span>
                </li>
              </ul>

              <a href="{{ route('user.bank-details') }}" class="btn btn-primary btn-block"><b>Bank Details</b></a>
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
<!-- Update Profile Modal -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Profile Update Form -->
        <form method="POST" action="{{ route('user.updateProfile') }}" enctype="multipart/form-data">
          @csrf

          <!-- Profile Image -->
          <div class="form-group">
            <label for="image">Profile Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
          </div>

          <!-- Name -->
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
 img.profile-user-img.img-fluid.img-circle {
    height: 100px !important;
}
</style>
@include('user.include.footer')
