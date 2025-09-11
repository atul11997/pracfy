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

  <header id="header" class="header sticky-top">
@php
  use App\Models\User;
  $user = User::where('id', Auth::user()->id)->first();
@endphp
@php
    use Carbon\Carbon;

    $clinicOpenTime = $user->clinic_open_time ? Carbon::parse($user->clinic_open_time)->format('h A') : '';
    $clinicCloseTime = $user->clinic_close_time ? Carbon::parse($user->clinic_close_time)->format('h A') : '';
@endphp  
    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="d-none d-md-flex align-items-center">
          <i class="bi bi-clock me-1"></i> {{ $user->clinic_open_from??'' }} - {{ $user->clinic_open_to??'' }}, {{ $clinicOpenTime }} to {{ $clinicCloseTime }}
        </div>
        <div class="d-flex align-items-center">
          <i class="bi bi-phone me-1"></i> Call us now {{ $user->phone??'' }}
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-end">
        <a href="#" class="logo d-flex align-items-center me-auto">
          <img src="{{ $user->clinic_logo??'' }}" alt="">
          <!-- Uncomment the line below if you also wish to use a text logo -->
          <!-- <h1 class="sitename">Medicio</h1>  -->
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
                      @foreach ($pages as $index=>$page)
                          <li><a href="#{{ strtolower($page->page_name ?? '') }}"
                                  class="{{ $index === 0 ? 'active' : '';  }}">{{ $page->page_name ?? '' }}</a></li>
                      @endforeach
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        {{-- <a class="cta-btn" href="index-2.html#appointment">Make an Appointment</a> --}}

      </div>

    </div>

  </header>



    <main class="main">

        <!-- Hero Section -->
    
        @if ($pages->has('home'))
            <section id="{{ strtolower($pages['home']->page_name ?? '') }}" class="hero section">

                <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                    @foreach ($banners as $banner)
                        <div class="carousel-item active">
                            <img src="{{ $banner->image ?? '' }}" alt="">
                            <div class="container">
                                <h2>{{ $banner->title ?? '' }}</h2>
                                <p>{!! $banner->description ?? '' !!}</p>
                                @if ($banner->link)
                                    <a href="#about" class="btn-get-started">Read More</a>
                                @endif
                            </div>
                        </div><!-- End Carousel Item -->
                    @endforeach

                    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                    </a>

                    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                    </a>

                    <ol class="carousel-indicators"></ol>

                </div>

            </section><!-- /Hero Section -->
        @endif

        <!-- About Section -->
        @if ($pages->has('about'))
            <section id="{{ strtolower($pages['about']->page_name ?? '') }}" class="about section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ $abouts[0]->title ?? '' }}</h2>
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="row gy-4">
                        <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ $abouts[0]->image ?? '' }}" class="img-fluid" alt="">
                            {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a> --}}
                        </div>
                        <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                            <p>{!! $abouts[0]->description ?? '' !!}</p>
                        </div>
                    </div>

                </div>

            </section><!-- /About Section -->
        @endif

        <!-- Services Section -->
@if ($pages->has('service'))
<section id="{{ strtolower($pages['service']->page_name ?? '') }}" class="services py-5">

    <!-- Section Title -->
    <div class="container mb-5 text-center" data-aos="fade-up">
        <h2 class="fw-bold">{{ $pages['service']->section_title ?? '' }}</h2>
        <p class="text-muted">Explore what we offer</p>
    </div>

    <div class="container">
        <div class="row g-4">
            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card service-card h-100 border-0 shadow-sm position-relative overflow-hidden">
                    <div class="service-image-wrapper">
                        <img src="{{ $service->image ?? '' }}" class="card-img-top img-fluid" alt="Service Image">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-semibold text-primary">{{ $service->title ?? '' }}</h5>
                        <p class="card-text">{!! $service->description ?? '' !!}</p>
                    </div>
                    <div class="service-hover-overlay d-flex align-items-center justify-content-center">
                        <span class="text-white fw-bold">Learn More</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
