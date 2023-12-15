<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @if(Auth::guard('admin')->user()->role != 2)
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.user.index')}}">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Admin & Karyawan</span>
      </a>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.hero.index')}}">
        <i class="menu-icon ti-layout-list-large-image"></i>
        <span class="menu-title">Data Hero</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.latest-works.index')}}">
        <i class="menu-icon ti-image"></i>
        <span class="menu-title">Latest Work</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon ti-package"></i>
        <span class="menu-title">Services</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="services">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.packages.index')}}">Packages</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.categories.index')}}">Categories</a></li>
        </ul>
      </div>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Data Admin</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.bookings.index')}}">
        <i class="ti-bookmark menu-icon"></i>
        <span class="menu-title">Data Booking</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.pembayaran.index')}}">
        <i class="ti-money menu-icon"></i>
        <span class="menu-title">Data Pembayaran</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.settings.index')}}">
        <i class="ti-settings menu-icon"></i>
        <span class="menu-title">Settings</span>
      </a>
    </li>
    <li class="nav-item">
      <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ti-power-off menu-icon"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>
  </ul>
</nav>