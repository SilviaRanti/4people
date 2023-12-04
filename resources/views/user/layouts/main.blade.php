<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>4People Studio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('images/logo/logo.jpg') }}" type="image/jpg">
  <!-- font awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  @stack('css')
</head>

<body>

  <!-- start header -->
  @include('user.partials.header')
  <!-- end Header -->

  @yield('content')

  @include('user.partials.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  @stack('script')
</body>

</html>