@endif

        <!-- Tabs Section -->
        @if ($pages->has('department'))
            <section id="{{ strtolower($pages['department']->page_name ?? '') }}" class="tabs section">


                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ $pages['department']->section_title ?? '' }}</h2>
                </div>

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav nav-tabs flex-column">
                                @foreach ($departments as $index => $department)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $index === 0 ? 'active show' : '' }} " data-bs-toggle="tab"
                                            href="#tabs-tab-{{ $index + 1 }}">{{ $department->name ?? '' }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-9 mt-4 mt-lg-0">
                            <div class="tab-content">
                                @foreach ($departments as $index => $department)
                                    <div class="tab-pane {{ $index === 0 ? 'active show' : '' }}"
                                        id="tabs-tab-{{ $index + 1 }}">
                                        <div class="row">
                                            <div class="col-lg-8 details order-2 order-lg-1">
                                                <h3>{{ $department->name ?? '' }}</h3>
                                                <p class="fst-italic">{!! $department->description ?? '' !!}</p>
                                            </div>
                                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                                <img src="{{ $department->image ?? '' }}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>

                </div>

            </section>
        @endif

        <!-- Testimonials Section -->
        @if ($pages->has('testimonial'))
            <section id="{{ strtolower($pages['testimonial']->page_name ?? '') }}" class="testimonials section">
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ $pages['testimonial']->section_title ?? '' }}</h2>
                </div>

                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper init-swiper" data-speed="600" data-delay="5000"
                        data-breakpoints='{"320": {"slidesPerView": 1, "spaceBetween": 40}, "1200": {"slidesPerView": 3, "spaceBetween": 40}}'>

                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>{!! $testimonial->message ?? '' !!}</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <img src="{{ $testimonial->author_image ?? asset('assets/img/testimonials/default.jpg') }}"
                                            class="testimonial-img" alt="{{ $testimonial->author_name ?? '' }}">
                                        <h3>{{ $testimonial->author_name ?? '' }}</h3>
                                        <h4>{{ $testimonial->designation ?? 'Customer' }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        @endif

        <!-- Doctors Section -->
        @if ($pages->has('doctors'))
        <section id="{{ strtolower($pages['doctors']->page_name ?? '') }}" class="doctors section light-background">
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $pages['doctors']->section_title ?? '' }}</h2>
            </div>

            <div class="container">
                <div class="row gy-4">
                    @foreach ($doctors as $doctor)
                        @php
                            $socialLinks = json_decode($doctor->social_media_links, true);
                        @endphp


                        <div class="col-md-6 col-lg-6">
                            <div
                                class="doctor-card shadow-sm p-4 bg-white rounded d-flex gap-3 align-items-start hover-shadow transition">
                                <img src="{{ $doctor->image ?? '' }}" alt="{{ $doctor->name }}"
                                    class="doc-img rounded-circle">

                                <div>
                                    <h5 class="fw-bold text-dark">{{ $doctor->name ?? '' }}</h5>
                                    <p class="text-primary mb-1 fw-semibold">{{ $doctor->department->name ?? '' }}</p>
                                    <p class="text-muted mb-2" style="font-size: 14px;">
                                        {{ \Illuminate\Support\Str::words(strip_tags($doctor->description), 15, '...') }}
                                    </p>

                                    <div class="d-flex gap-1">
                                @php
                                    $socialLinks = json_decode($doctor->social_media_links, true);
                                @endphp

                                @if($socialLinks)
                                    @foreach($socialLinks as $platform => $link)
                                        @if($link) {{-- show only if link is not empty --}}
                                            <a href="{{ $link }}" target="_blank">
                                                <i class="fa-brands fa-{{ $platform }}" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif


        <!-- Gallery Section -->
        @if ($pages->has('gallery'))
        <section id="{{ strtolower($pages['gallery']->page_name ?? '') }}" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $pages['gallery']->section_title ?? '' }}</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "slidesPerView": 5,
                            "autoplay": {
                                "delay": 5000
                            },
                            "centeredSlides": false,
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 10
                                },
                                "768": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 15
                                },
                                "1200": {
                                    "slidesPerView": 5,
                                    "spaceBetween": 20
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($galleries as $gallery)
                            <div class="swiper-slide">
                                <a class="glightbox" data-gallery="images-gallery"
                                    href="{{ $gallery->photos_upload ?? '' }}">
                                    <img src="{{ $gallery->photos_upload ?? '' }}" class="gallery-slide-image"
                                        alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
        @endif

        <!-- Faq Section -->
        @if ($pages->has('faq'))
        <section id="{{ strtolower($pages['faq']->page_name ?? '') }}" class="faq section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $pages['faq']->section_title ?? '' }}</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                        <div class="faq-container">
                            @foreach ($faqs as $faq)
                                <div class="faq-item">
                                    <h3>{{ $faq->question ?? '' }}</h3>
                                    <div class="faq-content">
                                        <p>{{ $faq->description ?? '' }}</p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div><!-- End Faq item-->
                            @endforeach

                        </div>

                    </div><!-- End Faq Column-->

                </div>

            </div>

        </section><!-- /Faq Section -->
        @endif

        <!-- Contact Section -->
        @if ($pages->has('contact'))
        <section id="{{ strtolower($pages['contact']->page_name ?? '') }}" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ strtolower($pages['contact']->section_title ?? '') }}</h2>

            </div><!-- End Section Title -->
            <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
                <iframe width="100%" height="450" style="border:0" loading="lazy" allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q={{ urlencode($latlong['place']) }}&z=14&output=embed">
                </iframe>


            </div><!-- End Google Maps -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-6 ">
                        <div class="row gy-4">

                            <div class="col-lg-12">
                                <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>{{ $user->address ?? '' }}, {{ $user->city ?? '' }}, {{ $user->state ?? '' }},
                                        {{ $user->country ?? '' }}, {{ $user->pincode ?? '' }}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                    data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>{{ $user->phone ?? '' }}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                    data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>{{ $user->email ?? '' }}</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div id="message"></div>
                        <form action="#" class="php-email-form" id="contactform">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->
        @endif

    </main>

