  <footer id="footer" class="footer light-background">
@php
  use App\Models\User;
   use App\Models\Service;
  $user = User::where('id', Auth::user()->id)->first();
  $services = Service::where('user_id', Auth::user()->id)->limit(6)->get();
@endphp
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-3 col-md-6 footer-about">
          <a href="{{ url('/user').'/'.encrypt(Auth::user()->id) }}" class="logo d-flex align-items-center">
            <span class="sitename">{{ $user->clinic_name??'' }}</span>
          </a>
          <div class="footer-contact pt-0">
            <p>{{ $user->address??'' }}</p>
            <p>{{ $user->city??'' }}, {{ $user->state??'' }}, {{ $user->country??'' }}</p>
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

        <div class="col-lg-3 col-md-3 footer-links">
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

        <div class="col-lg-3 col-md-3 footer-links">
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

        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            @foreach ($services as $service)
              <li>{{ $service->title??'' }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $user->clinic_name??'' }}</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>