<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themewagon.github.io/health-center/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jul 2025 11:27:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
     <title>{{ Auth::user()->clinic_name??'' }}</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/css/font-awesome.min.css">
     <link rel="stylesheet" href="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/css/animate.css">
     <link rel="stylesheet" href="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/css/owl.carousel.css">
     <link rel="stylesheet" href="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/css/tooplate-style.css">
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>
    @php
     use App\Models\User;
     use Illuminate\Support\Str;
     $user = User::where('id', Auth::user()->id)->first();
    @endphp
{{-- Header --}}
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Welcome to a Professional Health Care</p>
                    </div>
                    @php
                    use Carbon\Carbon;

                    $clinicOpenTime = $user->clinic_open_time ? Carbon::parse($user->clinic_open_time)->format('h:i A') : '';
                    $clinicCloseTime = $user->clinic_close_time ? Carbon::parse($user->clinic_close_time)->format('h:i A') : '';
                    @endphp  
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i> {{ $user->phone??'' }}</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> {{ $clinicOpenTime }} - {{ $clinicCloseTime }} ({{ Str::substr($user->clinic_open_from, 0, -3) }}-{{ Str::substr($user->clinic_open_to, 0, -3) }})</span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $user->email??'' }}">{{ $user->email??'' }}</a></span>
                    </div>

               </div>
          </div>
     </header>
          <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="{{ url('/user').'/'.encrypt(Auth::user()->id) }}" class="navbar-brand">{{ $user->clinic_name }}</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav navbar-right">
                    @foreach ($pages as $index => $page)
                         <li>
                              <a href="#{{ strtolower($page->page_name ?? '') }}"
                                   class="smoothScroll">
                                   {{ $page->page_name ?? '' }}
                              </a>
                         </li>
                    @endforeach
                    </ul>
               </div>
          </div>
     </section>