{{-- Footer --}}
 <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="#" class="logo d-flex align-items-center">
            <span class="sitename">{{ $user->clinic_name??'' }}</span>
          </a>
          <div class="footer-contact pt-0">
            <p>{{ $user->address??'' }}</p>
            <p>{{ $user->city??'' }}, {{ $user->state??'' }}, {{ $user->country??'' }}, {{ $user->pincode??'' }}</p>
            <p class="mt-3"><strong>Phone:</strong> <span>{{ $user->phone??'' }}</span></p>
            <p><strong>Email:</strong> <span>{{ $user->email??'' }}</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="{{ $user->twitter_link??'' }}"><i class="bi bi-twitter-x"></i></a>
            <a href="{{ $user->facebook_link??'' }}"><i class="bi bi-facebook"></i></a>
            <a href="{{ $user->instagram_link??'' }}"><i class="bi bi-instagram"></i></a>
            <a href="{{ $user->linkdin_link??'' }}"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            @if($pages->has('home'))
            <li><a href="#{{ strtolower($pages['home']->page_name??'') }}">{{ $pages['home']->page_name??'' }}</a></li>
            @endif
            @if($pages->has('about'))
            <li><a href="#{{ strtolower($pages['about']->page_name??'') }}">{{ $pages['about']->page_name??'' }}</a></li>
            @endif
            @if($pages->has('service'))
            <li><a href="#{{ strtolower($pages['service']->page_name??'') }}">Services</a></li>
            @endif
            @if($pages->has('contact'))
            <li><a href="#{{ strtolower($pages['contact']->page_name??'') }}">{{ $pages['contact']->page_name??'' }}</a></li>
            @endif
          </ul>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Quick Links</h4>
          <ul>
            @if($pages->has('testimonial'))
            <li><a href="#{{ strtolower($pages['testimonial']->page_name??'') }}">{{ $pages['testimonial']->page_name??'' }}</a></li>
            @endif
            @if($pages->has('faq'))
            <li><a href="#{{ strtolower($pages['faq']->page_name??'') }}">{{ $pages['faq']->page_name??'' }}</a></li>
            @endif
            @if($pages->has('gallery'))
            <li><a href="#{{ strtolower($pages['gallery']->page_name??'') }}">{{ $pages['gallery']->page_name??'' }}</a></li>
            @endif
          </ul>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a>Web Design</a></li>
            <li><a>Web Development</a></li>
            <li><a>Product Management</a></li>
            <li><a>Marketing</a></li>
            <li><a>Graphic Design</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $user->clinic_name??'' }}</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
       
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/aos/aos.js"></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ url('/') }}/frontend/theme3/assets/js/main.js"></script>

  <script>
