<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ Auth::user()->clinic_name }}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="{{ url('/') }}/frontend/theme2/assets/img/favicon.png" rel="icon">
  <link href="{{ url('/') }}/frontend/theme2/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="{{ \App\Helpers\ThemeHelper::getCssPath() }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('/') }}/frontend/theme2/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme2/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme2/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme2/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme2/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme2/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <!-- Main CSS File -->
  <link href="{{ url('/') }}/frontend/theme2/assets/css/main.css" rel="stylesheet">
<style>

    .nav-tabs .nav-link.active {
      color: #20c997;
      font-weight: bold;
      border-left: 4px solid #20c997;
      background: none;
    }
    .nav-tabs .nav-link {
      color: #333;
    }
    .section-title {
      text-align: center;
      margin-bottom: 30px;
    }
    .section-title h2 {
      font-weight: 700;
      position: relative;
      display: inline-block;
    }
    .section-title h2::after {
      content: '';
      display: block;
      width: 50px;
      height: 3px;
      background-color: #20c997;
      margin: 10px auto 0;
    }
  </style>

  <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

@include('frontend.themes.theme2.layouts.header')

@yield('content_front')

@include('frontend.themes.theme2.layouts.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ url('/') }}/frontend/theme2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('/') }}/frontend/theme2/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ url('/') }}/frontend/theme2/assets/vendor/aos/aos.js"></script>
  <script src="{{ url('/') }}/frontend/theme2/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ url('/') }}/frontend/theme2/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ url('/') }}/frontend/theme2/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Main JS File -->
  <script src="{{ url('/') }}/frontend/theme2/assets/js/main.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

</body>

</html>