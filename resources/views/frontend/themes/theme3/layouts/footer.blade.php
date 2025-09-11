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
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/php-email-form/validate.js" defer></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/aos/aos.js" defer></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/glightbox/js/glightbox.min.js" defer></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/purecounter/purecounter_vanilla.js" defer></script>
  <script src="{{ url('/') }}/frontend/theme3/assets/vendor/swiper/swiper-bundle.min.js" defer></script>

  <!-- Main JS File -->
  <script src="{{ url('/') }}/frontend/theme3/assets/js/main.js" defer></script>
   @push('scripts')
  <script>
$(document).ready(function(){
    $.ajax({
        url: "{{ route('get.theme.color') }}",
        type: "GET",
        success: function(data){
          if(data.selected_theme === 'theme3'){ 
            var dataArray = JSON.parse(data.theme_customization);
            // Background Colors
            if (dataArray.bg_colors.primary) {
                $('.index-page3').css('background-color', dataArray.bg_colors.primary);
                $('.branding').css('background-color', dataArray.bg_colors.primary);
                $('.main').css('background-color', dataArray.bg_colors.primary);
                $('.light-background').css('background-color', dataArray.bg_colors.primary);
                $('.topbar').css('background-color', dataArray.bg_colors.primary);
            }

            if (dataArray.colors.primary) {
                $('.index-page3').css('color', dataArray.colors.primary);
                $('.branding').css('color', dataArray.colors.primary);
                $('.main').css('color', dataArray.colors.primary);
                $('.light-background').css('color', dataArray.colors.primary);
                $('.topbar').css('color', dataArray.colors.primary);
            }
            if (dataArray.bg_colors.secondary) {
                $('.topbar').css('background-color', dataArray.bg_colors.secondary);
            }
            if (dataArray.colors.secondary) {
                $('.topbar').css('color', dataArray.colors.secondary);
            }

            // Button & Element Colors
            if (dataArray.colors.primary) {
                let primaryColor = dataArray.colors.primary;
                 let secondaryColor = dataArray.colors.secondary;
                $('<style>')
                    .prop('type', 'text/css')
                    .html(`
                        .btn-primary {
                            background-color: ${primaryColor} ?? ${secondaryColor} !important;
                            border-color: ${primaryColor} ?? ${secondaryColor} !important;
                        }
                        a, .nav-link, h1, h2, h3, h4, h5, h6 {
                            color: ${primaryColor} ?? ${secondaryColor} !important;
                        }
                        .bg-primary {
                            background-color: ${primaryColor} ?? ${secondaryColor} !important;
                        }
                    `)
                    .appendTo('head');

                    $('<style>')
                    .prop('type', 'text/css')
                    .html(`
                      .btn-primary {
                          background-color: ${primaryColor} ?? ${secondaryColor} !important;
                          border-color: ${primaryColor} ?? ${secondaryColor} !important;
                      }
                      a, .nav-link, h1, h2, h3, h4, h5, h6 {
                            color: ${primaryColor} ?? ${secondaryColor} !important;
                        }
                        .bg-primary {
                            background-color: ${primaryColor} ?? ${secondaryColor} !important;
                        }
                    `)
                    .appendTo('head'); 
            }

            if (dataArray.colors.secondary) {
                let secondaryColor = dataArray.colors.secondary;
                $('<style>')
                    .prop('type', 'text/css')
                    .html(`
                        .btn-secondary {
                            background-color: ${secondaryColor} !important;
                            border-color: ${secondaryColor} !important;
                        }
                        .bg-secondary {
                            background-color: ${secondaryColor} !important;
                        }
                    `)
                    .appendTo('head');
            }

            // Typography
            if (dataArray.typography.font_family) {
                $('.index-page3').css('font-family', dataArray.typography.font_family);
            }

          }
        },
        error: function(xhr) {
            console.error("Theme color fetch failed", xhr);
        }
    });
});
</script>
  @endpush