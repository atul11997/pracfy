@php
  use App\Models\User;
  use Carbon\Carbon;
  $user = User::where('id', Auth::user()->id)->first();

    $clinicOpenTime = $user->clinic_open_time ? Carbon::parse($user->clinic_open_time)->format('h A') : '';
    $clinicCloseTime = $user->clinic_close_time ? Carbon::parse($user->clinic_close_time)->format('h A') : '';
@endphp
<style>
      .nav-link.active {
    color: rgb(24, 178, 66) !important;
  }
</style>
<header id="site-header" class="header">
  <div class="top-bar d-md-block d-none">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 col-md-12">
          <div class="topbar-link">
            <ul class="list-inline">
              <li class="list-inline-item"><a href="mailto:{{ $user->email??'' }}"><i class="flaticon-email"></i>{{ $user->email??'' }}</a>
              </li>
              <li class="list-inline-item">
                <a href="tel:{{ $user->phone??'' }}"> <i class="flaticon-phone-call"></i>{{ $user->phone??'' }}</a>
              </li>
              <li class="list-inline-item">
                <a> <i class="flaticon-alarm-clock"></i>{{ $user->clinic_open_from??'' }} - {{ $user->clinic_open_to??'' }}, {{ $clinicOpenTime }} to {{ $clinicCloseTime }}</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 text-end d-lg-block d-none">
          <div class="social-icons social-hover top-social-list">
            <ul class="list-inline">
              <li><a href="{{ $user->facebook_link??'' }}"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li><a href="{{ $user->twitter_link??'' }}"><i class="fab fa-twitter"></i></a>
              </li>
              <li><a href="{{ $user->linkdin_link??'' }}"><i class="fab fa-linkedin-in"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="header-wrap">
    <div class="container">
      <div class="row">
        <div class="col">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand logo" href="index.html">
              <img id="logo-img" class="img-fluid" src="{{ $user->clinic_logo??'' }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <!-- Left nav -->
              <ul class="nav navbar-nav ms-auto">
                @foreach ($pages as $index=>$page)
                  <li class="nav-item"> <a class="nav-link {{ $index === 0 ? 'active' : '';  }}" href="#{{ strtolower($page->page_name??'') }}">{{ $page->page_name??'' }}</a>
                  </li>
                @endforeach
              </ul>
            </div>
            {{-- <button type="button" class="btn btn-theme btn-sm appoint-btn mt-3 mt-sm-0" data-bs-toggle="modal" data-bs-target="#appointment-modal">Make Appointment</button> --}}
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
      link.addEventListener('click', function () {
        // Remove 'active' from all links
        navLinks.forEach(nav => nav.classList.remove('active'));

        // Add 'active' to the clicked link
        this.classList.add('active');
      });
    });
  });
</script>

