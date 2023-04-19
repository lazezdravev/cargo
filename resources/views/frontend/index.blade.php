@extends('layouts.frontend')
@section('meta')
    <meta name="description" content="CDL Worker - Apply Now for CDL Truck Driver Jobs"/>
    <meta name="Author" content="CDLWorker"/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="CDL Jobs - Truck Driver Jobs with The Best Recruitment Agency">
    <meta itemprop="description" content="{{ strip_tags($settings->description) }}">
    <meta itemprop="image" content="{{ env('APP_URL') }}/assets/img/meta_image/{{ $settings->meta_image }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ url()->full() }}">
    <meta name="twitter:title" content="CDL Jobs - Truck Driver Jobs with The Best Recruitment Agency">
    <meta name="twitter:description" content="{{ strip_tags($settings->description) }}">
    <meta name="twitter:creator" content="CDLWORKER">
    <meta name="twitter:image" content="{{ env('APP_URL') }}/assets/img/meta_image/{{ $settings->meta_image }}">

    <!-- Open Graph data -->
    <meta property="fb:app_id" content="414881072500201"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:title" content="CDL Jobs - Truck Driver Jobs with The Best Recruitment Agency"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ url()->full() }}"/>
    <meta property="og:image" content="{{ env('APP_URL') }}/assets/img/meta_image/{{ $settings->meta_image }}"/>
    <meta property="og:description" content="{{ strip_tags($settings->description) }}"/>
    <meta property="og:site_name" content="CDLWorker"/>
