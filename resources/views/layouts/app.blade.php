<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.png') }}"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <!-- Material Design Iconic Font -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">

    <!-- Linearicons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/linearicons-v1.0.0/icon-font.min.css') }}">

    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.css') }}">

    <!-- Hamburgers -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css') }}">

    <!-- Animsition -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/animsition/css/animsition.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.min.css') }}">

    <!-- DateRangePicker -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">

    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick.css') }}">

    <!-- MagnificPopup -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/MagnificPopup/magnific-popup.css') }}">

    <!-- Perfect Scrollbar -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link rel="stylesheet" href="{{ assest('assests/css/main.css') }}">
    
    <link rel="stylesheet" href="{{ assest('assests/css/util.css') }}">
@yield('styles')
</head>
<body>
    @include('partials.Navbar')
    <div class="container">
        @yield('content')
    </div>
    @include('partials.footer')
</body>
</html>