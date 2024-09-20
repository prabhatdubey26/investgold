@include('user.include.header')
@include('user.include.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
    <div class="row">
          <div class="col-lg-4 col-6">
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
          {{-- <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>1</h3>

                <p>Employee</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>1</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
          
        </div> 
        
      </div>
    </section>
    <!-- /.content -->
  </div>
@include('user.include.footer')