@endsection
@section('content')

    <!-- start slideshow-->
    <div class="container-fluid full-screen top-position">
        <div class="row slider-fade1">
            <div class="owl-carousel owl-theme w-100">

                <div class="item bg-img video-bg" data-overlay-dark="6">
                    <div class="container h-100">
                        <div class="d-table h-100 w-100">
                            <div class="d-table-cell align-middle caption text-center">
                                <div class="overflow-hidden w-95 w-md-85 w-lg-80">


                                    <h2 class="text-white display-20 display-md-18 display-lg-16 slider-title">DRIVE
                                        YOUR CAREER FORWARD</h2>


                                    <a href="/application" class="butn display-30 display-md-18 display-lg-16 m-2">
                                        <span><strong>DRIVER APPLICATION</strong></span>
                                    </a>

                                    <a href="tel:{{ $settings->phone }}" class="butn display-30 display-md-18 display-lg-16 m-2">
                                        <span><strong>CALL A RECRUITER</strong></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end slideshow-->

    <section class="info-box">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-6 col-lg-6 mb-2-2 mb-lg-0">
                    <div class="info-wrapper">

                        <h3 class="h5 mb-3">Truck Driver Recruitment</h3>
                        <p class="alt-font display-30 display-md-29">CDL Worker connects skilled CDL drivers with top trucking companies, providing opportunities for drivers to focus on driving rather than job hunting.</p>
                        <a class="info-link" href="/service/recruitment"><i class="ti-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="info-wrapper last">

                        <h3 class="h5 mb-3">Dispatch</h3>
                        <p class="alt-font font-weight-400 display-30 display-md-29">We will take your supply chain on the road to success as we provide a gateway to efficient and reliable dispatch for your time-sensitive deliveries.</p>
                        <a class="info-link" href="/service/dispatch"><i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start jobs section -->


    <section class="blog-grid" style="padding: 50px 0;">
        <div class="container">
            <div class="section-heading">
                <h2 class="display-20 display-md-18 display-lg-16">Jobs</h2>
                <p class="w-95 w-md-80 w-lg-60 w-xl-55 mx-auto">Whether you’re an owner-operator looking for new opportunities or a seasoned driver seeking a change, we have options that fit your needs. Our job listings include local, regional, and long-haul routes with competitive pay and benefits packages.</p>
            </div>
            <div class="what-we-offer-carousel owl-carousel owl-theme">
                @foreach($jobs as $job)
                    <div class="what-we-offer-wrapper mb-1-6 mb-md-1-9">
                        <article class="card card-style4">
                            <div class="card-img border-radius-none">
                                <a href="{{ route('job.application', $job->id) }}">
                                    <div class="custom-image"
                                         style="background: url('/assets/img/jobs/medium/{{ $job->image }}');"></div>

                                </a>
                                <div class="post-date">
                                    <span class="date">{{ $job->type }}</span>
                                </div>
                            </div>
                            <div class="card-body p-1-6">

                                <div style="min-height: 350px;">
                                    <h4 class="h5 m-1-8 text-center">{{ $job->title }}</h4>
                                    <p>{{ $job->created_at->diffForHumans() }}&nbsp;/ &nbsp;<i
                                            class="fas fa-map-marker-alt"></i>&nbsp; {{ $job->place }}</p>
                                    <p><strong style="text-transform: capitalize">@if($job->option === "solo")
                                                <i class="fas fa-user"></i>
                                            @else
                                                <i class="fas fa-users"></i>
                                            @endif{{ $job->option }}</strong></p>
                                    @if($job->equipment)
                                        <p>Equipment: <strong>{{ $job->equipment }}</strong></p>
                                    @endif
                                    @if($job->experience)
                                        <p>Experience: <strong>{{ $job->experience }}</strong></p>
                                    @endif
                                    @if($job->salary)
                                        <p>Salary: <strong>{{ $job->salary }}</strong></p>
                                    @endif
                                </div>
                                <div class="card-footer bg-white border-none p-0" style="align-self: flex-end;">
                                    <div class="pt-3">
                                        <div class="text-center justify-content-between">
                                            <a class="butn theme" href="{{ route('job.application', $job->id) }}">Apply
                                                Now <i
                                                    class="far fa-paper-plane ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- end jobs section -->




    <!-- start about us section -->
    <section class="pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-2-6 mb-lg-0">
                    <div class="bg-secondary p-1-6 p-sm-1-9 p-xl-2-5">
                        <div class="bg-white p-2 mb-3">
                            <div class="position-relative bg-img text-center py-10 py-sm-14 py-md-16 py-lg-24 rounded"
                                 data-overlay-dark="0" data-background="/images/cdlworker-jobs.png" style="background-size: cover;">
                            </div>
                        </div>
                        <h3 class="h5 text-center mb-3"></h3>
                        <span class="d-block text-primary text-center"></span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pl-lg-1-9 pl-xl-2-5">
                        <div class="mb-1-6 mb-xl-1-9">
                            <h2>Connecting Drivers with Carriers</h2>
                        </div>
                        <p class="mb-2-6 w-95">

                        </p>

                        <div class="about-carousel owl-carousel owl-theme">
                            <div class="about-box">
                                <div class="icon-wrapper">
                                    <div class="about-icon" style="background: none;">
                                        <div class="custom-icon"
                                             style="background-image: url('/icons/icon-vision.png');"></div>
                                    </div>
                                </div>
                                <div class="about-content">
                                    <h5 class="display-26 font-weight-700 text-white">Vision</h5>
                                    <p class="display-30 alt-font text-white mb-0">Bridging the gap between drivers and recruiters through an easy-to-use, convenient, and one-stop solution platform.</p>
                                </div>
                            </div>
                            <div class="about-box">
                                <div class="icon-wrapper">
                                    <div class="about-icon" style="background: none;">
                                        <div class="custom-icon"
                                             style="background-image: url('/icons/icon-mission.png');"></div>
                                    </div>
                                </div>
                                <div class="about-content">
                                    <h5 class="display-26 font-weight-700 text-white">Mission</h5>
                                    <p class="display-30 alt-font text-white mb-0">Delivering the perfect success formula for both transportation companies and truck drivers, allowing companies to avoid the challenges of driver recruitment while drivers find their ideal jobs with us.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about us section -->






    <!-- Why us? -->
    <section class="parallax cover-background theme-overlay" data-overlay-dark="6" data-background="/images/whyus.png" style="background-image: url(&quot;/images/whyus.png&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="pl-xl-9">
                        <div class="p-2-5 p-sm-2-9 p-md-6 p-xl-7 bg-white">
                            <h2 class="mb-1-6">Why Choose Us?</h2>
                            <p class=" mb-1-6">1. We have an extensive network of trucking companies looking for drivers.</p>
                            <p class=" mb-1-6">2. We offer personalized service and support throughout the job search process.</p>
                            <p class=" mb-1-6">3. We help you find jobs that fit your skills, experience, and preferences.</p>
                            <p class=" mb-1-6">4. We provide resources and advice to help you succeed in your career.</p>
                            <p class=" mb-1-6">5. We only work with trucking companies that offer competitive pay and benefits.</p>
                            <a class="butn theme" href="/application">Apply Now <i class="far fa-paper-plane ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why us? -->




    <!-- start services section -->
    <section>
        <div class="container">
            <div class="section-heading">
                <h2 class="display-20 display-md-18 display-lg-16">Our services</h2>
                <p class="w-95 w-md-80 w-lg-60 w-xl-55 mx-auto"></p>
            </div>
            <div class="row">
                @foreach($categories as $service)
                    <div class="col-lg-3 col-md-6 mb-1-6 mb-md-1-9 mb-xl-2-5">
                        <div class="card card-style1">
                            <div class="card-body p-0">
                                <a href="/service/{{ $service->slug }}">
                                    <div class="image-wrapper">
                                        <div class="bg-img cover-background position-relative h-100 z-index-1"
                                             data-overlay-dark="0"
                                             data-background="/assets/img/categories/medium/{{ $service->homepage_image }}"
                                             style="background-image: url('/assets/img/categories/medium/{{ $service->homepage_image }}');">
                                            <div class="position-relative z-index-1 h-100 w-100"></div>
                                        </div>
                                        <div class="service-icon-wrapper">
                                            <div class="service-icon">
                                                <div class="custom-icon" style="background-image: url('/assets/img/categories/medium/{{ $service->homepage_icon }}');"></div>
                                            </div>
                                            <div class="pl-3">
                                                <h5 class="display-28 display-lg-27 display-xl-25 mb-0">{{ $service->homepage_title }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="service-content"><a href="/service/{{ $service->slug }}">
                                        <div class="custom-icon"
                                             style="background-image: url('/assets/img/categories/medium/{{ $service->homepage_icon }}');"></div>
                                        <h5 class="display-27 display-lg-26 display-xl-25 mb-3">{{ $service->homepage_title }}</h5>
                                        <p class="alt-font font-weight-400 display-30 display-md-29">{!! strip_tags($service->homepage_description) !!}</p>
                                    </a><a class="link-btn" href="/service/{{ $service->slug }}"><i
                                            class="ti ti-minus"></i>Read
                                        More</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end services section -->
    <!-- start testimonial section -->
    <section class="pt-0">
        <div class="container">
            <div class="section-heading">
                <h2 class="display-20 display-md-18 display-lg-16">Testimonials</h2>
                <p class="w-95 w-md-80 w-lg-60 w-xl-55 mx-auto">Hear from our clients about how we've helped them
                    achieve success.</p>
            </div>

            <div class="testimonial-carousel owl-carousel owl-theme">
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-wrapper">
                        <div class="testimonial-content">
                            <h4 class="h5 text-primary">{{ $testimonial->name }}</h4>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star mr-0"></i>
                            </div>
                            <p class="mb-0">{!! $testimonial->description !!}</p>
                        </div>
                        <div class="media">
                            <div class="small-image"
                                 style="background-image: url('/assets/img/testimonials/thumbnails/{{ $testimonial->image }}');"></div>
                            <div class="media-body align-self-center">
                                <h6>{{ $testimonial->name }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- end testimonial section -->



    <!-- start blogs section -->
    <section class="blog pt-0">
        <div class="container">
            <div class="section-heading">
                <h2 class="display-20 display-md-18 display-lg-16">Our Latest Blogs</h2>
                <p class="w-95 w-md-80 w-lg-60 w-xl-55 mx-auto">Welcome to our blog section! Here, you can discover the
                    latest news and trends in the world of trucking and drivers. Whether you want to stay current on
                    current events or learn something new about a specific subject, our blog section is the perfect
                    place.</p>
            </div>
            @foreach($blogsFooter as $index => $blog)
                @if($index === 0)
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-1-6 mb-lg-0">
                            <article class="card card-style2 border-none">
                                <div class="card-img">
                                    <img src="/assets/img/blogs/medium/{{ $blog->image }}" alt=""/>
                                </div>
                                <div class="card-body">
                                    <div class="blog-meta-date">
                                        {{ $blog->created_at->format('M d') }}
                                    </div>
                                    <h4 class="mb-3 display-28 display-md-27 display-xl-25"><a
                                            href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a></h4>
                                    <a class="link-btn" href="/blog/{{ $blog->slug }}"><i class="ti ti-minus pr-1"></i>Read
                                        More</a>
                                </div>
                            </article>
                        </div>


                        <div class="col-lg-6">
                            @elseif($index === 1)
                                <div class="row no-gutters mb-1-6">
                                    <div class="col-lg-7 order-2 order-lg-1">
                                        <article class="card card-style2 border-none border-radius-none bg-grey h-100">
                                            <div class="p-1-6 p-md-1-9">
                                                <div class="blog-meta-date">
                                                    {{ $blog->created_at->format('M d') }}
                                                </div>
                                                <h4 class="h5"><a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a>
                                                </h4>
                                                <a class="link-btn" href="/blog/{{ $blog->slug }}"><i
                                                        class="ti ti-minus pr-1"></i>Read More</a>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-lg-5 order-1 order-lg-2">
                                        <div
                                            class="card-img h-100 bg-img cover-background py-12 py-md-18 py-lg-0 border-radius-none"
                                            data-overlay-dark="0" data-background="/assets/img/blogs/medium/{{ $blog->image }}"></div>
                                    </div>
                                </div>
                            @else

                                <div class="row no-gutters">
                                    <div class="col-lg-7 order-2 order-lg-1">
                                        <article class="card card-style2 border-none border-radius-none bg-grey h-100">
                                            <div class="p-1-6 p-md-1-9">
                                                <div class="blog-meta-date">
                                                    {{ $blog->created_at->format('M d') }}
                                                </div>
                                                <h4 class="h5"><a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a>
                                                </h4>
                                                <a class="link-btn" href="/blog/{{ $blog->slug }}"><i
                                                        class="ti ti-minus pr-1"></i>Read More</a>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-lg-5 order-1 order-lg-2">
                                        <div
                                            class="card-img h-100 bg-img cover-background py-12 py-md-18 py-lg-0 border-radius-none"
                                            data-overlay-dark="0" data-background="/assets/img/blogs/medium/{{ $blog->image }}"></div>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
        </div>
    </section>
    <!-- end blogs section -->

    <!-- start newsletter section -->
    <section class="bg-primary py-lg-6">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 mb-1-9 mb-lg-0 text-center text-center text-lg-left">
                    <h3 class="h4 text-white">Subscribe to our Newsletter!</h3>
                    <p class="text-white mb-0">Sign up to receive regular updates about our company, job openings, and
                        industry insights.</p>
                </div>
                <div class="col-md-10 col-lg-5">
                    <form id="subscribe" class="newsletter-form" action="{{ route('subscribe') }}" method="post"
                          enctype="multipart/form-data" onclick="">
                        @csrf
                        <div class="quform-elements">
                            <div class="row">
                                <!-- Begin Text input element -->
                                <div class="col-md-12">
                                    <div class="quform-element">
                                        <div class="quform-input">
                                            <input class="form-control" id="email" type="text"
                                                   name="email" placeholder="Subscribe with us"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Text input element -->

                                <!-- Begin Submit button -->
                                <div class="col-md-12">
                                    <div class="quform-submit-inner">
                                        <button class="btn btn-white text-primary m-0" type="submit"><i
                                                class="fas fa-paper-plane"></i></button>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-white text-center" id="successMessage"></p>
                                    </div>
                                </div>
                                <!-- End Submit button -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end newsletter section -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".video-bg").wallpaper({
                source: {
                    mp4: "/assets/video/movie.mov",
                    poster: "/assets/video/fallback.jpg"
                }
            });
        });
    </script>
    <script>
        $("#subscribe").on("submit", function (e) {
            e.preventDefault();
            let token = $('input[name="_token"]').val();

            let email = $("#email").val();
            let sendData = {'email': email};

            console.log(sendData);
            $.ajax({
                url: "{{ route('subscribe') }}",
                data: sendData,
                method: 'POST',
                headers: {
                    'X-CSRF-Token': token
                },
                success: function (data) {
                    $("#email").val("");
                    $("#successMessage").html("Thank you for subscribing to our Newsletter!")
                },
                error: function (e) {
                    $("#successMessage").html(e.responseJSON.toString());
                }
            });

        });

    </script>
@endsection
