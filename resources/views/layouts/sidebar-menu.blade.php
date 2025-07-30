          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
              <li class="nav-item menu-open">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                 
                  </p>
                </a>
              </li>   
              <li class="nav-item menu-open">
                <a href="{{ route('page.list') }}" class="nav-link ">
                  <i class="nav-icon bi bi-file"></i>
                  <p>
                    Pages
                  </p>
                </a>
              </li> 
              <li class="nav-item menu-open">
                <a href="{{ route('banner.list') }}" class="nav-link">
                  <i class="nav-icon bi bi-image"></i>
                  <p>
                    Banners
                  </p>
                </a>
              </li> 
              <li class="nav-item menu-open">
                <a href="{{ route('about.create') }}" class="nav-link ">
                  <i class="nav-icon bi bi-info-circle"></i>
                  <p>
                    Abouts
                 
                  </p>
                </a>
              </li>  
              <li class="nav-item menu-open">
                <a href="{{ route('service.list') }}" class="nav-link">
                  <i class="nav-icon bi bi-tools"></i>
                  <p>
                    Services
                 
                  </p>
                </a>
              </li> 
              <li class="nav-item menu-open">
                <a href="{{ route('address.list') }}" class="nav-link ">
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
                <a href="{{ route('gallery.list') }}" class="nav-link ">
                  <i class="nav-icon bi bi-images"></i>
                  <p>
                    Gallery
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('video.list') }}" class="nav-link ">
                  <i class="nav-icon bi bi-play-btn"></i>
                  <p>
                    Videos
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('faq.list') }}" class="nav-link ">
                  <i class="nav-icon bi bi-question"></i>
                  <p>
                    FAQ's
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('blog.list') }}" class="nav-link ">
                  <i class="nav-icon bi bi-substack"></i>
                  <p>
                    Blogs
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('testimonials.list') }}" class="nav-link ">
                  <i class="nav-icon bi bi-chat-quote"></i>
                  <p>
                    Testimonials
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('department.list') }}" class="nav-link ">
                  <i class="nav-icon fa-solid fa-user-doctor"></i>
                  <p>
                    Departments
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('doctors.list') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-user-doctor"></i>
                  <p>
                    Doctors
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ route('themes.select') }}" class="nav-link ">
                  <i class="nav-icon bi bi-wrench"></i>
                  <p>
                    Setting
                  </p>
                </a>
              </li> 
            </ul>
            <!--end::Sidebar Menu-->
          </nav>