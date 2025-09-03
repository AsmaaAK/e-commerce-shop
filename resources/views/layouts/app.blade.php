<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (مع Popper) -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <!-- Material Design Iconic Font -->
    <link rel="stylesheet" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">

    <!-- Linearicons -->
    <link rel="stylesheet" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">

    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">

    <!-- Hamburgers -->
    <link rel="stylesheet" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">

    <!-- Animsition -->
    <link rel="stylesheet" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}">

    <!-- DateRangePicker -->
    <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">

    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">

    <!-- MagnificPopup -->
    <link rel="stylesheet" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">

    <!-- Perfect Scrollbar -->
    <link rel="stylesheet" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
@yield('styles')
</head>
<body>
@include('partials.Navbar') 
@include('partials.cart')

<div class="container">
 @yield('content')
</div>
@include('partials.footer')
<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>

<!-- Animsition -->
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    });
</script>

<!-- Daterangepicker -->
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>

<!-- Slick -->
<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('js/slick-custom.js') }}"></script>

<!-- Parallax -->
<script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
<script>
    $('.parallax100').parallax100();
</script>

<!-- Magnific Popup -->
<script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
<script>
    $('.gallery-lb').each(function() {
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: { enabled:true },
            mainClass: 'mfp-fade'
        });
    });
</script>

<!-- Isotope -->
<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>

<!-- SweetAlert -->
<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
<script>
    $('.js-addwish-b2').on('click', function(e){ e.preventDefault(); });

    $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
            $(this).addClass('js-addedwish-b2').off('click');
        });
    });

    $('.js-addwish-detail').each(function(){
        var nameProduct = $(this).closest('.parent-selector').find('.js-name-detail').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
            $(this).addClass('js-addedwish-detail').off('click');
        });
    });

    $('.js-addcart-detail').each(function(){
        var nameProduct = $(this).closest('.parent-selector').find('.js-name-detail').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });
</script>

<!-- Perfect Scrollbar -->
<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative').css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){ ps.update(); });
    });
</script>

</body>
</html>