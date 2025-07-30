  <header id="header" class="header sticky-top">
      @php
          use App\Models\User;
          $user = User::where('id', Auth::user()->id)->first();
      @endphp
      <div class="topbar d-flex align-items-center">
          <div class="container d-flex justify-content-center justify-content-md-between">
              <div class="contact-info d-flex align-items-center">
                  <i class="bi bi-envelope d-flex align-items-center"><a
                          href="mailto:{{ $user->email ?? '' }}">{{ $user->email ?? '' }}</a></i>
                  <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $user->phone ?? '' }}</span></i>
              </div>
              <div class="social-links d-none d-md-flex align-items-center">
                  <a href="{{ $user->twitter_link ?? '#' }}" class="twitter"><i class="bi bi-twitter-x"></i></a>
                  <a href="{{ $user->facebook_link ?? '#' }}" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $user->instagram_link ?? '#' }}" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="{{ $user->linkdin_link ?? '#' }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
          </div>
      </div><!-- End Top Bar -->

      <div class="branding d-flex align-items-center">

          <div class="container position-relative d-flex align-items-center justify-content-between">
              <a href="{{ url('/user') . '/' . encrypt(Auth::user()->id) }}" class="logo d-flex align-items-center me-auto">
                  <!-- Uncomment the line below if you also wish to use an image logo -->
                  <!-- <img src="assets/img/logo.png" alt=""> -->
                  <h1 class="sitename">{{ $user->clinic_name }}</h1>
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

          </div>

      </div>

  </header>
