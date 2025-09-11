<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>{{ $user->clinic }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/frontend/theme7/assets/images/logo/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ route('theme.css') }}">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme7/assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme7/assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme7/assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme7/assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme7/assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme7/assets/css/linearicons.css">
    <link rel="stylesheet" href="{{ url('/') }}/frontend/theme7/assets/css/style.css">
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 d-md-flex">
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-mobile"></i></span> call us now! {{ $user->phone??'' }}</h6>
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-envelope-o"></i></span> {{ $user->email }}</h6>
                        <h6><a href="https://maps.google.com/?q={{ $user->address??'' }}" class="mr-2 text-secondary" target="_blank"><i class="fa fa-map-marker"></i> Find our Location</a></h6>
                    </div>
                    <div class="col-lg-3">
                        <div class="social-links">
                            <ul>
                                <li><a href="{{ $user->facebook_link }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $user->linkedin_link }}"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{ $user->twitter_link }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $user->instagram_link }}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="#"><img src="{{ $user->clinic_logo??'' }}" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                       
                        @foreach ($pages as $index=>$page)
                            @if($index==1)
                            <li class="menu-active"><a href="#{{ strtolower($page->page_name??'') }}">{{ ucWords($page->page_name??'') }}</a></li>
                            @else
                            <li><a href="#{{ strtolower($page->page_name??'') }}">{{ ucWords($page->page_name??'') }}</a></li>
                            @endif
                        @endforeach		          				          
                    </ul>
                </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    @if($pages->has('home'))
    <section class="banner-area" id="{{ strtolower($pages['home']->page_name ?? '') }}">
        <div class="container">
            <div class="row">
                @foreach ($banners as $index=>$banner)
                @if($index<1)
                <div class="col-lg-5">
                    <h4>{{ $banner->subtitle??'' }}</h4>
                    <h1>{{ $banner->title??'' }}</h1>
                    <p>{!! $banner->description??'' !!}</p>
                    @if($banner->link)
                    <a href="{{ $banner->link }}" class="template-btn mt-3">Learn More</a>
                    @endif
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- Banner Area End -->

    <!-- Feature Area Starts -->
    @if($pages->has('service'))
    <section class="feature-area section-padding" id="{{ strtolower($pages['service']->page_name??'') }}">
        <div class="container">
            <div class="row">
                @foreach ($services as $rows)
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature text-center item-padding">
                        <img src="{{ $rows->image }}" class="img-fluid" alt="{{ $rows->title }}">
                        <h3>{{ $rows->title??'' }}</h3>
                        <p class="pt-3">{!! $rows->description !!}</p>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- Feature Area End -->

    <!-- Welcome Area Starts -->
    @if($pages->has('about'))
    <section class="welcome-area section-padding3" id="{{ strtolower($pages['about']->page_name??'') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 align-self-center">
                    <div class="welcome-img">
                        <img src="{{ $abouts[0]->image }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="welcome-text mt-5 mt-lg-0">
                        <h2>{{ $abouts[0]->title }}</h2>
                        <p class="pt-3">{!! $abouts[0]->description !!}</p>
                        <a href="#" class="template-btn mt-3">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Welcome Area End -->

    <!-- Department Area Starts -->
    @if($pages->has('department'))
    <section class="department-area section-padding4" id="{{ strtolower($pages['department']->page_name??'') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>{{ $pages['department']->section_title??'' }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="department-slider owl-carousel">
                        @foreach ($departments as $rows)
                            <div class="single-slide">
                            <div class="slide-img">
                                <img src="{{ $rows->image??'' }}" alt="" class="img-fluid">
                                <div class="hover-state">
                                    <a href="#"><i class="fa fa-stethoscope"></i></a>
                                </div>
                            </div>
                            <div class="single-department item-padding text-center">
                                <h3>{{ $rows->name??'' }}</h3>
                                <p>{!! $rows->description !!}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Department Area Starts -->

    <!-- Patient Area Starts -->
    @if ($pages->has('testimonial'))
    <section class="patient-area section-padding" id="{{ strtolower($pages['testimonial']->page_name ?? '') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>{{ $pages['testimonial']->section_title??'' }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($testimonials as $rows)
                <div class="col-lg-6">
                    <div class="single-patient mb-4">
                        <img src="{{ $rows->author_image??'' }}" alt="">
                        <h3>{{ $rows->author_name }}</h3>
                        <h5>{{ $rows->designation }}</h5>
                        <p class="pt-3">{!! $rows->message !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- Patient Area Starts -->

    <!-- Specialist Area Starts -->
    @if ($pages->has('doctors'))
    <section class="specialist-area section-padding" id="{{ strtolower($pages['doctors']->page_name ?? '') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>{{ $pages['doctors']->section_title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($doctors as $rows)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-doctor mb-4 mb-lg-0">
                            <div class="doctor-img">
                                <img src="{{ $rows->image }}" alt="" class="img-fluid">
                            </div>
                            <div class="content-area">
                                <div class="doctor-name text-center">
                                    <h3>{{ $rows->name??'' }}</h3>
                                    <h6>{{ $rows->department->name }}</h6>
                                </div>
                                <div class="doctor-text text-center">
                                    <p>If you are looking at blank cassettes on the web, you may be very confused at the.</p>
                                    <ul class="doctor-icon">
                                        <li><a href="#"><i class="fa fa-facebook"></i><a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i><a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i><a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i><a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- Specialist Area Starts -->

    <!-- Hotline Area Starts -->
    @if ($pages->has('contact'))
    <section class="hotline-area text-center section-padding" id="{{ strtolower($pages['contact']->page_name??'') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Emergency hotline</h2>
                    <span>(+91) – {{ $user->phone??'' }}</span>
                    <p class="pt-3">We provide 24/7 customer support. Please feel free to contact us <br>for emergency case.</p>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Hotline Area End -->

    <!-- News Area Starts -->
    @if ($pages->has('blog'))
    <section class="news-area section-padding" id="{{ strtolower($pages['blog']->page_name??'') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>{{ $pages['blog']->section_title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-news">
                        <div class="news-img">
                            <img src="{{ $blog->image??'' }}" alt="" class="img-fluid">
                        </div>
                        <div class="news-text">
                            <div class="news-date">
                                {{ date('d F Y', strtotime($blog->created_at)) }}
                            </div>
                            <h3><a href="blog-details.html">{{ $blog->title??'' }}</a></h3>
                            <p>{!! $blog->description !!}</p>
                            <a href="#" class="news-btn">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- News Area Starts -->
    
    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">Useful Links</h3>
                            <ul>
                                <li class="mb-2"><a href="#home">Home</a></li>
                                <li class="mb-2"><a href="#about">About Us</a></li>
                                <li class="mb-2"><a href="#contact">Contact Us</a></li>
                                <li><a href="#services">Services</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">newsletter</h3>
                            <p class="mb-4">You can trust us. we only send promo offers, not a single.</p>  
                            <form action="#">
                                <input type="email" placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" required>
                                <button type="submit" class="template-btn">subscribe now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-lg-3">
                        <div class="single-widge-home">
                            <img src="{{ $user->clinic_logo }}">
                            <div class="footer-user-details">
                                <p><i class="fa fa-phone"></i> {{ $user->phone??'' }}</p>
                                <p><i class="fa fa-envelope"></i> {{ $user->email??'' }}</p>
                                <p><i class="fa fa-map-marker"></i> {{ $user->address??'' }}, {{ $user->city??'' }}, {{ $user->state??'' }}, {{ $user->country??'' }}, {{ $user->pincode??'' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <span>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Created By {{ $user->clinic_name??'' }}
</span>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li><a href="{{ $user->facebook_link }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $user->twitter_link }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $user->linkedin_link }}"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{ $user->instagram_link }}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="{{ url('/') }}/frontend/theme7/assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="{{ url('/') }}/frontend/theme7/assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme7/assets/js/vendor/wow.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme7/assets/js/vendor/owl-carousel.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme7/assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme7/assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme7/assets/js/vendor/superfish.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme7/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
    // Smooth scroll for nav links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();

        var target = this.hash;
        var $target = $(target);

        if ($target.length) {
            $('html, body').animate({
                scrollTop: $target.offset().top - 70 // navbar height adjust
            }, 800, 'swing');
        }
    });
});
</script>
    <script>
// $(document).ready(function(){

//     $.ajax({
//         url: "{{ route('get.theme.color') }}",
//         type: "GET",
//         success: function(data){
//             if(data.selected_theme === 'theme7'){ 
//             var dataArray = JSON.parse(data.theme_customization);

//             // Background Colors
//             if (dataArray.bg_colors.primary) {
//                 $('body').css('background-color', dataArray.bg_colors.primary);
//                 $('.header-scrolled').css('background-color', dataArray.bg_colors.primary);
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
//                         .template-btn {
//                             background-color: ${primaryColor} !important;
//                             border-color: ${primaryColor} !important;
//                         }
//                         a, .nav-link, h1, h2, h3, h4, h5, h6, p {
//                             color: ${primaryColor} !important;
//                         }
//                         .template-btn {
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
