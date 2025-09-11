<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $user->clinic }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CareMed demo project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/frontend/theme5/styles/bootstrap4/bootstrap.min.css">
    <link href="{{ url('/') }}/frontend/theme5/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/frontend/theme5/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/frontend/theme5/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/frontend/theme5/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/frontend/theme5/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/frontend/theme5/styles/responsive.css">
</head>
<style>
                .logo_text img{
                width: 100px;
            }
</style>
<body>

    <div class="super_container">

        <!-- Header -->
		
        <header class="header trans_200">

            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                <div class="top_bar_item"><a href="#faq">FAQ</a></div>
                                {{-- <div class="top_bar_item"><a href="#">Request an Appointment</a></div> --}}
                                <div
                                    class="emergencies  d-flex flex-row align-items-center justify-content-start ml-auto">
                                    For Emergencies: {{ $user->phone??'' }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Content -->
            <div class="header_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <nav class="main_nav ml-auto">
                                    <ul>
                                        @foreach ($pages as $index=>$page)
                                        <li><a href="#{{ strtolower($page->page_name??'') }}" class="active">{{ $page->page_name??'' }}</a></li>
                                        @endforeach
                                        {{-- <li><a href="contact.html">Contact</a></li> --}}
                                    </ul>
                                </nav>
                                <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo -->
            <div class="logo_container_outer">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="logo_container">
                                <a href="#">
                                    <div
                                        class="logo_content d-flex flex-column align-items-start justify-content-center">
                                        <div class="logo_line"></div>
                                        @if($user->clinic_logo)
                                        <div class="logo_text text-sm"><img src="{{ $user->clinic_logo }}"></div>
                                        @else
                                        <div class="logo_text text-sm">{{ $user->clinic_name??'' }}</div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <!-- Menu -->

        <div class="menu_container menu_mm">

            <!-- Menu Close Button -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Menu Items -->
            <div class="menu_inner menu_mm">
                <div class="menu menu_mm">
                    <ul class="menu_list menu_mm">
                        @foreach ($pages as $index=>$page)
                        <li class="menu_item menu_mm"><a class="{{ $index === 0 ? 'active' : '';  }}" href="#{{ strtolower($page->page_name??'') }}">{{ $page->page_name??'' }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="menu_extra">
                    <div class="menu_appointment"><a href="#">Request an Appointment</a></div>
                    <div class="menu_emergencies">For Emergencies: +563 47558 623</div>
                </div>

            </div>

        </div>


        <!-- Home -->
		
@php
  use App\Models\User;
  use Carbon\Carbon;
  $user = User::where('id', Auth::user()->id)->first();

    $clinicOpenTime = $user->clinic_open_time ? Carbon::parse($user->clinic_open_time)->format('h A') : '';
    $clinicCloseTime = $user->clinic_close_time ? Carbon::parse($user->clinic_close_time)->format('h A') : '';
    $halfDayFrom = $user->time_of_half_day_from ? Carbon::parse($user->time_of_half_day_from)->format('h:i A') : '';
    $halfDayTo = $user->time_of_half_day_to ? Carbon::parse($user->time_of_half_day_to)->format('h:i A') : '';
@endphp
        @if($pages->has('home'))
        <div class="home" id="{{ strtolower($pages['home']->page_name??'') }}">
            <div class="home_slider_container">
                <!-- Home Slider -->
                <div class="owl-carousel owl-theme home_slider">
                    @foreach($banners as $banner)
                    <div class="owl-item">
                        <div class="home_slider_background" style="background-image:url({{ $banner->image??'' }})">
                        </div>
                        <div class="home_content">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="home_content_inner">
                                            <div class="home_title">
                                                <h1>{{ $banner->title??'' }}</h1>
                                            </div>
                                            <div class="home_text">
                                                <p>{!! $banner->description??'' !!}</p>
                                            </div>
                                            @if($banner->link)
                                            <div class="button home_button">
                                                <a href="{{ $banner->link??'' }}">read more</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Slider Progress -->
        <div class="home_slider_progress"></div>
            </div>
        </div>

        <!-- 3 Boxes -->

        <div class="boxes">
            <div class="container">
                <div class="row">

                    <!-- Box -->
                    <div class="col-lg-4 box_col">
                        <div class="box working_hours">
                            <div class="box_icon d-flex flex-column align-items-start justify-content-center">
                                <div style="width:29px; height:29px;"><img src="{{ url('/') }}/frontend/theme5/images/alarm-clock.svg"
                                        alt=""></div>
                            </div>
                            <div class="box_title">Working Hours</div>
                            <div class="working_hours_list">
                                <ul>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div>{{ $user->clinic_open_from??'' }} - {{ $user->clinic_open_to??'' }}</div>
                                        <div class="ml-auto">{{ $clinicOpenTime }} - {{ $clinicCloseTime }}</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div>{{ $user->half_day ?? '' }}</div>
                                        <div class="ml-auto">{{ $halfDayFrom }} - {{ $halfDayTo }}</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div>{{ $user->closed_clinic }}</div>
                                        <div class="ml-auto">Closed</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Box -->
                    <div class="col-lg-4 box_col">
                        <div class="box box_appointments">
                            <div class="box_icon d-flex flex-column align-items-start justify-content-center">
                                <div style="width: 29px; height:29px;"><img src="{{ url('/') }}/frontend/theme5/images/phone-call.svg"
                                        alt=""></div>
                            </div>
                            <div class="box_title">Email</div>
                            <div class="box_text">{{ $user->email??'' }}</div>
                        </div>
                    </div>

                    <!-- Box -->
                    <div class="col-lg-4 box_col">
                        <div class="box box_emergency">
                            <div class="box_icon d-flex flex-column align-items-start justify-content-center">
                                <div style="width: 37px; height:37px; margin-left:-4px;"><img src="{{ url('/') }}/frontend/theme5/images/bell.svg"
                                        alt=""></div>
                            </div>
                            <div class="box_title">Emergency Cases</div>
                            <div class="box_phone">{{ $user->phone??'' }}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
        <!-- About -->
        @if($pages->has('about'))
        <div class="about" id="{{ strtolower($pages['about']->page_name??'') }}">
            <div class="container">
                <div class="row row-lg-eq-height">

                    <!-- About Content -->
                    <div class="col-lg-7">
                        <div class="about_content">
                            <div class="section_title">
                                <h2>{{ $abouts[0]->title??'' }}</h2>
                            </div>
                            <div class="about_text">
                                <p>{!! $abouts[0]->description??'' !!}</p>
                            </div>
                            {{-- <div class="button about_button">
                                <a href="#">read more</a>
                            </div> --}}
                        </div>
                    </div>

                    <!-- About Image -->
                    <div class="col-lg-5">
                        <div class="about_image"><img src="{{ $abouts[0]->image??'' }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Departments -->
        @if($pages->has('department'))
        <div class="departments" id="{{ strtolower($pages['department']->page_name??'') }}">
            <div class="departments_background parallax-window" data-parallax="scroll"
                data-image-src="{{ url('/') }}/frontend/theme5/images/departments.jpg" data-speed="0.8"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title section_title_light">
                            <h2>{{ $pages['department']->section_title??'' }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row departments_row row-md-eq-height">
                    @foreach ($departments as $department)
                        <!-- Department -->
                        <div class="col-lg-3 col-md-6 dept_col">
                            <div class="dept">
                                <div class="dept_image"><img src="{{ $department->image??'' }}" alt=""></div>
                                <div class="dept_content text-center">
                                    <div class="dept_title">{{ $department->name??'' }}</div>
                                </div>
                            </div>
                        </div>             
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Services -->+
        @if($pages->has('service'))
        <div class="services" id="{{ strtolower($pages['service']->page_name??'') }}">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title">
                            <h2>{{ $pages['service']->section_title??'' }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row services_row">
                    @foreach ($services as $rows)
                        <!-- Service -->
                        <div class="col-lg-4 col-md-6 service_col">
                            <a>
                                <div class="service text-center trans_200">
                                    <div class="service_icon"><img class="svg" src="{{ $rows->image??'' }}"
                                            alt=""></div>
                                    <div class="service_title trans_200">{{ $rows->title??'' }}</div>
                                    <div class="service_text">
                                        <p>{!! $rows->description??'' !!}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    <section class="py-5" id="faq">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-8 col-lg-10 col-md-12 mx-auto">
                <div class="section-title mb-4">
                    <h2 class="title">Frequently Asked Question</h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div id="accordion" class="accordion-custom">
                    @foreach ($faqs as $faq)
                        <div class="card">
                            <div class="card-header" id="heading{{ $faq->id }}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed d-flex justify-content-between align-items-center w-100"
                                        data-toggle="collapse"
                                        data-target="#collapse{{ $faq->id }}"
                                        aria-expanded="false"
                                        aria-controls="collapse{{ $faq->id }}">
                                        <span>{{ $faq->question ?? '' }}</span>
                                        <i class="arrow-icon fa fa-angle-down"></i>
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{ $faq->id }}"
                                class="collapse"
                                aria-labelledby="heading{{ $faq->id }}"
                                data-parent="#accordion">
                                <div class="card-body">
                                    {!! $faq->description ?? '' !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Footer -->
		        <footer class="footer">
            <div class="footer_container">
                <div class="container">
                    <div class="row">

                        <!-- Footer - About -->
                        <div class="col-lg-6 footer_col">
                            <div class="footer_about">
                                <div class="footer_logo_container">
                                    <a href="#"
                                        class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="logo_content">

                                        @if($user->clinic_logo)
                                        <div class="logo_image"><img src="{{ $user->clinic_logo }}"></div>
                                        @else
                                        <div class="logo_text text-sm">{{ $user->clinic_name??'' }}</div>
                                        @endif
                                        </div>
                                    </a>
                                </div>
                                <ul class="footer_about_list">
                                    <li>
                                        <div class="footer_about_icon"><img src="{{ url('/') }}/frontend/theme5/images/phone-call.svg"
                                                alt=""></div><span>{{ $user->phone??'' }}</span>
                                    </li>
                                    <li>
                                        <div class="footer_about_icon"><img src="{{ url('/') }}/frontend/theme5/images/envelope.svg" alt="">
                                        </div><span>{{ $user->email??'' }}</span>
                                    </li>
                                    <li>
                                        <div class="footer_about_icon"><img src="{{ url('/') }}/frontend/theme5/images/placeholder.svg"
                                                alt=""></div><span>{{ $user->address??'' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer - Links -->
                        <div class="col-lg-6 footer_col">
                            <div class="footer_links footer_column">
                                <div class="footer_title">Useful Links</div>
                                <ul>
                                        @if($pages->has('home'))
                                        <li><a href="#{{ strtolower($pages['home']->page_name??'') }}" class="active">{{ $pages['home']->section_title??'' }}</a></li>
                                        @endif
                                        @if($pages->has('about'))
                                        <li><a href="#{{ strtolower($pages['about']->page_name??'') }}">{{ $pages['about']->section_title??'' }}</a></li>
                                        @endif
                                        @if($pages->has('department'))
                                        <li><a href="#{{ strtolower($pages['department']->page_name??'') }}">{{ $pages['department']->section_title??'' }}</a></li>
                                        @endif
                                        @if($pages->has('service'))
                                        <li><a href="#{{ strtolower($pages['service']->page_name??'') }}">{{ $pages['service']->section_title??'' }}</a></li>
                                        @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div
                                class="copyright_content d-flex flex-lg-row flex-column align-items-lg-center justify-content-start">
                                <div class="cr">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved
                                </div>
                                <div class="footer_social ml-lg-auto">
                                    <ul>
                                        <li><a href="{{ $user->facebook_link??'' }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="{{ $user->twitter_link??'' }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="{{ $user->instagram_link??'' }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="{{ $user->linkdin_link??'' }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ url('/') }}/frontend/theme5/js/jquery-3.2.1.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme5/styles/bootstrap4/popper.js"></script>
    <script src="{{ url('/') }}/frontend/theme5/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme5/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="{{ url('/') }}/frontend/theme5/plugins/easing/easing.js"></script>
    <script src="{{ url('/') }}/frontend/theme5/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="{{ url('/') }}/frontend/theme5/js/custom.js"></script>
</body>

</html>
