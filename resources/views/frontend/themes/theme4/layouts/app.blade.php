<!DOCTYPE html>
<html lang="en">
<head>

<!-- meta tags -->
<meta charset="utf-8">
<meta name="keywords" content="Bootstrap 5, Hospital, Doctor, Medical, Multipurpose, Health, RTL" />
<meta name="description" content="Bootstrap 5 HTML5 Template" />
<meta name="author" content="www.themeht.com" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="b2UZJEkhwjackPbkifBGnBMKgc-FGrezDZn5BoxMx0I" />
<!-- Title -->
<title>{{ $user->clinic_name??'' }}</title>

<!-- favicon icon -->
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- inject css start -->

<!--== bootstrap -->
<link href="{{ url('/') }}/frontend/theme4/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!--== animate -->
<link href="{{ url('/') }}/frontend/theme4/css/animate.css" rel="stylesheet" type="text/css" />

<!--== fontawesome -->
<link href="{{ url('/') }}/frontend/theme4/css/fontawesome-all.css" rel="stylesheet" type="text/css" />

<!--== themify-icons -->
<link href="{{ url('/') }}/frontend/theme4/css/themify-icons.css" rel="stylesheet" type="text/css" />

<!--== magnific-popup -->
<link href="{{ url('/') }}/frontend/theme4/css/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

<!--== owl-carousel -->
<link href="{{ url('/') }}/frontend/theme4/css/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />

<!--== datepicker -->
<link href="{{ url('/') }}/frontend/theme4/css/date-picker/date-picker.css" rel="stylesheet" type="text/css" />

<!--== spacing -->
<link href="{{ url('/') }}/frontend/theme4/css/spacing.css" rel="stylesheet" type="text/css" />

<!--== base -->
<link href="{{ url('/') }}/frontend/theme4/css/base.css" rel="stylesheet" type="text/css" />

<!--== shortcodes -->
<link href="{{ url('/') }}/frontend/theme4/css/shortcodes.css" rel="stylesheet" type="text/css" />

<!--== default-theme -->
<link href="{{ url('/') }}/frontend/theme4/css/style.css" rel="stylesheet" type="text/css" />

<!--== responsive -->
<link href="{{ url('/') }}/frontend/theme4/css/responsive.css" rel="stylesheet" type="text/css" />

<!--== color-customizer -->
<link href="#" data-style="styles" rel="stylesheet" defer>
<link href="{{ url('/') }}/frontend/theme4/css/color-customize/color-customizer.css" rel="stylesheet" type="text/css" />

<!-- inject css end -->
<style>
.icon-box {
  width: 80px;
  height: 80px;
  background-color: #f5f5f5;
  border-radius: 50%;
  padding: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 0 8px rgba(0,0,0,0.08);
  transition: transform 0.3s ease;
}
.icon-box:hover {
  transform: scale(1.1);
}

.icon-img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

.hover-shadow:hover {
  box-shadow: 0 0 15px rgba(0,0,0,0.2) !important;
}

.transition {
  transition: all 0.3s ease;
}


</style>
</head>

<body>

<!-- page wrapper start -->

<div class="page-wrapper">

<!-- preloader start -->

<div id="ht-preloader">
  <div class="loader clear-loader"><img src="{{url('/')}}/frontend/theme4/images/loader.gif" alt=""></div>
</div>

<!-- preloader end -->


<!--header start-->

@include('frontend.themes.theme4.layouts.header')

<!--header end-->

@yield('content_front')
<!--hero section start-->


@include('frontend.themes.theme4.layouts.footer')

</div>
<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-stethoscope"></i></a></div>

<!--back-to-top end-->


<!-- inject js start -->

<!--== theme -->
<script src="{{ url('/') }}/frontend/theme4/js/theme.js" defer></script>


<!--== magnific-popup -->
<script src="{{ url('/') }}/frontend/theme4/js/magnific-popup/jquery.magnific-popup.min.js" defer></script>

<!--== owl-carousel -->
<script src="{{ url('/') }}/frontend/theme4/js/owl-carousel/owl.carousel.min.js" defer></script>

<!--== jarallax -->
<script src="{{ url('/') }}/frontend/theme4/js/jarallax/jarallax.min.js" defer></script>

<!--== counter -->
<script src="{{ url('/') }}/frontend/theme4/js/counter/counter.js" defer></script>

<!--== skill -->
<script src="{{ url('/') }}/frontend/theme4/js/skill/circle-progressbar.js" defer></script>

<!--== countdown -->
<script src="{{ url('/') }}/frontend/theme4/js/countdown/jquery.countdown.min.js" defer></script>

<!--== isotope -->
<script src="{{ url('/') }}/frontend/theme4/js/isotope/isotope.pkgd.min.js" defer></script>

<!--== contact-form -->
<script src="{{ url('/') }}/frontend/theme4/js/contact-form/contact-form.js" defer></script>

<!--== datepicker -->
<script src="{{ url('/') }}/frontend/theme4/js/date-picker/date-picker.js" defer></script>

<!--== color-customize -->
<script src="{{ url('/') }}/frontend/theme4/js/color-customize/color-customizer.js" defer></script>

<!--== wow -->
<script src="{{ url('/') }}/frontend/theme4/js/wow.min.js" defer></script>

<!--== theme-script -->
<script src="{{ url('/') }}/frontend/theme4/js/theme-script.js" defer></script>

<!-- inject js end -->
  <script>
$(document).ready(function(){
    $.ajax({
        url: "{{ route('get.theme.color') }}",
        type: "GET",
        success: function(data){
          if(data.selected_theme === 'theme4'){ 
            var dataArray = JSON.parse(data.theme_customization);
            // Background Colors
            if (dataArray.bg_colors.primary) {
                $('.page-wrapper').css('background-color', dataArray.bg_colors.primary);
                $('.header-branding').css('background-color', dataArray.bg_colors.primary);
                $('.grey-bg').css('background-color', dataArray.bg_colors.primary);
                $('.top-bar').css('background-color', dataArray.bg_colors.primary);
            }

            if (dataArray.colors.primary) {
                $('.page-wrapper').css('color', dataArray.colors.primary);
                $('.header-branding').css('color', dataArray.colors.primary);
                $('.grey-bg').css('color', dataArray.colors.primary);
                $('.top-bar').css('color', dataArray.colors.primary);
            }
            if (dataArray.bg_colors.secondary) {
                $('.top-bar').css('background-color', dataArray.bg_colors.secondary);
            }
            if (dataArray.colors.secondary) {
                $('.top-bar').css('color', dataArray.colors.secondary);
                $('ul li a ').css('color', dataArray.colors.secondary)
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
                        a, a:hover, .nav-link, h1, h2, h3, h4, h5, h6 {
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
                      a, a:hover, .nav-link, h1, h2, h3, h4, h5, h6 {
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
                $('.page-wrapper').css('font-family', dataArray.typography.font_family);
            }

          }
        },
        error: function(xhr) {
            console.error("Theme color fetch failed", xhr);
        }
    });
});
</script>
</body>

</html>
