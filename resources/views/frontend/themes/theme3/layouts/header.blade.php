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