{{-- Main Content --}}
    @if ($pages->has('home'))
    <section id="{{ strtolower($pages['home']->page_name??'') }}" class="slider" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($banners as $banner)
                        <div class="item" style="background-image: url('{{ $banner->image ?? '' }}');">
                            <div class="caption">
                                <div class="col-md-offset-1 col-md-10">
                                    <h3>{{ $banner->subtitle ?? '' }}</h3>
                                    <h1>{{ $banner->title ?? '' }}</h1>
                                    @if ($banner->link)
                                        <a href="{{ $banner->link }}" class="section-btn btn btn-default smoothScroll">
                                            Meet Our Doctors
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif


    <!-- ABOUT -->
    @if ($pages->has('about'))
    <section id="{{ strtolower($pages['about']->page_name??'') }}" style="background-image: url('{{ $abouts[0]->image ?? '' }}'); no-repeat top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                        <h2 class="wow fadeInUp" data-wow-delay="0.6s">{{ $abouts[0]->title ?? '' }}</h2>
                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <p>{!! $abouts[0]->description ?? '' !!}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endif

    @if ($pages->has('doctors'))
    <section id="{{ strtolower($pages['doctors']->page_name??'') }}" data-stellar-background-ratio="1">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                        <h2 class="wow fadeInUp" data-wow-delay="0.1s">{{ $pages['doctors']->section_title }}</h2>
                    </div>
                </div>

                <div class="clearfix"></div>
                @foreach ($doctors as $doctor)
                    @php
                        $socialLinks = json_decode($doctor->social_media_links, true) ?? [];
                        $iconMap = [
                            'instagram' => 'instagram',
                            'facebook' => 'facebook-f',
                            'linkedin' => 'linkedin',
                        ];
                    @endphp
                    <div class="col-md-3 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                            <img src="{{ $doctor->image ?? '' }}" class="img-responsive" alt="" style="object-fit: contain;">

                            <div class="team-info">
                                <h3>{{ $doctor->name ?? '' }}</h3>
                                <p>{{ $doctor->department->name ?? '' }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    <!-- TEAM -->
    @if ($pages->has('service'))
    <section id="{{ strtolower($pages['service']->page_name??'') }}">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                        <h2 class="wow fadeInUp" data-wow-delay="0.1s">{{ $pages['service']->section_title }}</h2>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row g-3">
                    @foreach ($services as $service)
                        <div class="col-md-4 col-sm-6">
                            <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                                <img src="{{ $service->image ?? '' }}" class="img-responsive" alt="">

                                <div class="team-info">
                                    <h3>{{ $service->title ?? '' }}</h3>
                                    <p>{!! $service->description ?? '' !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    @endif


    <!-- NEWS -->
    @if ($pages->has('blog'))
    <section id="{{ strtolower($pages['blog']->page_name??'') }}">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                        <h2>{{ $pages['blog']->section_title }}</h2>
                    </div>
                </div>
                @foreach ($blogs as $blog)
                    <div class="col-md-4 col-sm-6">
                        <!-- NEWS THUMB -->
                        <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <a href="news-detail.html">
                                <img src="images/news-image1.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="news-info d-flex">
                                <div>
                                    <span>{{ date('F', strtotime($blog->created_at)) }}
                                        {{ date('d', strtotime($blog->created_at)) }},
                                        {{ date('Y', strtotime($blog->created_at)) }}</span>
                                    <h3><a>{{ $blog->title ?? '' }}</a></h3>
                                    <p>
                                        {{ \Illuminate\Support\Str::words(strip_tags($blog->description), 15, '...') }}
                                        <a class="text-primary" tabindex="0" role="button" data-bs-toggle="popover"
                                            data-bs-html="true" data-bs-trigger="focus" title="{{ $blog->title }}"
                                            data-bs-content="{{ strip_tags($blog->description) }}">
                                            Show More
                                        </a>
                                    </p>
                                </div>
                                <div class="author">
                                    <img src="{{ $blog->image ?? '' }}" class="img-responsive" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- GOOGLE MAP -->
    @if ($pages->has('contact'))
    <section id="{{ strtolower($pages['contact']->page_name??'') }}">
        <iframe width="100%" height="450" style="border:0" loading="lazy" allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps?q={{ urlencode($latlong['place']) }}&z=14&output=embed">
        </iframe>
    </section>
    @endif
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="popover"]').popover();
        });
    </script>

        
     <!-- FOOTER -->
     @php
         use App\Models\Blog;
         $user = User::where('id', Auth::user()->id)->first();
         $blogs = Blog::where('userid', Auth::user()->id)->get();
     @endphp
