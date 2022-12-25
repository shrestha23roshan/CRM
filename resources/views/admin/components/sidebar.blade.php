  <!-- Main Sidebar Container -->
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('storage/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->image_icon)
          <img src="{{ asset('uploads/users/'. Auth::user()->image_icon) }}" class="img-circle elevation-2" alt="User Image">
              @else
              <img src="{{ asset('adminlte/dist/img/avatar4.png') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="{{ route('admin.dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt fa fa-spin"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">Home</span>
              </p>
            </a>
          </li>
        
            <li class="nav-header">Menu Managements</li>
            <li class="nav-item">
              <a href="{{ route('admin.company.index') }}" class="nav-link">
                <i class="nav-icon fa fa-cog"></i>
                <p>
                  Companies
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.employee.index') }}" class="nav-link">
                <i class="nav-icon fa fa-cog"></i>
                <p>
                  Employees
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
