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
          {{-- <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ Auth()->user()->wallet }}</h3>
    
                <p>Add Wallet</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="{{ route('user.wallet') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $orderCount }}</h3>
                <p>Order List</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="{{ url('user/orderList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $trasCount }}</h3>
                <p>Wallet Transactions</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('user.transaction') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
            <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $goldOrderCount }}</h3>
    
                <p>Gold</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="{{  url('user/orderList') }}?type=gold" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $silverOrderCount }}</h3>
                <p>Silver</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="{{ url('user/orderList')}}?type=silver" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ Auth()->user()->wallet }}</h3>
                <p>Cash In Hand</p>
              </div>
              <div class="icon">
                <i class="fa fa-dollor"></i>
              </div>
              <a href="{{ route('user.transaction') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>$</h3>
    
                <p>Add Fund</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="{{ route('user.wallet') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>1</h3>
                <p>Withdraw Fund</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $trasCount }}</h3>
                <p>Buy Digital Bullion</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>1</h3>
    
                <p>Sell Digital Bullion</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>1</h3>
                <p>Buy Digital Bullion</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>$</h3>
                <p>Live Chart</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars" aria-hidden="true"></i>
              </div>
              <a href="{{ url('livechart') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@include('user.include.footer')