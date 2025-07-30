<!--footer start-->
@php
    use App\Models\User;
    use App\Models\About;
    $user = User::where('id', Auth::user()->id)->first();
    $about = About::where('user_id', Auth::user()->id)->first();
@endphp

<footer class="footer grey-bg">
    <div class="primary-footer pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-logo mb-3">
                        <img id="footer-logo-img" class="img-fluid" src="{{ $user->clinic_logo ?? '' }}" alt="">
                    </div>
                    <p class="mb-3">{{ $about->subtitle ?? '' }}</p> <a class="btn-simple" href="#"><span>Read
                            More <i class="ms-2 fas fa-long-arrow-alt-right"></i></span></a>
                </div>

                <div class="col-lg-6 col-md-12 mt-5 mt-lg-0 ps-lg-5">
                    <div class="row">
                        <div class="col-sm-5 footer-list">
                            <h5>Quick <span class="text-theme">Link</span></h5>
                            <ul class="list-unstyled">
                                @if($pages->has('home'))
                                <li><a href="#{{ strtolower($pages['home']->page_name??'') }}">{{ $pages['home']->page_name??'' }}</a>
                                </li>
                                @endif
                                @if($pages->has('about'))
                                <li><a href="#{{ strtolower($pages['about']->page_name??'') }}">{{ $pages['about']->page_name??'' }}</a>
                                </li>
                                @endif
                                @if($pages->has('contact'))
                                <li><a href="#{{ strtolower($pages['contact']->page_name??'') }}">{{ $pages['contact']->page_name??'' }}</a>
                                @endif
                                @if($pages->has('service'))
                                <li><a href="#{{ strtolower($pages['service']->page_name??'') }}">{{ $pages['service']->page_name??'' }}</a>
                                @endif
                            </ul>
                        </div>
                        <div class="col-sm-7 mt-5 mt-sm-0">
                            <h5>Get In <span class="text-theme">Touch</span></h5>
                            <ul class="media-icon list-unstyled">
                                <li class="mb-4"> <i class="flaticon-paper-plane"></i>
                                    <p class="mb-0">{{ $user->address ?? '' }}, {{ $user->city ?? '' }},
                                        {{ $user->state ?? '' }}, {{ $user->country ?? '' }}</p>
                                </li>
                                <li class="mb-4"> <i class="flaticon-email"></i>
                                    <a href="mailto:{{ $user->email ?? '' }}">{{ $user->email ?? '' }}</a>
                                </li>
                                <li> <i class="flaticon-phone-call"></i>
                                    <a href="tel:{{ $user->phone ?? '' }}">{{ $user->phone ?? '' }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col">
                            <div class="social-icons social-colored social-fullwidth">
                                <ul class="list-inline mb-0">
                                    <li class="social-facebook"><a href="{{ $user->facebook_link ?? '' }}"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="social-twitter"><a href="{{ $user->twitter_link ?? '' }}"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="social-linkedin"><a href="{{ $user->linkdin_link ?? '' }}"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li class="social-skype"><a href="{{ $user->instagram_link ?? '' }}"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="secondary-footer text-center">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col"> <span>Copyright {{ date('Y') }} {{ $user->clinic_name??'' }} | All Rights Reserved</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
