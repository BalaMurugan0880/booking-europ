<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('appointments.index') }}" class="brand-link">
      <img src="{{ url('admin/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Appointment System</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ url('admin/images/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Modules</li>
              @php
              $menuItems = [
                  [
                      'route' => 'appointments.index',
                      'icon' => 'far fa-circle text-info',
                      'title' => 'Appointment',
                      'roles' => ['admin', 'customer'],
                  ],
                  [
                      'route' => 'status.index',
                      'icon' => 'far fa-circle text-warning',
                      'title' => 'Status',
                      'roles' => ['admin', 'customer'],
                  ],
                  [
                      'route' => 'vehicle.index',
                      'icon' => 'far fa-circle text-danger',
                      'title' => 'Vehicle',
                      'roles' => ['admin', 'customer'],
                  ],
                  [
                      'route' => 'users.index',
                      'icon' => 'far fa-circle text-primary',
                      'title' => 'Users',
                      'roles' => ['admin'],
                  ],
                  // Add more menu items as needed
              ];
              @endphp

              @foreach ($menuItems as $menuItem)
              @if (in_array(Auth::user()->role->slug, $menuItem['roles']))
              <li class="nav-item">
                  <a href="{{ route($menuItem['route']) }}" class="nav-link">
                      <i class="nav-icon {{ $menuItem['icon'] }}"></i>
                      <p>{{ $menuItem['title'] }}</p>
                  </a>
              </li>
              @endif
              @endforeach
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
