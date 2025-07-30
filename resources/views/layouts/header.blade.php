     <style>
      .nav-item .nav-link img{
          width: 25px;
          height: 25px;
          border-radius: 50%;
      }
#mobileSidebar .nav-link {
  color: white !important;
}

#mobileSidebar .nav-link.active {
  background-color: rgba(255, 255, 255, 0.1);
  color: white !important;
}
     </style>
     <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>

          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item d-lg-none">
              <a class="nav-link d-block d-lg-none" data-bs-toggle="offcanvas" href="#mobileSidebar" role="button" aria-controls="mobileSidebar">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <!--begin::User Menu Dropdown-->
            <li> <a href="{{ url('/user').'/'.Auth::user()->username??'' }}" class="btn btn-secondary" target="_blank">View Site</a></li>
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            @if(Auth::user() && Auth::user()->clinic_photo)
            <img src="{{ Auth::user()->clinic_photo }}">
            @else
            <img src="{{ url('/').'/assets/img/dummy_clinic_images.jpg' }}">
            @endif
                <span class="d-none d-md-inline">{{ ucWords(Auth::user()->name) }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
            @if(Auth::user() && Auth::user()->clinic_photo)
            <img src="{{ Auth::user()->clinic_photo }}" width="50px" class="img-fluid rounded-circle" width="50px" height="50px">
            @else
            <img src="{{ url('/').'/assets/img/dummy_clinic_images.jpg' }}" class="img-fluid rounded-circle" width="50px" height="50px">
            @endif
                  <p class="lh-1">
                    {{ ucWords(Auth::user()->name) }}
                  </p>
                  <p class="lh-1">
                    {{ Auth::user()->email }}
                  </p>
                </li>

                <li class="user-footer">
                  <a href="{{ route('profile.show', ['id'=>Auth::user()->id]) }}" class="btn btn-default btn-flat">Profile</a>
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>