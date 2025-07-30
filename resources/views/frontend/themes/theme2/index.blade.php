@extends('frontend.themes.theme2.layouts.app')
@section('content_front')
    <style>
        .team-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #eee;
            background-color: #fff;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .team-img-wrapper {
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid #eee;
        }

        .team-img {
            transition: transform 0.4s ease;
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .team-card:hover .team-img {
            transform: scale(1.05);
        }

        .team-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .team-card:hover .team-overlay {
            opacity: 1;
        }

        .team-overlay ul {
            padding: 0;
        }

        .team-overlay a:hover {
            background-color: #0d6efd !important;
        }
    </style>

    <main class="main">
        @if ($pages->has('home'))
        <div class="swiper mySwiper" id="{{ strtolower($pages['home']->page_name??'') }}">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="swiper-slide">
                        <section class="slider-section"
                            style="background-image: url('{{ $banner->image ?? '/frontend/assets/img/banner.jpg' }}');">
                            <div class="slider-container">
                                <div class="row slider-one-content">
                                    <div class="col-md-6">
                                        @php
                                            $words = explode(' ', $banner->title ?? '');
                                            $last = array_pop($words);
                                            $title =
                                                implode(' ', $words) . ' <span class="last-word">' . $last . '</span>';
                                        @endphp
                                        <div class="slider-subtitle">{{ $banner->subtitle }}</div>
                                        <h1 class="slider-heading">{!! $title !!}</h1>
                                        <p>{!! $banner->description ?? '' !!}</p>
                                        <div class="slider-buttons mt-4">
                                            @if ($banner->link)
                                                <a href="{{ $banner->link ?? '' }}" class="btn btn-style-two">Learn More</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                @endforeach
            </div>

            <!-- Swiper Navigation Arrows (Optional) -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
        @endif

        <!-- About Section -->
        @if ($pages->has('about'))
        <section id="{{ strtolower($pages['about']->page_name??'') }}" class="about section">

            <div class="container">

                <div class="row gy-4 gx-5">

                    <div class="col-lg-6 position-relative align-self-center" data-aos="fade-up" data-aos-delay="200">

                        @if ($abouts[0]->image)
                            <img src="{{ $abouts[0]->image ?? '' }}" class="img-fluid" alt="">
                        @endif

                        {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a> --}}
                    </div>

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <h3>{{ $abouts[0]->title ?? '' }}</h3>
                        <p>
                            {!! $abouts[0]->description ?? '' !!}
                        </p>
                    </div>

                </div>

            </div>

        </section>
        @endif

        <!-- Services Section -->
        @if ($pages->has('service'))
        <section id="{{ strtolower($pages['service']->page_name??'') }}" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $pages['service']->section_title }}</h2>
            </div>

            <div class="container">

                <div class="row gy-4">

                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item  position-relative">
                                <div class="icon blue-bg-icon">
                                    <img src="{{ $service->image }}" alt="Service Icon">
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>{{ $service->title ?? '' }}</h3>
                                </a>
                                <p>{!! $service->description ?? '' !!}</p>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>

            </div>

        </section><!-- /Services Section -->
        @endif

        <!-- Blog Section -->
        @if ($pages->has('blog'))
        <section class="blogs section" id="{{ strtolower($pages['blog']->page_name??'') }}">
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $pages['blog']->section_title??'' }}</h2>
            </div>
            <div class="container">
                <div class="row g-4">
                    @foreach ($blogs as $blog)
                        <div class="col-md-3">
                            <div class="blog-card">
                                <img src="{{ $blog->image }}" class="blog-img" alt="Lab Test">
                                <div class="blog-content">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="blog-date">{{ date('d-M-Y', strtotime($blog->created_at)) }}</span>
                                        <span class="blog-meta">
                                            <i class="bi bi-person"></i> {{ ucWords($blog->user->name ?? '') }} &nbsp;
                                            {{-- <i class="bi bi-chat"></i> 0 Comments --}}
                                        </span>
                                    </div>
                                    <h5>{{ $blog->title }}</h5>

                                    <p>
                                        {{ \Illuminate\Support\Str::words(strip_tags($blog->description), 15, '...') }}
                                        <a class="text-primary" tabindex="0" role="button" data-bs-toggle="popover"
                                            data-bs-html="true" data-bs-trigger="focus" title="{{ $blog->title }}"
                                            data-bs-content="{!! e($blog->description) !!}">
                                            Show More
                                        </a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Faq Section -->
      
        @if ($pages->has('faq'))
        <section id="{{ strtolower($pages['faq']->page_name??'') }}" class="faq section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $pages['faq']->section_title??'' }}</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                        <div class="faq-container">
                            <div id="faq-list">
                                @foreach ($faqs as $index => $faq)
                                    <div class="faq-item {{ $index === 0 ? 'active' : '' }}">
                                        <h3>{{ $faq->question ?? '' }}</h3>
                                        <div class="faq-content"
                                            style="{{ $index === 0 ? 'display: block;' : 'display: none;' }}">
                                            <p>{{ $faq->description ?? '' }}</p>
                                        </div>
                                        <i class="faq-toggle bi bi-chevron-right"></i>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div><!-- End Faq Column-->

                </div>

            </div>

        </section><!-- /Faq Section -->
        @endif

        @if ($pages->has('department'))
        <section id="{{ strtolower($pages['department']->page_name??'') }}" class="tabs section">

            <!-- Section Title -->
            <section id="tabs" class="tabs section">

                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ $pages['department']->section_title??'' }}</h2>
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
                                                <img src="{{ $department->image ?? '' }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>

            </section>

        </section><!-- /Tabs Section -->
        @endif

        <!-- Testimonials Section -->
        @if ($pages->has('testimonial'))
        <section id="{{ strtolower($pages['testimonial']->page_name??'') }}" class="testimonials section">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                        <h3>{{ $pages['testimonial']->section_title??'' }}</h3>
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

                        <div class="swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="d-flex">
                                                <img src="{{ $testimonial->author_image ?? '' }}"
                                                    class="testimonial-img flex-shrink-0" alt="">
                                                <div>
                                                    <h3>{{ $testimonial->author_name ?? '' }}</h3>
                                                    <h4>{{ $testimonial->designation ?? '' }}</h4>
                                                    <div class="stars">
                                                        @for ($i = 1; $i <= $testimonial->rating; $i++)
                                                            <i class="bi bi-star-fill"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                <span>{!! $testimonial->message ?? '' !!}</span>
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>

                </div>

            </div>

        </section>
        @endif

        @if ($pages->has('doctor'))
        <section class="grey-bg py-5" id="{{ strtolower($pages['doctor']->page_name??'') }}">
            <div class="container">
                <div class="row text-center mb-4">
                    <div class="col-xl-8 col-lg-10 col-md-12 mx-auto">
                        <div class="section-title">
                            <h2 class="title">{{ strtolower($pages['doctor']->section_title??'') }}</h2>
                        </div>
                    </div>
                </div>

                <div class="row gy-4">
                    @foreach ($doctors as $doctor)
                        @php
                            $socialLinks = json_decode($doctor->social_media_links, true) ?? [];
                            $iconMap = [
                                'instagram' => 'instagram',
                                'facebook' => 'facebook-f',
                                'linkedin' => 'linkedin',
                            ];
                        @endphp

                        <div class="col-lg-3 col-md-6">
                            <div class="team-card position-relative overflow-hidden text-center shadow rounded-4 h-100">
                                <div class="team-img-wrapper">
                                    <img src="{{ $doctor->image ?? '' }}" class="img-fluid team-img" alt="Doctor Image">
                                    @if (!empty($socialLinks))
                                        <div class="team-overlay d-flex justify-content-center align-items-center">
                                            <ul class="list-inline mb-0">
                                                @php
                                                    $platforms = [];
                                                @endphp
                                                @foreach ($socialLinks as $platform => $link)
                                                    @php
                                                        $host = parse_url($link, PHP_URL_HOST);

                                                        // Remove common prefixes like www, in, etc.
                                                        $hostParts = explode('.', $host);
                                                        $count = count($hostParts);

                                                        // Logic to extract base domain
                                                        if ($count >= 2) {
                                                            $platform = $hostParts[$count - 2] ?? $hostParts[$count - 1]; 
                                                        } else {
                                                            $platform = $host;
                                                        }

                                                        // Lowercase for uniformity
                                                        $platform = strtolower($platform);

                                                        // Optional: store for later use
                                                        $platforms[] = $platform;

                                                        // Map icon class
                                                        $iconClass = $iconMap[$platform] ?? 'globe';
                                                    @endphp

                                                    @if (!empty($link))
                                                        <li class="list-inline-item mx-1">
                                                            <a href="{{ $link }}" target="_blank"
                                                                class="text-white bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                                                style="width: 36px; height: 36px;">
                                                                <i class="fa-brands fa-{{ $iconClass }}"></i>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>

                                        </div>
                                    @endif
                                </div>

                                <div class="p-3">
                                    <h5 class="mb-0">{{ $doctor->name ?? '' }}</h5>
                                    <span class="text-muted small">Doctor</span>
                                    <p class="mt-2 small text-muted">{!! $doctor->description !!}</p>
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
        <section id="{{ strtolower($pages['gallery']->page_name??'') }}" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ strtolower($pages['gallery']->section_title??'') }}</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-2">
                    @foreach ($galleries as $gallery)
                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="{{ $gallery->photos_upload ?? '' }}" class="glightbox"
                                    data-gallery="images-gallery">
                                    <img src="{{ $gallery->photos_upload ?? '' }}" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>

                        {{-- <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-2.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-3.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-4.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-5.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-6.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-7.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-8.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div> --}}
                    @endforeach
                </div>

            </div>

        </section>
        @endif

        <!-- Video Section -->
        @if ($pages->has('video'))
        <section id="{{ strtolower($pages['video']->page_name??'') }}" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title">
                <h2>{{ $pages['video']->section_title??'' }}</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row g-2">
                    @foreach ($videos as $video)
                        <div class="col-lg-3 col-md-4 mb-4">
                            <div class="video-wrapper position-relative">
                                <a href="{{ asset($video->videos ?? '') }}" target="_blank">
                                    <video class="custom-video" controls>
                                        <source src="{{ asset($video->videos) }}" type="video/mp4">
                                    </video>
                                    <div class="play-button-overlay position-absolute top-50 start-50 translate-middle">
                                        <i class="fas fa-play-circle fa-3x text-white"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>

        </section>
        @endif

        <!-- Contact Section -->
        @if ($pages->has('contact'))
        <section id="{{ strtolower($pages['contact']->page_name??'') }}" class="contact section">

            <!-- Section Title -->
            
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $pages['contact']->section_title??'' }}</h2>
            </div><!-- End Section Title -->

            <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
                <iframe width="100%" height="450" style="border:0" loading="lazy" allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q={{ urlencode($latlong['place']) }}&z=14&output=embed">
                </iframe>


            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Location</h3>
                                <p>{{ $user->address ?? '' }}, {{ $user->city ?? '' }}, {{ $user->state ?? '' }},
                                    {{ $user->country ?? '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>{{ $user->phone ?? '' }}, {{ $user->alternate_phone ?? '' }},
                                    {{ $user->telephone_number ?? '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>{{ $user->email ?? '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8">
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
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="popover"]').popover();
        });

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

        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                const isActive = item.classList.contains('active');

                // Sabhi FAQ band karo
                document.querySelectorAll('.faq-item').forEach(i => {
                    i.classList.remove('active');
                    i.querySelector('.faq-content').style.display = 'none';
                });

                // Agar clicked item already active nahi hai, toh usse open karo
                if (!isActive) {
                    item.classList.add('active');
                    item.querySelector('.faq-content').style.display = 'block';
                }
            });
        });
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endsection
