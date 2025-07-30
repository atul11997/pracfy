<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $user->clinic_name??'' }}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ url('/') }}/frontend/theme3/assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/" rel="preconnect">
  <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('/') }}/frontend/theme3/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme3/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme3/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme3/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme3/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/frontend/theme3/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ url('/') }}/frontend/theme3/assets/css/main.css" rel="stylesheet">
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

.doctor-card {
  transition: all 0.4s ease;
  border: 1px solid #e0e0e0;
}

.doctor-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
}

.doc-img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 50%;
  flex-shrink: 0;
}

.social-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background-color: #f5f5f5;
  color: #333;
  font-size: 14px;
  transition: background 0.3s, color 0.3s;
}

.social-icon:hover {
  background-color: #0d6efd;
  color: #fff;
}

</style>
  <!-- =======================================================
  * Template Name: Medicio
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

@include('frontend.themes.theme3.layouts.header')

@yield('content_front')

 @include('frontend.themes.theme3.layouts.footer')

</body>


</html>