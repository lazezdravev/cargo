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
             data-background="/images/cdlworker-blog.png">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Blogs</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Blogs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start blogs grid page -->
    <section class="blog-grid">
        <div class="container">
            <div class="section-heading">
                <h2 class="display-20 display-md-18 display-lg-16">Our Latest Blogs</h2>
                <p class="w-95 w-md-80 w-lg-60 w-xl-55 mx-auto">Welcome to our blog section! Here, you can discover the latest news and trends in the world of trucking and drivers. Whether you want to stay current on current events or learn something new about a specific subject, our blog section is the perfect place.</p>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 mb-1-6 mb-md-1-9">
                        <article class="card card-style3 border-none">
                            <div class="card-img border-radius-none">
                                <div class="custom-image" style="background: url('/assets/img/blogs/medium/{{ $blog->image }}');"></div>
                                <div class="post-date">
                                    <span class="date">{{ $blog->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="card-body p-1-6">
                                <div class="mb-3">
                                    <span class="mr-2 display-29 vertical-align-top text-color"><i
                                            class="fa fa-user display-31 mr-2 text-color"></i>{{ $blog->author }}</span>
                                    <span class="display-29 vertical-align-top text-color"><i
                                            class="fa fa-tags display-31 mr-2 text-color"></i>{{ explode(',',$blog->tags)[0] }}</span>
                                </div>
                                <h4 class="mb-3 h5"><a href="/blog/{{ $blog->slug }}" class="text-color">{{ $blog->title }}</a></h4>
                                <p>{!!  Str::limit(strip_tags($blog->description), 150, '...') !!}</p>
                                <div class="card-footer bg-white border-none p-0">
                                    <div class="border-top border-color-extra-light-gray pt-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="link-btn" href="/blog/{{ $blog->slug }}"><i class="ti ti-minus"></i>Read More</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <!-- start pager  -->


                            {{ $blogs->links() }}


                    <!-- end pager -->
                </div>
            </div>
        </div>
    </section>
    <!-- end blogs grid page -->

    <!-- start footer section -->
@endsection
