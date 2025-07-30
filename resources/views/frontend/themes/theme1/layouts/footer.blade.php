     <!-- FOOTER -->
     @php
         use App\Models\User;
         use App\Models\Blog;
         $user = User::where('id', Auth::user()->id)->first();
         $blogs = Blog::where('userid', Auth::user()->id)->get();
     @endphp
<footer class="bg-light pt-5 pb-4 border-top">
    <div class="container">
        <div class="row gy-4">

            <!-- Contact Info -->
            <div class="col-md-4">
                <div class="footer-thumb">
                    <h5 class="fw-bold mb-3">Contact Info</h5>
                    <p class="mb-2">{{ $user->address ?? '' }}, {{ $user->city ?? '' }}, {{ $user->state ?? '' }}, {{ $user->country ?? '' }} - {{ $user->pincode ?? '' }}</p>
                    <p class="mb-1"><i class="fa fa-phone me-2"></i> {{ $user->phone ?? '' }}</p>
                    <p><i class="fa fa-envelope-o me-2"></i> <a href="mailto:{{ $user->email ?? '' }}">{{ $user->email ?? '' }}</a></p>
                </div>
            </div>

            <!-- Latest News -->
            <div class="col-md-4">
                <div class="footer-thumb">
                    <h5 class="fw-bold mb-3">Latest News</h5>
                   @foreach ($blogs->sortByDesc('created_at')->take(2) as $blog)
                    
                        <div class="d-flex mb-3 align-items-center">
                            <div class="me-3" style="flex-shrink: 0;">
                                <img src="{{ $blog->image ?? '' }}" alt="" style="width: 60px; height: 60px; object-fit: cover;" class="rounded">
                            </div>
                            <div>
                                <a href="#news" class="text-dark text-decoration-none">
                                    <h6 class="mb-1">{{ $blog->title ?? '' }}</h6>
                                </a>
                                <small class="text-muted">{{ date('F d, Y', strtotime($blog->created_at)) }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Opening Hours & Social -->
            <div class="col-md-4">
                <div class="footer-thumb">
                    <h5 class="fw-bold mb-3">Opening Hours</h5>
                    @php
                        use Carbon\Carbon;
                        $clinicOpenTime = $user->clinic_open_time ? Carbon::parse($user->clinic_open_time)->format('h:i A') : '';
                        $clinicCloseTime = $user->clinic_close_time ? Carbon::parse($user->clinic_close_time)->format('h:i A') : '';
                        $halfDayFrom = $user->time_of_half_day_from ? Carbon::parse($user->time_of_half_day_from)->format('h:i A') : '';
                        $halfDayTo = $user->time_of_half_day_to ? Carbon::parse($user->time_of_half_day_to)->format('h:i A') : '';
                    @endphp

                    @if ($clinicOpenTime || $clinicCloseTime)
                        <p class="mb-1">{{ $user->clinic_open_from ?? '' }} - {{ $user->clinic_open_to ?? '' }} <span class="d-block text-muted">{{ $clinicOpenTime }} - {{ $clinicCloseTime }}</span></p>
                    @endif
                    @if ($halfDayFrom || $halfDayTo)
                        <p class="mb-1">{{ $user->half_day ?? '' }} <span class="d-block text-muted">{{ $halfDayFrom }} - {{ $halfDayTo }}</span></p>
                    @endif
                    @if (!empty($user->closed_clinic))
                        <p class="mb-3">{{ $user->closed_clinic }} <span class="d-block text-muted">Closed</span></p>
                    @endif

                    <!-- Social Icons -->
                    <div class="d-flex gap-3 mt-3">
                        @if($user->facebook_link)
                            <a href="{{ $user->facebook_link }}" class="text-dark fs-5"><i class="fa fa-facebook-square"></i></a>
                        @endif
                        @if($user->twitter_link)
                            <a href="{{ $user->twitter_link }}" class="text-dark fs-5"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($user->instagram_link)
                            <a href="{{ $user->instagram_link }}" class="text-dark fs-5"><i class="fa fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="row mt-4 pt-4 border-top align-items-center">
            <div class="col-md-10">
                <p class="mb-0 small text-muted">© {{ date('Y') }} {{ $user->clinic_name ?? '' }}. All rights reserved.</p>
            </div>
            <div class="col-md-2 text-end">
                <a href="#top" class="btn btn-outline-secondary btn-sm rounded-circle">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </div>
    </div>
</footer>


     <!-- SCRIPTS -->
     <script src="{{ url('/') }}/frontend/theme1/assets/js/jquery.js"></script>
     <script src="{{ url('/') }}/frontend/theme1/assets/js/bootstrap.min.js"></script>
     <script src="{{ url('/') }}/frontend/theme1/assets/js/jquery.sticky.js"></script>
     <script src="{{ url('/') }}/frontend/theme1/assets/js/jquery.stellar.min.js"></script>
     <script src="{{ url('/') }}/frontend/theme1/assets/js/wow.min.js"></script>
     <script src="{{ url('/') }}/frontend/theme1/assets/js/smoothscroll.js"></script>
     <script src="{{ url('/') }}/frontend/theme1/assets/js/owl.carousel.min.js"></script>
     <script src="{{ url('/') }}/frontend/theme1/assets/js/custom.js"></script>
