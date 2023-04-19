@extends('layouts.frontend')
@section('meta')
    <meta name="description" content="CDL Worker - Apply Now for CDL Truck Driver Jobs"/>
    <meta name="Author" content="CDLWorker"/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="CDL Jobs - Truck Driver Jobs with The Best Recruitment Agency">
    <meta itemprop="description" content="{{ strip_tags($settings->description) }}">
    <meta itemprop="image" content="{{ env('APP_URL') }}/assets/img/blogs/originals/{{ $blog->image }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ url()->full() }}">
    <meta name="twitter:title" content="CDL Jobs - Truck Driver Jobs with The Best Recruitment Agency">
    <meta name="twitter:description" content="{{ strip_tags($settings->description) }}">
    <meta name="twitter:creator" content="CDLWORKER">
    <meta name="twitter:image" content="{{ env('APP_URL') }}/assets/img/blogs/originals/{{ $blog->image }}">

    <!-- Open Graph data -->
    <meta property="fb:app_id" content="414881072500201"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:title" content="CDL Jobs - Truck Driver Jobs with The Best Recruitment Agency"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ url()->full() }}"/>
    <meta property="og:image" content="{{ env('APP_URL') }}/assets/img/blogs/originals/{{ $blog->image }}"/>
    <meta property="og:description" content="{{ strip_tags($settings->description) }}"/>
    <meta property="og:site_name" content="CDLWorker"/>
@endsection

