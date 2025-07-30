@extends('frontend.themes.theme4.layouts.app')
@section('content_front')

    @if($pages->has('home'))
      <section class="fullscreen-banner p-0 overflow-hidden" id="{{ strtolower($pages['home']->page_name??'') }}">
          <div class="banner-slider owl-carousel no-pb">
              @foreach ($banners as $banner)
                  <div class="item" data-bg-img="{{ $banner->image ?? '' }}"
                      style="background-image: url('{{ $banner->image ?? '' }}')">
                      <div class="align-center pt-0">
                          <div class="container">
                              <div class="row">
                                  <div class="col-lg-8 col-md-12 me-auto">
                                      <h5 class="text-white letter-space-1 mb-3 animated6">{{ $banner->subtitle ?? '' }}</h5>
                                      <h1 class="text-black mb-3 animated8">{{ $banner->title ?? '' }}</h1>
                                      <p class="lead text-black mb-3 animated5">{!! $banner->description ?? '' !!}</p> <a
                                          class="btn btn-theme btn-radius animated7" href="about-us.html">Learn More</a>
                                      {{-- <a class="btn btn-theme btn-circle animated6">Get Started</a> --}}
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </section>
    @endif

    <!--hero section end-->


    <!--body content start-->

    <div class="page-content">
       @if($pages->has('about'))
        <section class="py-5 my-5" id="{{ strtolower($pages['about']->page_name??'') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <img class="img-fluid" src="{{ $abouts[0]->image ?? '' }}" alt="">
                    </div>
                    <div class="col-lg-7 col-md-12 mt-5 mt-lg-0">
                        <div class="section-title mb-2">
                            <h6>{{ $abouts[0]->title ?? '' }}</h6>
                        </div>
                        <p class="text-black mb-3 lead font-w-5"> {{ $abouts[0]->subtitle ?? '' }}</p>
                        <p class="line-h-3 mb-4">{!! $abouts[0]->description ?? '' !!}</p>
                    </div>
                </div>
        </section>
        @endif
        <!--about us end-->

        @if($pages->has('service'))
        <section class="py-5" id="{{ strtolower($pages['service']->page_name??'') }}">
            <div class="container">
                <div class="row g-4">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <div class="card text-center h-100 border-0 shadow-sm hover-shadow transition rounded-4 p-4">
                                <div class="mx-auto icon-box mb-3">
                                    <img src="{{ $service->image }}" alt="service icon" class="img-fluid icon-img">
                                </div>
                                <div class="card-body px-0">
                                    <h5 class="card-title text-uppercase fw-bold mb-2">{{ $service->title ?? '' }}</h5>
                                    <p class="card-text small">{!! $service->description ?? '' !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif


        <!--service start-->
        @if($pages->has('department'))
        <section class="text-center py-5" id="{{ strtolower($pages['department']->page_name??'') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel dark-service" data-items="3" data-md-items="2" data-sm-items="1"
                            data-xs-items="1" data-margin="30" data-autoplay="true">
                            @foreach ($departments as $department)
                                <div class="item">
                                    <div class="service-item">
                                        <div class="service-images">
                                            <img class="img-fluid" src="{{ $department->image ?? '' }}" alt="">
                                            <div class="service-icon"> <i class="flaticon-doctor"></i>
                                            </div>
                                        </div>
                                        <h4>{{ $department->name ?? '' }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!--service end-->


        <!--counter start-->
        @if($pages->has('faq'))
        <section class="pt-5" id="{{ strtolower($pages['faq']->page_name??'') }}">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xl-8 col-lg-10 col-md-12 mx-auto">
                        <div class="section-title">
                            <h2 class="title">{{ $pages['faq']->section_title??'' }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="accordion" id="accordion">
                            @foreach ($faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                            aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question ?? '' }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordion">
                                        <div class="accordion-body">
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
        @endif
        <!--counter end-->


        <!--testimonial start-->
        @if($pages->has('testimonial'))
        <section class="grey-bg" id="{{ strtolower($pages['testimonial']->page_name??'') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 mx-auto">
                        <div class="owl-carousel no-pb slide-arrow-2" data-items="1" data-dots="false" data-nav="true"
                            data-autoplay="true">
                            @foreach ($testimonials as $testimonial)
                                <div class="item">
                                    <div class="testimonial">
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <div class="testimonial-avatar box-shadow">
                                                    <div class="testimonial-img">
                                                        <img class="img-fluid w-100 radius"
                                                            src="{{ $testimonial->author_image ?? '' }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="testimonial-content"> <span><i
                                                            class="fas fa-quote-left"></i></span>
                                                    <p>{!! $testimonial->message ?? '' !!}</p>
                                                    <div class="testimonial-caption">
                                                        <h6>{{ $testimonial->author_name ?? '' }}</h6>
                                                        <label>- {{ $testimonial->designation ?? '' }}</label>
                                                    </div>
                                                </div>
                                            </div>
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

        <!--testimonial end-->


        <!--gallery start-->
        @if($pages->has('gallery'))
        <section class="overflow-hidden" id="{{ strtolower($pages['gallery']->page_name??'') }}">
            <div class="container">
                <div class="row align-items-end text-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title">
                            <h2 class="title">{{ $pages['gallery']->section_title??'' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="grid row columns-4 g-3 popup-gallery text-center">
                            @foreach ($galleries as $gallery)
                                <div class="grid-item">
                                    <div class="gallery-item">
                                        <img class="img-fluid" src="{{ $gallery->photos_upload ?? '' }}" alt=""
                                            style="width: 100%; height: 250px; object-fit:cover;">
                                        <div class="gallery-hover">
                                            <div class="gallery-icon">
                                                <a class="popup popup-img" href="{{ $gallery->photos_upload ?? '' }}"> <i
                                                        class="flaticon-eye"></i>
                                                </a>
                                            </div>
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
        <!--gallery end-->


        <!--team start-->
        @if($pages->has('doctor'))
        <section class="grey-bg" id="{{ strtolower($pages['doctor']->page_name??'') }}">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xl-8 col-lg-10 col-md-12 mx-auto">
                        <div class="section-title">
                            <h2 class="title">{{ $pages['doctor']->section_title??'' }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($doctors as $doctor)
                        @php
                            $socialLinks = json_decode($doctor->social_media_links, true);
                            $icons = ['facebook-f', 'instagram', 'twitter', 'linkedin-in'];
                        @endphp
                        <div class="col-lg-4 col-md-12">
                            <div class="team-member text-center">
                                <div class="team-images">
                                    <img class="img-fluid" src="{{ $doctor->image ?? '' }}" alt="">
                                    <div class="team-about">
                                        <p>{!! $doctor->description ?? '' !!}</p>
                                        <div class="team-social-icon">
                                            <ul>

                                                @if (!empty($socialLinks))
                                                    @foreach ($socialLinks as $index => $link)
                                                        <li>
                                                            <a href="{{ $link }}" target="_blank">
                                                                <i class="fab fa-{{ $icons[$index] ?? 'globe' }}"></i>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-description"> <span>Doctor</span>
                                    <h5>{{ $doctor->name ?? '' }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!--team end-->


        <!--blog start-->
        @php
            use Illuminate\Support\Str;
        @endphp
        @if($pages->has('blog'))
        <section id="{{ strtolower($pages['blog']->page_name??'') }}">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xl-8 col-lg-10 col-md-12 mx-auto">
                        <div class="section-title">
                            <h2 class="title">{{ $pages['blog']->section_title??'' }}</h2>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-7">
                        @foreach ($blogs->sortByDesc('created_at')->values() as $index => $blog)
                            @if ($index < 2)
                                <div class="post {{ $index === 0 ? '' : 'mt-4' }}">
                                    <div class="row g-0">
                                        <div class="col-md-6">
                                            <div class="post-image h-100">
                                                <img class="img-fluid h-100 w-100" src="{{ $blog->image ?? '' }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 align-item-middle white-bg">
                                            <div>
                                                <div class="post-desc">
                                                    <div class="post-meta">
                                                        <ul class="list-inline">
                                                            <li>{{ date('d', strtotime($blog->created_at ?? '')) }}
                                                                {{ date('F', strtotime($blog->created_at ?? '')) }},
                                                                {{ date('Y', strtotime($blog->created_at ?? '')) }}</li>
                                                            {{-- <li>Comment</li> --}}
                                                        </ul>
                                                    </div>
                                                    <div class="post-title">
                                                        <h5><a
                                                                href="blog-details-right-sidebar.html">{{ $blog->title ?? '' }}</a>
                                                        </h5>
                                                    </div>
                                                    <p>
                                                        {{ \Illuminate\Support\Str::words(strip_tags($blog->description), 15, '...') }}
                                                        <a class="text-primary" tabindex="0" role="button"
                                                            data-bs-toggle="popover" data-bs-html="true"
                                                            data-bs-trigger="focus" title="{{ $blog->title }}"
                                                            data-bs-content="{!! e($blog->description) !!}">
                                                            Show More
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="col-lg-5 mt-3 mt-lg-0">
                        <div class="owl-carousel no-pb dark-post" data-dots="false" data-items="1" data-autoplay="true">
                            @foreach ($blogs->sortByDesc('created_at')->values() as $index => $blog)
                                <div class="item">
                                    <div class="post">
                                        <div class="post-image">
                                            <img class="img-fluid w-100 h-100" src="{{ $blog->image ?? '' }}"
                                                alt="">
                                        </div>
                                        <div class="post-desc">
                                            <div class="post-meta">
                                                <ul class="list-inline">
                                                    <li>{{ date('d', strtotime($blog->created_at ?? '')) }}
                                                        {{ date('F', strtotime($blog->created_at ?? '')) }},
                                                        {{ date('Y', strtotime($blog->created_at ?? '')) }}</li>
                                                    {{-- <li>Comment</li> --}}
                                                </ul>
                                            </div>
                                            <div class="post-title">
                                                <h5><a href="blog-details-right-sidebar.html">{{ $blog->title ?? '' }}</a>
                                                </h5>
                                            </div>
                                            <p>
                                                {{ \Illuminate\Support\Str::words(strip_tags($blog->description), 15, '...') }}
                                                <a class="text-primary" tabindex="0" role="button"
                                                    data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="focus"
                                                    title="{{ $blog->title }}"
                                                    data-bs-content="{{ strip_tags($blog->description) }}">
                                                    Show More
                                                </a>
                                            </p>
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

        <!--blog end-->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('[data-bs-toggle="popover"]').popover();
            });
        </script>
    @endsection
