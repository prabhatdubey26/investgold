<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#d5d8db;">
   

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
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('dashboard') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('user/orderList')}}" class="nav-link active">
                <i class="far fa-bookmark nav-icon"></i>
                <p>My Order</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/transactions')}}"  style="color: #000;" class="nav-link active">
              <i class="far fa fa-arrow-right nav-icon"></i>
                <p>Transactions</p>
            </a>
        </li>

         
            <li class="nav-item">
                <a href="{{url('userDetail')}}" style="color: #000;" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User & Kyc List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" style="color: #000;">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Home Seting
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('admin/header')}}" style="color: #000;" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navigation</p>
                </a>
            </li>

           
              <!--li class="nav-item">
              <a href="{{url('admin/slider_images')}}" style="color: #000;" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/news')}}" style="color: #000;" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/team')}}" style="color: #000;" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team</p>
                </a>
            </li-->
            </ul>
          </li>
             
              <!-- <li class="nav-item">
                <a href="{{ url('weather') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Weather City</p>
                </a>
              </li>   -->

              
            </ul>
          </li>
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>
