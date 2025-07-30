@extends('frontend.themes.theme1.layouts.app')
@section('content_front')
<style>
  :root {
    --service-section-bg: {{ $setting->section_background_color }};
    --service-section-color: {{ $setting->section_color }};
    --bg-color: {{ $setting->background_color }};
    --icon-color: {{ $setting->color }};
    --color-hover: {{ $setting->hover_color }};
  }
  body {
    background: var(--bg-color);
  }
  #service {
    background: var(--service-section-bg);
  }
  #service h2,
  #service h4 {
    color: var(--service-section-color);
  }

  #service p {
    color: var(--service-section-color);
  }
  header span i {
    color: var(--icon-color);
    margin-right: 5px;
  }
  a:hover, a:active, a:focus {
    color: var(--color-hover);
    outline: none;
  }
   @media only screen and (max-width: 639px) {
    body{
        padding: 0px;
        width: 100%;
    }
    .slider .item{
        height: 300px;
    }
    #about{
        padding: 10px;
    }
    .team-thumb{
        height: 100% !important;
    }
   }
    </style>
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


    <!-- MAKE AN APPOINTMENT -->
    {{-- <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                </div>

                <div class="col-md-6 col-sm-6">
                    <!-- CONTACT FORM HERE -->
                    <form id="appointment-form" role="form" method="post" action="#">

                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Make an appointment</h2>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <div class="col-md-6 col-sm-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Full Name">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Your Email">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="date">Select Date</label>
                                <input type="date" name="date" value="" class="form-control">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="select">Select Department</label>
                                <select class="form-control">
                                    <option>General Health</option>
                                    <option>Cardiology</option>
                                    <option>Dental</option>
                                    <option>Medical Research</option>
                                </select>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="telephone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Phone">
                                <label for="Message">Additional Message</label>
                                <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                                <button type="submit" class="form-control" id="cf-submit" name="submit">Submit
                                    Button</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section> --}}


    <!-- GOOGLE MAP -->
    @if ($pages->has('contact'))
    <section id="{{ strtolower($pages['contact']->page_name??'') }}">
        <!-- How to change your own map point
                        1. Go to Google Maps
                        2. Click on your location point
                        3. Click "Share" and choose "Embed map" tab
                        4. Copy only URL and paste it within the src="" field below
             -->
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
@endsection
