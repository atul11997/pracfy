<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themewagon.github.io/health-center/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jul 2025 11:27:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
     <title>{{ Auth::user()->clinic_name??'' }}</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ url('/') }}/frontend/theme1/assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="{{ url('/') }}/frontend/theme1/assets/css/font-awesome.min.css">
     <link rel="stylesheet" href="{{ url('/') }}/frontend/theme1/assets/css/animate.css">
     <link rel="stylesheet" href="{{ url('/') }}/frontend/theme1/assets/css/owl.carousel.css">
     <link rel="stylesheet" href="{{ url('/') }}/frontend/theme1/assets/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ url('/') }}/frontend/theme1/assets/css/tooplate-style.css">
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     {{-- <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section> --}}


@include('frontend.themes.theme1.layouts.header')

@yield('content_front')          

@include('frontend.themes.theme1.layouts.footer')


</body>

<!-- Mirrored from themewagon.github.io/health-center/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jul 2025 11:27:33 GMT -->
</html>