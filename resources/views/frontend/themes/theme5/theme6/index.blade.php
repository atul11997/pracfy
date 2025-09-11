<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">

    <title> {{ $user->clinic }} </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/frontend/theme6/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ route('theme.css') }}">
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="{{ url('/') }}/frontend/theme6/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ url('/') }}/frontend/theme6/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ url('/') }}/frontend/theme6/css/responsive.css" rel="stylesheet" />
    <style>
        .doctor_section .box .img-box img {
            width: 100%;
            height: 400px;
        }

        .navbar-brand img {
            width: 50px;
        }
    </style>
</head>

<body>
    <!-- slider section -->
    <div class="hero_area">
        <div class="hero_bg_box">
            <img src="{{ url('/') }}/frontend/theme6/images/hero-bg.png" alt="">
        </div>
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        @if ($user->clinic_logo)
                            <span>
                                <img src="{{ $user->clinic_logo }}">
                            </span>
                        @else
                            <span>{{ $user->clinic_name ?? '' }}</span>
                        @endif
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            @foreach ($pages as $index => $page)
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="#{{ strtolower($page->page_name ?? '') }}">{{ ucWords($page->page_name ?? '') }}</a>
                                </li>
                            @endforeach
                            {{-- <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form> --}}
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <header class="header_section_sticky" id="stickyHeader">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="#">
                        @if ($user->clinic_logo)
                            <span>
                                <img src="{{ $user->clinic_logo }}">
                            </span>
                        @else
                            <span>{{ $user->clinic_name ?? '' }}</span>
                        @endif
                    </a>

                    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            @foreach ($pages as $index => $page)
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="#{{ strtolower($page->page_name ?? '') }}">{{ ucWords($page->page_name ?? '') }}</a>
                                </li>
                            @endforeach
                            {{-- <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form> --}}
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        @if($pages->has('home'))
        <section class="slider_section " id="{{ strtolower($pages['home']->page_name ?? '') }}">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($banners as $index => $banner)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="container ">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                {{ $banner->title ?? '' }}
                                            </h1>
                                            <p>
                                                {!! $banner->description ?? '' !!}
                                            </p>
                                            @if ($banner->link)
                                                <div class="btn-box">
                                                    <a href="{{ $banner->link ?? '' }}" class="btn1">
                                                        Read More
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
          </div>
        </section>
        @endif

        <!-- end slider section -->
    </div>

    <!-- department section -->
    @if ($pages->has('department'))
        <section class="department_section layout_padding" id="{{ strtolower($pages['department']->page_name ?? '') }}">
            <div class="department_container">
                <div class="container ">
                    <div class="heading_container heading_center">
                        <h2>
                            {{ $pages['department']->section_title ?? '' }}
                        </h2>
                    </div>
                    <div class="row">
                        @foreach ($departments as $rows)
                            <div class="col-md-3">
                                <div class="box ">
                                    <div class="img-box">
                                        <img src="{{ $rows->image ?? '' }}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $rows->name ?? '' }}
                                        </h5>
                                        <p>
                                            {!! $rows->description ?? '' !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- end department section -->

    <!-- about section -->
    @if ($pages->has('about'))
        <section class="about_section layout_margin-bottom" id="{{ strtolower($pages['about']->page_name ?? '') }}">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="img-box">
                            <img src="{{ $abouts[0]->image ?? '' }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    {{ $abouts[0]->title ?? '' }}
                                </h2>
                            </div>
                            <p>
                                {!! $abouts[0]->description ?? '' !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- end about section -->

    <!-- doctor section -->
    @if ($pages->has('doctors'))
        <section class="doctor_section layout_padding" id="{{ strtolower($pages['doctors']->page_name ?? '') }}">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        {{ $pages['doctor']->section_title ?? '' }}
                    </h2>
                    {{-- <p class="col-md-10 mx-auto px-0">
                     Incilint sapiente illo quo praesentium officiis laudantium nostrum, ad adipisci cupiditate sit,
                     quisquam aliquid. Officiis laudantium fuga ad voluptas aspernatur error fugiat quos facilis saepe quas
                     fugit, beatae id quisquam.
                 </p> --}}
                </div>
                <div class="row">
                    @foreach ($doctors as $doctor)
                        <div class="col-sm-6 col-lg-4 mx-auto">
                            <div class="box">
                                <div class="img-box">
                                    <img src="{{ $doctor->image ?? '' }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <div class="social_box">
                                        @php
                                            $socialLinks = json_decode($doctor->social_media_links, true);
                                        @endphp

                                        @if ($socialLinks)
                                            <div class="social-links">
                                                @foreach ($socialLinks as $platform => $link)
                                                    @if ($link)
                                                        <a href="{{ $link }}" target="_blank">
                                                            <i class="fa fa-{{ $platform }}"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <h5>
                                        {{ $doctor->name ?? '' }}
                                    </h5>
                                    <h6 class="">
                                        Doctor
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- end doctor section -->

    <!-- contact section -->
    @if ($pages->has('contact'))
        <section class="contact_section layout_padding" id="{{ strtolower($pages['contact']->page_name ?? '') }}">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        {{ $pages['contact']->section_title ?? '' }}
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form_container contact-form">
                            <form action="">
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div>
                                            <input type="text" placeholder="Your Name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <input type="text" placeholder="Phone Number" />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="email" placeholder="Email" />
                                </div>
                                <div>
                                    <input type="text" class="message-box" placeholder="Message" />
                                </div>
                                <div class="btn_box">
                                    <button>
                                        SEND
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="map_container">
                            <div class="map">
                                <iframe width="100%" height="450" style="border:0" loading="lazy"
                                    allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                                    src="https://www.google.com/maps?q={{ urlencode($latlong['place']) }}&z=14&output=embed">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- end contact section -->

    <!-- client section -->
    @if ($pages->has('testimonial'))
        <section class="client_section layout_padding-bottom"
            id="{{ strtolower($pages['testimonial']->page_name ?? '') }}">
            <div class="container">
                <div class="heading_container heading_center ">
                    <h2>
                        {{ $pages['testimonial']->section_title ?? '' }}
                    </h2>
                </div>
                <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($testimonials as $index => $rows)
                            <div class="carousel-item  {{ $index == 0 ? 'active' : '' }}">
                                <div class="row">
                                    <div class="col-md-11 col-lg-10 mx-auto">
                                        <div class="box">
                                            <div class="img-box">
                                                <img src="{{ $rows->author_image }}" alt="" />
                                            </div>
                                            <div class="detail-box">
                                                <div class="name">
                                                    <h6>
                                                        {{ $rows->author_name ?? '' }}
                                                    </h6>
                                                </div>
                                                <p>
                                                    {!! $rows->message ?? '' !!}
                                                </p>
                                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="carousel_btn-container">
                        <a class="carousel-control-prev" href="#carouselExample2Controls" role="button"
                            data-slide="prev">
                            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample2Controls" role="button"
                            data-slide="next">
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 footer_col">
                <div class="footer_contact">
                    <h4>
                        Reach at..
                    </h4>
                    <div class="contact_link_box">
                        <a href="http://maps.google.com/maps?q=<?php echo urlencode($user->address); ?> " target="_blank">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Location
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call +91 {{ $user->phone ?? '' }}
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                {{ $user->email ?? '' }}
                            </span>
                        </a>
                    </div>
                </div>
                <div class="footer_social">
                    <a href="{{ $user->facebook_link ?? '' }}">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="{{ $user->twitter_link ?? '' }}">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="{{ $user->linkdin_link ?? '' }}">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                    <a href="{{ $user->instagram_link ?? '' }}">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 footer_col">
                <div class="footer_uesr_detail">
                    <h4>
                        About
                    </h4>
                    <p>
                        Beatae provident nobis mollitia magnam voluptatum, unde dicta facilis minima veniam corporis
                        laudantium alias tenetur eveniet illum reprehenderit fugit a delectus officiis blanditiis
                        ea.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 mx-auto footer_col">
                <div class="footer_link_box">
                    <h4>
                        Links
                    </h4>
                    <div class="footer_links">
                        @foreach ($pages as $page)
                            <a class="active" href="#{{ strtolower($page->page_name ?? '') }}">
                                {{ ucWords($page->page_name ?? '') }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 footer_col ">
                <h4>
                    Newsletter
                </h4>
                <form action="#">
                    <input type="email" placeholder="Enter email" />
                    <button type="submit">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
        <div class="footer-info">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved Created By {{ $user->clinic_name ?? '' }}
            </p>

        </div>
    </div>
</footer>
<!-- footer section -->

<!-- jQery -->
<script type="text/javascript" src="{{ url('/') }}/frontend/theme6/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script type="text/javascript" src="{{ url('/') }}/frontend/theme6/js/bootstrap.js"></script>
<!-- owl slider -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<!-- custom js -->
<script type="text/javascript" src="{{ url('/') }}/frontend/theme6/js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<!-- End Google Map -->
<script>
    window.addEventListener("scroll", function () {
    const header = document.getElementById("stickyHeader");
    if (window.scrollY > 100) {   // 100px ke baad show hoga
        header.classList.add("show");
    } else {
        header.classList.remove("show");
    }
});
</script>
<script>
// $(document).ready(function(){

//     $.ajax({
//         url: "{{ route('get.theme.color') }}",
//         type: "GET",
//         success: function(data){
//             if(data.selected_theme === 'theme6'){ 
//             var dataArray = JSON.parse(data.theme_customization);

//             // Background Colors
//             if (dataArray.bg_colors.primary) {
//                 $('body').css('background-color', dataArray.bg_colors.primary);
//                 $('.header_section, .header_section_sticky show').css('background-color', dataArray.bg_colors.primary);
//             }

//             // Text Color
//             if (dataArray.colors.primary) {
//                 $('body').css('color', dataArray.colors.primary);
//             }

//             // Button & Element Colors
//             if (dataArray.colors.primary) {
//                 let primaryColor = dataArray.colors.primary;
//                 $('<style>')
//                     .prop('type', 'text/css')
//                     .html(`
//                         .btn-primary {
//                             background-color: ${primaryColor} !important;
//                             border-color: ${primaryColor} !important;
//                         }
//                         a, .nav-link, h1, h2, h3, h4, h5, h6, .footer_uesr_detail p, p {
//                             color: ${primaryColor} !important;
//                         }
//                         .bg-primary {
//                             background-color: ${primaryColor} !important;
//                         }
//                     `)
//                     .appendTo('head');
//             }

//             if (dataArray.colors.secondary) {
//                 let secondaryColor = dataArray.colors.secondary;
//                 $('<style>')
//                     .prop('type', 'text/css')
//                     .html(`
//                         .btn-secondary {
//                             background-color: ${secondaryColor} !important;
//                             border-color: ${secondaryColor} !important;
//                         }
//                         .bg-secondary {
//                             background-color: ${secondaryColor} !important;
//                         }
//                     `)
//                     .appendTo('head');
//             }

//             // Typography
//             if (dataArray.typography.font_family) {
//                 $('body').css('font-family', dataArray.typography.font_family);
//             }

//             // Layout Style (boxed/full)
//             if (dataArray.layout.style === 'boxed') {
//                 $('#layout-wrapper').removeClass('container-fluid').addClass('container');
//             } else {
//                 $('#layout-wrapper').removeClass('container').addClass('container-fluid');
//             }
//         }
//         },
//         error: function(xhr) {
//             console.error("Theme color fetch failed", xhr);
//         }
//     });
// });
</script>
</body>

</html>
