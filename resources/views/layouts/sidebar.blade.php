
<style>
      .sidebar-wrapper .sidebar-menu > .nav-item.menu-open > .nav-link{
  background-color: #00000000;
}     

.sidebar-wrapper .sidebar-menu > .nav-item.menu-open .nav-link.active{
  color: #0d6efd;
}
.sidebar-wrapper .sidebar-menu > .nav-item.menu-open .nav-link:hover{
  color: #0d6efd;
}
      </style>
   <aside class="app-sidebar bg-dark shadow d-none d-lg-block" data-bs-theme="dark" id="sidebarDesktop">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            @if(Auth::user() && Auth::user()->clinic_logo)
                <img src="{{ Auth::user()->clinic_logo }}" width="50px">
            @else
                <img src="{{ url('/assets/img/dummy_clinic_logo.png') }}" width="50px">
            @endif
            <span class="brand-text fw-light">{{ Auth::user()->clinic_name }}</span>
        </a>
    </div>
    
    <!-- Sidebar Menu -->
    <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
              <li class="nav-item menu-open">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                 
                  </p>
                </a>
              </li>   
              <li class="nav-item menu-open">
                <a href="{{ route('page.list') }}" class="nav-link {{ request()->routeIs('page.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-file"></i>
                  <p>
                    Pages
                  </p>
                </a>
              </li> 
              <li class="nav-item menu-open">
                <a href="{{ route('banner.list') }}" class="nav-link {{ request()->routeIs('banner.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-image"></i>
                  <p>
                    Banners
                  </p>
                </a>
              </li> 
              <li class="nav-item menu-open">
                <a href="{{ route('about.create') }}" class="nav-link {{ request()->routeIs('about.create') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-info-circle"></i>
                  <p>
                    Abouts
                 
                  </p>
                </a>
              </li>  
              <li class="nav-item menu-open">
                <a href="{{ route('service.list') }}" class="nav-link {{ request()->routeIs('service.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-tools"></i>
                  <p>
                    Services
                 
                  </p>
                </a>
              </li> 
              <li class="nav-item menu-open">
                <a href="{{ route('address.list') }}" class="nav-link {{ request()->routeIs('address.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-map"></i>
                  <p>
                    Address
                 
                  </p>
                </a>
              </li> 
              {{-- <li class="nav-item menu-open">
                <a href="{{ route('social.list') }}" class="nav-link {{ request()->routeIs('social.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-facebook"></i>
                  <p>
                    Social Media Link
                  </p>
                </a>
              </li>       --}}
              <li class="nav-item menu-open">
                <a href="{{ route('gallery.list') }}" class="nav-link {{ request()->routeIs('gallery.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-images"></i>
                  <p>
                    Gallery
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('video.list') }}" class="nav-link {{ request()->routeIs('video.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-play-btn"></i>
                  <p>
                    Videos
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('faq.list') }}" class="nav-link {{ request()->routeIs('faq.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-question"></i>
                  <p>
                    FAQ's
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('blog.list') }}" class="nav-link {{ request()->routeIs('blog.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-substack"></i>
                  <p>
                    Blogs
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('testimonials.list') }}" class="nav-link {{ request()->routeIs('testimonials.list') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-chat-quote"></i>
                  <p>
                    Testimonials
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('department.list') }}" class="nav-link {{ request()->routeIs('department.list') ? 'active' : '' }}">
                  <i class="nav-icon fa-solid fa-user-doctor"></i>
                  <p>
                    Departments
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('doctors.list') }}" class="nav-link {{ request()->routeIs('doctors.list') ? 'active' : '' }}">
                  <i class="nav-icon fa-solid fa-user-doctor"></i>
                  <p>
                    Doctors
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('themes.select') }}" class="nav-link {{ request()->routeIs('themes.select') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-wrench"></i>
                  <p>
                    Setting
                  </p>
                </a>
              </li> 
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
    </div>
</aside>

      <script>
    
  document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('#navigation .nav-link');
    
    navLinks.forEach(link => {
      link.addEventListener('click', function () {
        // Remove 'active' class from all nav links
        navLinks.forEach(l => l.classList.remove('active'));

        // Add 'active' class to the clicked link
        this.classList.add('active');
      });
    });
  });
</script>

       