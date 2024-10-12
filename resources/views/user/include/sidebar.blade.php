<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/storage/re/common/styles/images/logo.png') }}" style="width: 6.1rem;" class="img-circle elevation-2" alt="User Image">
        </div>
        <!--div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div-->
      </div>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               User Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('user/dashboard/' . session('user_id')) }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('user/profile')}}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>My Profile</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('user/update-bank-details')}}" class="nav-link">
                  <i class="fa fa-university nav-icon"></i>
                  <p>Update Bank Details</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('user/orderList')}}" class="nav-link">
                  <i class="far fa-bookmark nav-icon"></i>
                  <p>My Order</p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-heart nav-icon"></i>
                  <p>My Favourite</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa fa-shopping-cart nav-icon"></i>
                  <p>Shopping Cart</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-credit-card nav-icon"></i>
                  <p>Payments</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-arrow-circle-down nav-icon"></i>
                    <p>Pay-ins</p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route('user.wallet') }}" class="nav-link">
                  <i class="fa fa-wallet  nav-icon"></i>
                  <p>Wallet</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('user.transaction') }}" class="nav-link">
              <i class="far fa fa-arrow-right nav-icon"></i>
                <p>Transactions</p>
              </a>
          </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Collect/Courier</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-comment-dots nav-icon"></i>
                  <p>Live Chat</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-award nav-icon"></i>
                  <p>Rewards</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-bell nav-icon"></i>
                  <p>Notification</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-fingerprint nav-icon"></i>
                  <p>Privacy Policy</p>
                </a>
            </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>
