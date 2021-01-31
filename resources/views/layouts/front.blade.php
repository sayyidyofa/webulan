<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Informasi UMKM Kelurahan Bulusan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('front/img/logo-pemkot.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
          rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('front/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('front/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('front/lib/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Ganti gambar background home -->
    <style>
        #intro {
            width: 100%;
            position: relative;
            background: url("{{ asset('front/img/image.jpg') }}") center bottom no-repeat;
            background-size: cover;
            padding: 200px 0 120px 0;
        }
    </style>

</head>

<body>

<!--==========================
Header
============================-->
<header id="header" class="fixed-top" style="padding: 3px; height:fit-content; background-color: #5F9EA0">
    <div class="container">
        <nav class="main-nav float-left">
            <a href="{{ route('front.usahaList') }}"><img src="{{ asset('front/img/logobaru.png') }}" alt="" class="img-fluid" width="150"></a>
        </nav><!-- .main-nav -->
    </div>
</header><!-- #header -->

@yield('content')

<!--==========================
    Footer
    ============================-->
<footer id="footer" style="background-color: #5F9EA0;">
    <div class="container">
        <div class="copyright">
            {{ Date('Y') }} &copy; <strong>Kelurahan Bulusan</strong>
        </div>
        <div class="credits">
            Dibuat oleh KKN Tim I UNDIP Tahun 2021
        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- JavaScript Libraries -->
<script src="{{ asset('front/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('front/lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('front/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('front/lib/mobile-nav/mobile-nav.js') }}"></script>
<script src="{{ asset('front/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('front/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('front/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('front/lib/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('front/lib/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('front/js/main.js') }}"></script>

<script>
    // Testimonials carousel (uses the Owl Carousel library)
    $(document).ready(function () {
        $("#carousel").owlCarousel({
            autoplay: true,
            dots: true,
            loop: true,
            margin: 10
        });
    });
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

</body>

</html>