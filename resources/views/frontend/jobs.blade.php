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
    <!-- start page title section -->
    <section class="page-title-section bg-img cover-background top-position theme-overlay-dark" data-overlay-dark="5"
             data-background="/images/cdlworker-jobs.png">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Jobs</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Jobs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title section -->





    <!-- start careers section -->
    <section class="blog-grid">
        <div class="container">
            <div class="section-heading">
                <h2 class="display-20 display-md-18 display-lg-16">Job Openings</h2>
                <p class="mx-auto">Welcome to our trucker recruitment agency's Jobs section! Here you will find exciting
                    career opportunities for skilled and experienced truck drivers.
                    We partner with some of the top transportation companies in the industry to bring you a wide range
                    of job openings. Whether you're an owner-operator looking for new opportunities or a seasoned driver
                    seeking a change, we have options that fit your needs.
                    Our job listings include local, regional, and long-haul routes with competitive pay and benefits
                    packages. We understand that trucking can be a challenging profession, which is why we prioritize
                    safety, reliability, and respect for our drivers.
                    With our extensive network of transportation partners, we can connect you with the right job that
                    meets your preferences and qualifications.
                    We look forward to helping you find your next exciting opportunity in the trucking industry.</p>
            </div>
            <div class="row">
                @foreach($jobs as $job)
                    <div class="col-lg-4 col-md-6 mb-1-6 mb-md-1-9">
                        <article class="card card-style4 border-none">
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
    <!-- end careers section -->
@endsection
