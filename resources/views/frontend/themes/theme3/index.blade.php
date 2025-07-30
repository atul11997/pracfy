@extends('frontend.themes.theme3.layouts.app')
@section('content_front')
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
                                {{-- <div class="tab-pane" id="tabs-tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Neurology</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                            parde sonata raqer a videna mareta paulona marka</p>
                                        <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et
                                            reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit
                                            ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna
                                            desera vafle de nideran pal</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Hepatology</h3>
                                        <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim
                                            fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis
                                            aut</p>
                                        <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis
                                            quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae
                                            sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et
                                            harum voluptatem optio quae</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Pediatrics</h3>
                                        <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas
                                            iure porro quis delectus</p>
                                        <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam
                                            necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in
                                            consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a
                                            laborum inventore</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Ophthalmologists</h3>
                                        <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.
                                        </p>
                                        <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae
                                            ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet.
                                            Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div> --}}
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

                                    <div class="d-flex gap-2">

                                        @if (!empty($socialLinks))
                                            <a href="{{ $socialLinks[0] ?? '' }}" target="_blank" class="social-icon">
                                                <i class="fa-brands fa-facebook"></i>
                                            </a>
                                            <a href="{{ $socialLinks[1] ?? '' }}" target="_blank" class="social-icon">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                            <a href="{{ $socialLinks[2] ?? '' }}" target="_blank" class="social-icon">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </a>
                                            <a href="{{ $socialLinks[3] ?? '' }}" target="_blank" class="social-icon">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                        @else
                                            <p>No social links</p>
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

@endsection
