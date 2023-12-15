<!-- Navigation -->
<nav>
  <a href="{{ route('user.home') }}" class="logo text-dark">
    <img src="{{ asset('user/images/logo/logo.jpg') }}" class="logo-header" alt="4People Studio Logo">
    4People Studio
  </a>
  <ul>
    <li class="{{ Request::routeIs('user.home') ? 'active' : '' }}">
      <a class="text-dark" href="{{ route('user.home') }}">Home</a>
    </li>
    <li class="{{ Request::routeIs('user.about') ? 'active' : '' }}">
      <a class="text-dark" href="{{ route('user.about') }}">About</a>
    </li>
    <li class="{{ Request::routeIs('user.pricing') ? 'active' : '' }}"><a class="text-dark" href="{{ route('user.pricing') }}">Pricing</a></li>
    <li class="{{ Request::routeIs('user.contact') ? 'active' : '' }}"><a class="text-dark" href="{{ route('user.contact') }}">Contact</a></li>
  </ul>
</nav>
<!-- End of Navigation -->