// $(document).ready(function(){
//     $.ajax({
//         url: "{{ route('get.theme.color') }}",
//         type: "GET",
//         success: function(data){
//           if(data.selected_theme === 'theme3'){ 
//             var dataArray = JSON.parse(data.theme_customization);
//             // Background Colors
//             if (dataArray.bg_colors.primary) {
//                 $('.index-page3').css('background-color', dataArray.bg_colors.primary);
//                 $('.branding').css('background-color', dataArray.bg_colors.primary);
//                 $('.main').css('background-color', dataArray.bg_colors.primary);
//                 $('.light-background').css('background-color', dataArray.bg_colors.primary);
//                 $('.topbar').css('background-color', dataArray.bg_colors.primary);
//             }

//             if (dataArray.colors.primary) {
//                 $('.index-page3').css('color', dataArray.colors.primary);
//                 $('.branding').css('color', dataArray.colors.primary);
//                 $('.main').css('color', dataArray.colors.primary);
//                 $('.light-background').css('color', dataArray.colors.primary);
//                 $('.topbar').css('color', dataArray.colors.primary);
//             }
//             if (dataArray.bg_colors.secondary) {
//                 $('.topbar').css('background-color', dataArray.bg_colors.secondary);
//             }
//             if (dataArray.colors.secondary) {
//                 $('.topbar').css('color', dataArray.colors.secondary);
//             }

//             // Button & Element Colors
//             if (dataArray.colors.primary) {
//                 let primaryColor = dataArray.colors.primary;
//                  let secondaryColor = dataArray.colors.secondary;
//                 $('<style>')
//                     .prop('type', 'text/css')
//                     .html(`
//                         .btn-primary {
//                             background-color: ${primaryColor} ?? ${secondaryColor} !important;
//                             border-color: ${primaryColor} ?? ${secondaryColor} !important;
//                         }
//                         a, .nav-link, h1, h2, h3, h4, h5, h6 {
//                             color: ${primaryColor} ?? ${secondaryColor} !important;
//                         }
//                         .bg-primary {
//                             background-color: ${primaryColor} ?? ${secondaryColor} !important;
//                         }
//                     `)
//                     .appendTo('head');

//                     $('<style>')
//                     .prop('type', 'text/css')
//                     .html(`
//                       .btn-primary {
//                           background-color: ${primaryColor} ?? ${secondaryColor} !important;
//                           border-color: ${primaryColor} ?? ${secondaryColor} !important;
//                       }
//                       a, .nav-link, h1, h2, h3, h4, h5, h6 {
//                             color: ${primaryColor} ?? ${secondaryColor} !important;
//                         }
//                         .bg-primary {
//                             background-color: ${primaryColor} ?? ${secondaryColor} !important;
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
//                 $('.index-page3').css('font-family', dataArray.typography.font_family);
//             }

//           }
//         },
//         error: function(xhr) {
//             console.error("Theme color fetch failed", xhr);
//         }
//     });
// });
</script>

     <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#contactform').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                let form = $(this)[0]; // Get raw DOM element
                let formData = new FormData(form); // Create FormData from the form

                $.ajax({
                    url: "{{ route('add.enquiry') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#message').html(
                                `<li class="alert alert-success">${response.message}</li>`);
                            $('#contactform')[0].reset(); // optional: reset form after success
                        } else {
                            $('#message').html(
                                `<li class="alert alert-danger">${response.message}</li>`);
                        }
                    },
                    error: function(xhr) {
                        let message = xhr.responseJSON?.message || "An error occurred";
                        $('#message').html(
                            `<li class="alert alert-danger">${response.message}</li>`);

                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.init-swiper', {
                loop: true,
                speed: 600,
                autoplay: {
                    delay: 5000,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 40,
                    },
                    1200: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    }
                }
            });
        });
    </script>
</body>


</html>