@section('content')
    <!-- start page title section -->
    <section class="bg-img" data-overlay-dark="5"
             data-background="/images/cdlworker-blog-section.png" style="max-height: 30px; !important; margin-top: -250px;">

    </section>
    <!-- end page title section -->

    <!-- start blog detail page -->
    <section class="blogs">
        <div class="container">
            <div class="row">
                <!--  start blog left-->
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="pr-xl-1-6">
                        <div class="posts-wrapper">
                            <!--  start post-->
                            <img src="/assets/img/blogs/originals/{{ $blog->image }}" alt="{{ $blog->title }}"
                                 class="rounded-top">
                            <div class="post-content">
                                <div class="post-meta">
                                    <h2 class="display-20 display-md-18 display-lg-16">{{ $blog->title }}</h2>
                                    <ul class="meta-list">
                                        <li>
                                            <a href="{{ $blog->slug }}" class="text-color">
                                                <i class="fa fa-user mr-1 text-theme-color"></i> {{ $blog->author }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $blog->slug }}" class="text-color">
                                                <i class="fa fa-calendar mr-1 text-theme-color"></i> {{ $blog->created_at->format('M d, Y') }}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="mb-2-6" id="content">
                                    {!! $blog->description !!}
                                </div>

                                <div class="separator"></div>
                                <div class="row no-gutters">
                                    <div class="col-md-6 col-xs-12 mb-1-6 mb-md-0">
                                        <div class="tags">
                                            <h5 class="display-30 display-sm-29 display-lg-28 font-weight-600 mb-3 text-color">
                                                Related Tags</h5>
                                            <ul class="blog-tags">

                                                @foreach(explode(',',$blog->tags) as $tag)
                                                    <li><a href="{{ $blog->slug }}"> {{ $tag }}</a></li>

                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <h5 class="display-30 display-sm-29 display-lg-28 font-weight-600 text-md-right text-left mb-3  text-color">
                                            Share Post</h5>
                                        <div class="share-post">
                                            <ul class="mb-0">
                                                <li class="ml-0"><a href="" class="social-share facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="social-share twitter"><a href="" class="social-share twitter"><i class="fab fa-twitter"></i></a></li>
                                                <li class="social-share linkedin mr-0"><a href="" class="social-share linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  end post-->


                        </div>
                    </div>
                </div>
                <!--  end blog left-->

                <!--  start blog right-->
                <div class="col-lg-4">
                    <div class="side-bar">

                        <div class="widget">
                            <h4 class="widget-title">Search</h4>
                            <div class="widget-body">
                                <div class="search">
                                    <form method='post' action="{{ route('blogs.search') }}">
                                        @csrf
                                        <input type="search" name="search" placeholder="Type here ..." class="typeahead"
                                               id="search">
                                        <span></span>
                                        <button type="submit" class="butn theme"><i class="fa fa-search"
                                                                                    aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <h4 class="widget-title">Clients</h4>
                            <div class="widget-body">
                                <div class="client-carousel owl-carousel owl-theme">
                                    @foreach($testimonials as $testimonial)
                                        <div class="text-center">
                                            <div class="w-15 w-lg-35 mx-auto mb-3">
                                                <div class="small-image"
                                                     style="background-image: url('/assets/img/testimonials/thumbnails/{{ $testimonial->image }}');"></div>
                                            </div>
                                            <h4 class="font-weight-600 display-29 display-md-28 display-xl-27 mb-2"><a
                                                    href="{{ $blog->slug }}" class="text-color">{{ $testimonial->name }}</a></h4>
                                            <p>{!! $testimonial->description !!}</p>
                                            <ul class="social-listing">
                                                <li class="pl-0"><a href="{{ $settings->facebook }}" target="_blank"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="{{ $settings->instagram }}" target="_blank"><i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="{{ $settings->youtube }}" target="_blank"><i
                                                            class="fab fa-youtube"></i></a></li>
                                                <li class="mr-0"><a href="{{ $settings->linkedin }}" target="_blank"><i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Services</h4>
                            <div class="widget-body">
                                <div class="cat-list">
                                    <ul class="mb-0">
                                        @foreach($categories as $service)
                                            <li><a href="/service/{{ $service->slug }}">{{  $service->name }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Popular Feeds</h4>
                            <div class="widget-body">
                                @foreach($blogsFooter as $b)
                                    <div class="media mb-1-6">
                                        <div class="small-image" style="background-image: url('/assets/img/blogs/thumbnails/{{ $b->image }}');"></div>
                                        <div class="media-body align-self-center">
                                            <h4 class="display-30 display-xl-29 font-weight-600 mb-1 text-capitalize"><a
                                                    href="/blog/{{ $blog->slug }}"
                                                    class="text-color">{{ $b->title }}</a></h4>
                                            <a href="{{ $blog->slug }}" class="display-30">{{  $b->created_at->format('M d, Y') }}</a>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                        <div class="widget">
                            <h4 class="widget-title">Popular Tags</h4>
                            <div class="widget-body">
                                <ul class="blog-tags">
                                    @foreach($blogsFooter as $b)
                                        @foreach(explode(',',$b->tags) as $tag)
                                            <li><a href="#">{{ $tag }}</a></li>
                                        @endforeach
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="widget mb-0">
                            <h4 class="widget-title">Follow Us</h4>
                            <div class="widget-body">
                                <ul class="social-icons">
                                    <li class="pl-0"><a href="{{ $settings->facebook }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $settings->instagram }}" target="_blank"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $settings->youtube }}" target="_blank"><i
                                                class="fab fa-youtube"></i></a></li>
                                    <li class="mr-0"><a href="{{ $settings->linkedin }}" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  end blog right-->
            </div>
        </div>
    </section>
    <!-- end blog detail page -->
@endsection

@section('scripts')
    <script>
        let allHref = $("#content").find("a");

        let someElements = $("a:contains('Apply Now')");


        someElements.each(function () {
            $(this).addClass("butn").addClass("butn-md").addClass("theme");
            $(this).parent().addClass("text-center").addClass("m-5");
            $(this).append('<i class="far fa-paper-plane ml-2"></i>');
        });

    </script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var route = "{{ route('blog.search') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
    <script>
        setShareLinks();
        function socialWindow(url) {
            var left = (screen.width - 570) / 2;
            var top = (screen.height - 570) / 2;
            var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
            window.open(url,"NewWindow",params);
        }

        function setShareLinks() {
            var pageUrl = encodeURIComponent(document.URL);
            var tweet = encodeURIComponent(jQuery("meta[property='og:description']").attr("content"));

            jQuery(".social-share.facebook").on("click", function() {
                url = "https://www.facebook.com/sharer.php?u=" + pageUrl;
                socialWindow(url);
            });

            jQuery(".social-share.twitter").on("click", function() {
                url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + tweet;
                socialWindow(url);
            });

            jQuery(".social-share.linkedin").on("click", function() {
                url = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
                socialWindow(url);
            })
        }
    </script>
@endsection
