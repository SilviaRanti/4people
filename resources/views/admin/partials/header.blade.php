<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5" href="{{ route('admin.dashboard') }}"><img src="{{asset('/logo.jpg')}}" class="mx-2 rounded-circle" alt="logo" />4People Studio</a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"><img src="{{asset('/logo.jpg')}}" class="rounded-circle" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
    </ul>
    @auth('admin')
    <p>{{ Auth::guard('admin')->user()->nama }}</p>
    @endauth
  </div>
</nav>