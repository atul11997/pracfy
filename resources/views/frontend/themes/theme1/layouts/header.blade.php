
    @php
     use App\Models\User;
     use Illuminate\Support\Str;
     $user = User::where('id', Auth::user()->id)->first();
    @endphp

     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Welcome to a Professional Health Care</p>
                    </div>
                    @php
                    use Carbon\Carbon;

                    $clinicOpenTime = $user->clinic_open_time ? Carbon::parse($user->clinic_open_time)->format('h:i A') : '';
                    $clinicCloseTime = $user->clinic_close_time ? Carbon::parse($user->clinic_close_time)->format('h:i A') : '';
                    @endphp  
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i> {{ $user->phone??'' }}</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> {{ $clinicOpenTime }} - {{ $clinicCloseTime }} ({{ Str::substr($user->clinic_open_from, 0, -3) }}-{{ Str::substr($user->clinic_open_to, 0, -3) }})</span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $user->email??'' }}">{{ $user->email??'' }}</a></span>
                    </div>

               </div>
          </div>
     </header>
          <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="{{ url('/user').'/'.encrypt(Auth::user()->id) }}" class="navbar-brand">{{ $user->clinic_name }}</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav navbar-right">
                    @foreach ($pages as $index => $page)
                         <li>
                              <a href="#{{ strtolower($page->page_name ?? '') }}"
                                   class="smoothScroll">
                                   {{ $page->page_name ?? '' }}
                              </a>
                         </li>
                    @endforeach
                    </ul>
               </div>
          </div>
     </section>
