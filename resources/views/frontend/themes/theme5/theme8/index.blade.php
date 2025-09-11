<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $user->clinic_name ?? '' }}</title>


    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme8/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme8/plugins/slick/slick-theme.css">
    <!-- FancyBox -->
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme8/plugins/fancybox/jquery.fancybox.min.css">
<link rel="stylesheet" href="{{ route('theme.css') }}">
    <!-- Stylesheets -->
    <link href="{{ url('/') }}/frontend/theme8/css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ url('/') }}/frontend/theme8/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{ url('/') }}/frontend/theme8/images/favicon.ico" type="image/x-icon">

</head>


<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader"></div> -->
        <!-- Preloader -->

        @php
            use Carbon\Carbon;

            $clinicOpenTime = $user->clinic_open_time ? Carbon::parse($user->clinic_open_time)->format('h:i A') : '';
            $clinicCloseTime = $user->clinic_close_time ? Carbon::parse($user->clinic_close_time)->format('h:i A') : '';
            $halfDayFrom = $user->time_of_half_day_from
                ? Carbon::parse($user->time_of_half_day_from)->format('h:i A')
                : '';
            $halfDayTo = $user->time_of_half_day_to ? Carbon::parse($user->time_of_half_day_to)->format('h:i A') : '';
        @endphp

        <!--header top-->
        <div class="header-top">
            <div class="container clearfix">
                <div class="top-left">
                    <h6>Opening Hours : {{ $user->clinic_open_from ?? '' }} to {{ $user->clinic_open_to ?? '' }} -
                        {{ $clinicOpenTime }} to {{ $clinicCloseTime }}</h6>
                </div>
                <div class="top-right">
                    <ul class="social-links">
                        <li>
                            <a href="{{ $user->facebook_link }}">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $user->twitter_link }}">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $user->linkedin_link }}">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $user->instagram_link }}">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--header top-->

        <!--Header Upper-->
        <section class="header-uper">
            <div class="container clearfix">
                <div class="logo">
                    <figure>
                        <a href="#">
                            <img src="{{ $user->clinic_logo ?? '' }}" alt="" width="130">
                        </a>
                    </figure>
                </div>
                <div class="right-side">
                    <ul class="contact-info">
                        <li class="item">
                            <div class="icon-box">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <strong>Email</strong>
                            <br>
                            <a href="#">
                                <span>{{ $user->email ?? '' }}</span>
                            </a>
                        </li>
                        <li class="item">
                            <div class="icon-box">
                                <i class="fa fa-phone"></i>
                            </div>
                            <strong>Call Now</strong>
                            <br>
                            <span>{{ $user->phone ?? '' }}</span>
                        </li>
                    </ul>
                    {{-- <div class="link-btn">
                        <a href="#" class="btn-style-one">Appoinment</a>
                  </div> --}}
                </div>
            </div>
        </section>
        <!--Header Upper-->


        <!--Main Header-->
        <nav class="navbar navbar-default" id="mainNav">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @foreach ($pages as $index => $page)
                            @if ($index == 0)
                                <li class="active">
                                    <a
                                        href="#{{ strtolower($page->page_name ?? '') }}">{{ ucWords($page->page_name ?? '') }}</a>
                                </li>
                            @else
                                <li>
                                    <a
                                        href="#{{ strtolower($page->page_name ?? '') }}">{{ ucWords($page->page_name ?? '') }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!--End Main Header -->

        <!--=================================
=            Page Slider            =
==================================-->
        @if ($pages->has('home'))
            <div class="hero-slider" id="{{ strtolower($pages['home']->page_name ?? '') }}">
                <!-- Slider Item -->
                @foreach ($banners as $banner)
                    <div class="slider-item slide1" style="background-image:url({{ $banner->image ?? '' }})">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Slide Content Start -->
                                    <div class="content style text-center">
                                        <h2 class="text-white text-bold mb-2">{{ $banner->title ?? '' }}</h2>
                                        <p class="tag-text mb-5">{!! $banner->description ?? '' !!}</p>
                                        @if ($banner->link)
                                            <a href="{{ $banner->link }}" class="btn btn-main btn-white">explore</a>
                                        @endif
                                    </div>
                                    <!-- Slide Content End -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif

        <!--====  End of Page Slider  ====-->
        @if ($pages->has('contact'))
            <section class="cta" id="{{ strtolower($pages['contact']->page_name ?? '') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cta-block">
                                <div class="emmergency item">
                                    <i class="fa fa-phone"></i>
                                    <h2>Emegency Cases</h2>
                                    <a href="tel:{{ $user->phone ?? '' }}">{{ $user->phone ?? '' }}</a>
                                </div>
                                <div class="top-doctor item">
                                    <i class="fa fa-envelope"></i>
                                    <h2>24 Hour Service</h2>
                                    <a href="mailto:{{ $user->email ?? '' }}">{{ $user->email ?? '' }}</a>
                                </div>
                                <div class="working-time item">
                                    <i class="fa fa-hourglass-o"></i>
                                    <h2>Working Hours</h2>
                                    <ul class="w-hours">
                                        <li>{{ Str::substr($user->clinic_open_from, 0, -3) }} -
                                            {{ Str::substr($user->clinic_open_to, 0, -3) }} -
                                            <span>{{ $clinicOpenTime }}
                                                - {{ $clinicCloseTime }}</span></li>
                                        <li>{{ $user->half_day ?? '' }} - <span>{{ $halfDayFrom }} -
                                                {{ $halfDayTo }}</span></li>
                                        <li>{{ $user->closed_clinic }} - <span>Closed</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if ($pages->has('about'))
            <section class="welcome-area section-padding3" id="{{ strtolower($pages['about']->page_name ?? '') }}">
                <div class="container">
                    <div class="row align-items-center"> {{-- 👈 यहाँ जोड़ा --}}

                        <!-- Left Image -->
                        <div class="col-md-7">
                            <div class="welcome-img">
                                <img src="{{ $abouts[0]->image }}" alt="">
                            </div>
                        </div>

                        <!-- Right Text -->
                        <div class="col-md-5">
                            <div class="welcome-text">
                                <h2>{{ $abouts[0]->title }}</h2>
                                <p class="pt-3">{!! $abouts[0]->description !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endif


        <!--about section-->
        @if ($pages->has('service'))
            <section class="feature-section section bg-gray" id="{{ strtolower($pages['service']->page_name ?? '') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="image-content">
                                <div class="section-title text-center">
                                    <h3>{{ $pages['service']->section_title ?? '' }}
                                    </h3>
                                </div>
                                <div class="row">
                                    @foreach ($services as $rows)
                                        <div class="col-md-6">
                                            <div class="item">
                                                <div class="icon-box">
                                                    <figure>
                                                        <a href="#">
                                                            <img src="{{ $rows->icon ?? $rows->image }}"
                                                                alt="">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <h6>{{ $rows->title ?? '' }}</h6>
                                                <p>{!! $rows->description ?? '' !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!--End about section-->

        <!--Start about us area-->
        @if ($pages->has('department'))
            <section class="service-tab-section section" id="{{ strtolower($pages['department']->page_name ?? '') }}">
                <div class="outer-box clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Nav tabs -->
                                <div class="tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach ($departments as $index => $row)
                                            @if ($index == 0)
                                                <li role="presentation" class="active">
                                                    <a href="#{{ $row->name ?? '' }}"
                                                        data-toggle="tab">{{ $row->name ?? '' }}</a>
                                                </li>
                                            @else
                                                <li role="presentation">
                                                    <a href="#{{ $row->name ?? '' }}"
                                                        data-toggle="tab">{{ $row->name ?? '' }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <!--Start single tab content-->
                                <div class="tab-content">
                                    @foreach ($departments as $index => $row)
                                        @if ($index == 0)
                                            <div class="service-box tab-pane fade in active row"
                                                id="{{ $row->name ?? '' }}">
                                                <div class="col-md-6">
                                                    <img class="img-responsive" src="{{ $row->image }}"
                                                        alt="service-image">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="contents">
                                                        <div class="section-title">
                                                            <h3>{{ $row->name }}</h3>
                                                        </div>
                                                        <div class="text">
                                                            <p>{!! $row->description !!}</p>
                                                        </div>
                                                        {{-- <a href="#" class="btn btn-style-one">Read more</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="service-box tab-pane fade in" id="{{ $row->name ?? '' }}">
                                                <div class="col-md-6">
                                                    <img class="img-responsive" src="{{ $row->image }}"
                                                        alt="service-image">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="contents">
                                                        <div class="section-title">
                                                            <h3>{{ $row->name }}</h3>
                                                        </div>
                                                        <div class="text">
                                                            <p>{!! $row->description !!}</p>
                                                        </div>

                                                        {{-- <a href="#" class="btn btn-style-one">Read more</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!--End about us area-->


        <!--team section-->
        @if ($pages->has('doctors'))
            <section class="team-section section" id="{{ strtolower($pages['doctors']->page_name ?? '') }}">
                <div class="container">
                    <div class="section-title text-center">
                        <h3>{{ $pages['doctors']->section_title }}
                        </h3>
                    </div>
                    <div class="row">
                        @foreach ($doctors as $rows)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="team-member">
                                    <img src="{{ $rows->image }}" alt="doctor" class="img-responsive">
                                    <div class="contents text-center">
                                        <h4>{{ $rows->name }}</h4>
                                        <p>{!! $rows->description !!}</p>
                                        {{-- <a href="#" class="btn btn-main">read more</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!--End team section-->

        <!--testimonial-section-->
        @if ($pages->has('testimonial'))
            <section class="testimonial-section"
                style="background: url({{ url('/') }}/frontend/theme8/images/testimonials/1.jpg);"
                id="{{ strtolower($pages['testimonial']->page_name ?? '') }}">
                <div class="container">
                    <div class="section-title text-center">
                        <h3>{{ $pages['testimonial']->section_title ?? '' }}
                        </h3>
                    </div>
                    <div class="testimonial-carousel">

                        @foreach ($testimonials as $rows)
                            <div class="slide-item">
                                <div class="inner-box text-center">
                                    <div class="image-box">
                                        <figure>
                                            <img src="{{ $rows->author_image }}" alt="">
                                        </figure>
                                    </div>
                                    <h6>{{ $rows->author_name }}</h6>
                                    <p>{!! $rows->message !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Contact Section -->
        @if ($pages->has('faq'))
            <section class="appoinment-section section" id="{{ strtolower($pages['faq']->page_name ?? '') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="accordion-section">
                                <div class="section-title">
                                    <h3>{{ $pages['faq']->section_title ?? '' }}</h3>
                                </div>
                                <div class="accordion-holder">
                                    <div class="panel-group" id="accordion" role="tablist"
                                        aria-multiselectable="false">
                                        @foreach ($faqs as $rows)
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab"
                                                    id="heading{{ $rows->id }}">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse"
                                                            data-parent="#accordion"
                                                            href="#collapse{{ $rows->id }}" aria-expanded="false"
                                                            aria-controls="collapse{{ $rows->id }}">
                                                            {{ $rows->question ?? '' }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse{{ $rows->id }}" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading{{ $rows->id }}">
                                                    <div class="panel-body">
                                                        {{ $rows->description ?? '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- End Contact Section -->

        <!--footer-main-->
        <footer class="footer-main">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="about-widget">
                                <div class="footer-logo">
                                    <figure>
                                        <a href="index.html">
                                            <img src="{{ $user->clinic_logo ?? '' }}" alt="" width="100px"
                                                height="50px">
                                        </a>
                                    </figure>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, temporibus?</p>
                                <ul class="location-link">
                                    <li class="item">
                                        <i class="fa fa-map-marker"></i>
                                        <p>{{ $user->address }}, {{ $user->city }}, {{ $user->state }},
                                            {{ $user->country ?? '' }}, {{ $user->pincode }}</p>
                                    </li>
                                    <li class="item">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <a href="mailto:{{ $user->email }}">
                                            <p>{{ $user->email }}</p>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p>{{ $user->phone }}</p>
                                    </li>
                                </ul>
                                <ul class="list-inline social-icons">
                                    <li><a href="{{ $user->facebook_link ?? '' }}"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="{{ $user->twitter_link ?? '' }}"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="{{ $user->linkedin_link ?? '' }}"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li><a href="{{ $user->instagram_link ?? '' }}"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <h6>Services</h6>
                            <ul class="menu-link">
                                @foreach ($services as $service)
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>{{ $service->title ?? '' }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="social-links">
                                <h6>Recent Posts</h6>
                                <ul>
                                    @foreach ($blogs->sortByDesc('created_at')->take(2) as $blog)
                                        <li class="item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{ $blog->image }}"
                                                            alt="post-thumb">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="#">{{ $blog->title ?? '' }}</a>
                                                    </h4>
                                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 100) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container clearfix">
                    <div class="copyright-text">
                        <p>&copy; Copyright {{ date('Y') }}. All Rights Reserved by
                            <a href="#">{{ $user->clinic_name }}</a>
                        </p>
                    </div>
                    <ul class="footer-bottom-link">
                        <li>
                            <a href="#home">Home</a>
                        </li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <!--End footer-main-->

    </div>
    <!--End pagewrapper-->


    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".header-top">
        <span class="icon fa fa-angle-up"></span>
    </div>

    <script src="{{ url('/') }}/frontend/theme8/plugins/jquery.js"></script>
    <script src="{{ url('/') }}/frontend/theme8/plugins/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme8/plugins/bootstrap-select.min.js"></script>
    <!-- Slick Slider -->
    <script src="{{ url('/') }}/frontend/theme8/plugins/slick/slick.min.js"></script>
    <!-- FancyBox -->
    <script src="{{ url('/') }}/frontend/theme8/plugins/fancybox/jquery.fancybox.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script src="{{ url('/') }}/frontend/theme8/plugins/google-map/gmap.js"></script>

    <script src="{{ url('/') }}/frontend/theme8/plugins/validate.js"></script>
    <script src="{{ url('/') }}/frontend/theme8/plugins/wow.js"></script>
    <script src="{{ url('/') }}/frontend/theme8/plugins/jquery-ui.js"></script>
    <script src="{{ url('/') }}/frontend/theme8/plugins/timePicker.js"></script>
    <script src="{{ url('/') }}/frontend/theme8/js/script.js"></script>
    <script>
        window.addEventListener("scroll", function() {
            var navbar = document.getElementById("mainNav");
            if (window.scrollY > 50) { // 50px scroll ke baad
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        });
    </script>
    <script>
        // $(document).ready(function() {

        //     $.ajax({
        //         url: "{{ route('get.theme.color') }}",
        //         type: "GET",
        //         success: function(data) {
        //             if (data.selected_theme == 'theme8') {
        //                 var dataArray = JSON.parse(data.theme_customization);

        //                 // Background Colors
        //                 if (dataArray.bg_colors.primary) {
        //                     $('body').css('background-color', dataArray.bg_colors.primary);
        //                     $('.navbar').css('background-color', dataArray.bg_colors.primary);
        //                     $('.footer-main').css('bacground', dataArray.bg_colors.primary);
        //                 }

        //                 // Text Color
        //                 if (dataArray.colors.primary) {
        //                     $('body').css('color', dataArray.colors.primary);
        //                 }

        //                 // Button & Element Colors
        //                 if (dataArray.colors.primary) {
        //                     let primaryColor = dataArray.colors.primary;
        //                     $('<style>')
        //                         .prop('type', 'text/css')
        //                         .html(`
        //                 .btn .btn-main .btn-white {
        //                     background-color: ${primaryColor} !important;
        //                     border-color: ${primaryColor} !important;
        //                 }
        //                 a, .nav-link, h1, h2, h3, h4, h5, h6, p, i {
        //                     color: ${primaryColor} !important;
        //                 }
        //                 .footer-main .footer-top .social-links ul li p{
        //                     color: ${primaryColor} !important;
        //                 }
        //             `)
        //                         .appendTo('head');
        //                 }

        //                 if (dataArray.colors.secondary) {
        //                     let secondaryColor = dataArray.colors.secondary;
        //                     $('<style>')
        //                         .prop('type', 'text/css')
        //                         .html(`
        //                 .btn .btn-main .btn-white {
        //                     background-color: ${secondaryColor} !important;
        //                     border-color: ${secondaryColor} !important;
        //                 }
        //             `)
        //                         .appendTo('head');
        //                 }

        //                 // Typography
        //                 if (dataArray.typography.font_family) {
        //                     $('body').css('font-family', dataArray.typography.font_family);
        //                 }

        //                 // Layout Style (boxed/full)
        //                 // if (dataArray.layout.style === 'boxed') {
        //                 //     $('#layout-wrapper').removeClass('container-fluid').addClass('container');
        //                 // } else {
        //                 //     $('#layout-wrapper').removeClass('container').addClass('container-fluid');
        //                 // }
        //             }
        //         },
        //         error: function(xhr) {
        //             console.error("Theme color fetch failed", xhr);
        //         }
        //     });
        // });
    </script>
</body>

</html>