<footer class="bg-light pt-5 pb-4 border-top">
    <div class="container">
        <div class="row gy-4">

            <!-- Contact Info -->
            <div class="col-md-4">
                <div class="footer-thumb">
                    <h5 class="fw-bold mb-3">Contact Info</h5>
                    <p class="mb-2">{{ $user->address ?? '' }}, {{ $user->city ?? '' }}, {{ $user->state ?? '' }}, {{ $user->country ?? '' }} - {{ $user->pincode ?? '' }}</p>
                    <p class="mb-1"><i class="fa fa-phone me-2"></i> {{ $user->phone ?? '' }}</p>
                    <p><i class="fa fa-envelope-o me-2"></i> <a href="mailto:{{ $user->email ?? '' }}">{{ $user->email ?? '' }}</a></p>
                </div>
            </div>

            <!-- Latest News -->
            <div class="col-md-4">
                <div class="footer-thumb">
                    <h5 class="fw-bold mb-3">Latest News</h5>
                   @foreach ($blogs->sortByDesc('created_at')->take(2) as $blog)
                    
                        <div class="d-flex mb-3 align-items-center">
                            <div class="me-3" style="flex-shrink: 0;">
                                <img src="{{ $blog->image ?? '' }}" alt="" style="width: 60px; height: 60px; object-fit: cover;" class="rounded">
                            </div>
                            <div>
                                <a href="#news" class="text-dark text-decoration-none">
                                    <h6 class="mb-1">{{ $blog->title ?? '' }}</h6>
                                </a>
                                <small class="text-muted">{{ date('F d, Y', strtotime($blog->created_at)) }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Opening Hours & Social -->
            <div class="col-md-4">
                <div class="footer-thumb">
                    <h5 class="fw-bold mb-3">Opening Hours</h5>
                    @php

                        $clinicOpenTime = $user->clinic_open_time ? Carbon::parse($user->clinic_open_time)->format('h:i A') : '';
                        $clinicCloseTime = $user->clinic_close_time ? Carbon::parse($user->clinic_close_time)->format('h:i A') : '';
                        $halfDayFrom = $user->time_of_half_day_from ? Carbon::parse($user->time_of_half_day_from)->format('h:i A') : '';
                        $halfDayTo = $user->time_of_half_day_to ? Carbon::parse($user->time_of_half_day_to)->format('h:i A') : '';
                    @endphp

                    @if ($clinicOpenTime || $clinicCloseTime)
                        <p class="mb-1">{{ $user->clinic_open_from ?? '' }} - {{ $user->clinic_open_to ?? '' }} <span class="d-block text-muted">{{ $clinicOpenTime }} - {{ $clinicCloseTime }}</span></p>
                    @endif
                    @if ($halfDayFrom || $halfDayTo)
                        <p class="mb-1">{{ $user->half_day ?? '' }} <span class="d-block text-muted">{{ $halfDayFrom }} - {{ $halfDayTo }}</span></p>
                    @endif
                    @if (!empty($user->closed_clinic))
                        <p class="mb-3">{{ $user->closed_clinic }} <span class="d-block text-muted">Closed</span></p>
                    @endif

                    <!-- Social Icons -->
                    <div class="d-flex gap-3 mt-3">
                        @if($user->facebook_link)
                            <a href="{{ $user->facebook_link }}" class="text-dark fs-5"><i class="fa fa-facebook-square"></i></a>
                        @endif
                        @if($user->twitter_link)
                            <a href="{{ $user->twitter_link }}" class="text-dark fs-5"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($user->instagram_link)
                            <a href="{{ $user->instagram_link }}" class="text-dark fs-5"><i class="fa fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="row mt-4 pt-4 border-top align-items-center">
            <div class="col-md-10">
                <p class="mb-0 small text-muted">© {{ date('Y') }} {{ $user->clinic_name ?? '' }}. All rights reserved.</p>
            </div>
            <div class="col-md-2 text-end">
                <a href="#top" class="btn btn-outline-secondary btn-sm rounded-circle">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </div>
    </div>
</footer>


     <!-- SCRIPTS -->
     <script src="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/js/jquery.js"></script>
     <script src="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/js/bootstrap.min.js"></script>
     <script src="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/js/jquery.sticky.js"></script>
     <script src="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/js/jquery.stellar.min.js"></script>
     <script src="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/js/wow.min.js"></script>
     <script src="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/js/smoothscroll.js"></script>
     <script src="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/js/owl.carousel.min.js"></script>
     <script src="{{ url('/') }}/frontend/{{ $user->selected_theme }}/assets/js/custom.js"></script>

<script>
// $(document).ready(function(){

//     $.ajax({
//         url: "{{ route('get.theme.color') }}",
//         type: "GET",
//         success: function(data){
//             if(data.selected_theme === 'theme1'){ 
//             var dataArray = JSON.parse(data.theme_customization);

//             // Background Colors
//             if (dataArray.bg_colors.primary) {
//                 $('body').css('background-color', dataArray.bg_colors.primary);
//                 $('.navbar, header').css('background-color', dataArray.bg_colors.primary);
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
//                         a, .nav-link, h1, h2, h3, h4, h5, h6 {
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