@include('frontend.partials.header')
<!-- start main-wrapper section -->
<div class="main-wrapper">

    <!-- start header section -->
    <header class="header-style1 menu_area-light">

        <div class="navbar-default">

            <!-- start top search -->
            <div class="top-search bg-primary">
                <div class="container">
                    <form class="search-form" action="/all/search" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                                </span>
                            <input type="text" id="mainsearch" class="search-form_input form-control" name="s" autocomplete="off"
                                   placeholder="Type & hit enter...">
                            <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end top search -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-12">
                        <div class="menu_area alt-font">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">

                                <div class="navbar-header navbar-header-custom">
                                    <!-- start logo -->
                                    <a href="/" class="navbar-brand"><img id="logo" src="/assets/img/logo_white/{{ $settings->logo_white }}" alt="logo"></a>
                                    <!-- end logo -->
                                </div>

                                <div class="navbar-toggler"></div>

                                <!-- menu area -->
                                <ul class="navbar-nav ml-auto" id="nav" style="display: none;">
                                    <li><a href="/">Home</a></li>


                                    <li><a href="#">Services</a>

                                        <ul>
                                            {!! $tree  !!}
                                        </ul>
                                    </li>

                                    <li><a href="/jobs">Jobs</a></li>




                                    <li>
                                        <a href="/blog">Blog</a>

                                    </li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>
                                <!-- end menu area -->

                                <!-- start attribute navigation -->
                                <div class="attr-nav">
                                    <ul>
                                        <li class="search"><a href="/assets/#"><i class="fas fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <!-- end attribute navigation -->

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- end header section -->
    @yield('content')
    <!-- start footer section -->
    <footer>
        <div class="border-bottom border-color-light-white py-2-5 py-md-2-9 mb-6 mb-md-8 mb-lg-9 bg-img cover-background" data-background="/images/cdlworker-end-page.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 mb-1-9 mb-lg-0"></div>
                    <div class="col-lg-4 mb-1-9 mb-lg-0">
                        <div class="media">
                            <div class="footer-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <h5 class="text-white">Phone:</h5>
                                <a href="tel:{{ $settings->phone }}" class="text-white mb-0">{{ $settings->phone }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="media">
                            <div class="footer-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <h5 class="text-white">E-mail:</h5>
                                <p class="text-white mb-0 word-break">{{ $settings->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mb-1-9 mb-lg-0"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-2-5 mb-lg-0">
                    <div class="w-80 mb-1-6">
                        <img src="/assets/img/logo_white/{{ $settings->logo_white }}" alt="{{ $settings->title }}"/>
                    </div>
                    <p class="mb-1-6 text-white">
                        {!! strip_tags($settings->description) !!}
                    </p>
                    <ul class="footer-social-icon">
                        <li>
                            <a href="{{ $settings->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="{{ $settings->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="{{ $settings->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li class="mr-0">
                            <a href="{{ $settings->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-2-5 mb-lg-0">
                    <div class="pl-md-1-6 pl-lg-1-9">
                        <h3 class="h5 text-white mb-1-6">Quick Link</h3>
                        <ul class="footer-list">
                            @foreach($staticpages as $index => $staticpage)
                                <li @if($index === count($staticpages)-1) class="border-none pb-0 mb-0" @endif><a
                                        href="/{{ $staticpage->slug }}">{{ $staticpage->title }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-2-5 mb-md-0">
                    <div class="pl-lg-1-9 pl-xl-2-5">
                        <h3 class="h5 text-white mb-1-6">Services</h3>
                        <ul class="footer-list">
                            @foreach($categories as $index => $cat)
                                <li @if($index === count($categories)-1) class="border-none pb-0 mb-0" @endif><a
                                        href="/service/{{ $cat->slug }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pl-md-1-6 pl-lg-1-9">
                        <h3 class="h5 text-white mb-1-6">Recent Post</h3>
                        @foreach($blogsFooter as $blog)
                        <div class="media mb-1-6 align-middle">
                            <img class="mr-3" src="/assets/img/blogs/thumbnails/{{ $blog->image }}" alt="{{ $blog->title }}" style="max-width: 100px;"/>
                            <div class="media-body align-self-center">
                                <h4 class="text-white h6"><a href="/blog/{{ $blog->slug }}" class="text-white">{{ $blog->title }}</a></h4>
                                <p class="text-white mb-0">{{ $blog->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bar border-top border-color-light-white mt-6 mt-md-8 mt-lg-9">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="display-31 display-sm-30 display-sm-29 mb-0 text-white">
                            &copy; {{ Date('Y') }} {{ $settings->title }} Powered by
                            <a href="https://pingdevs.com" target="_blank">Pingdevs</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer section -->

</div>
<!-- end main-wrapper section -->

<!-- start scroll to top -->
<a href="/assets/#" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<!-- end scroll to top -->

<!-- all js include start -->

<!-- jQuery -->

<script src="/assets/js/jquery.new.js"></script>

<!-- modernizr js -->
<script src="/assets/js/modernizr.js"></script>

<!-- bootstrap -->
<script src="/assets/js/bootstrap.min.js"></script>



<!-- navigation -->
<script src="/assets/js/nav-menu.js"></script>

<!-- tab -->
<script src="/assets/js/easy.responsive.tabs.js"></script>

<!-- owl carousel -->
<script src="/assets/js/owl.carousel.js"></script>

<!-- jquery.counterup.min -->
<script src="/assets/js/jquery.counterup.min.js"></script>

<!-- stellar js -->
<script src="/assets/js/jquery.stellar.min.js"></script>

<!-- waypoints js -->
<script src="/assets/js/waypoints.min.js"></script>

<!-- jquery.magnific-popup js -->
<script src="/assets/js/jquery.magnific-popup.min.js"></script>

<!-- custom scripts -->
<script src="/assets/js/main.js"></script>


<script src="/assets/js/jquery.fitvids.js"></script>
<script src="/assets/js/jquery.wallpaper.js"></script>
<script src="/assets/js/jquery.async-images.js"></script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">

    var route = "{{ route('all.search') }}";
    $('#mainsearch').typeahead({
        minLength: 0,
        source: function (query, process) {
            return $.get(route, {
                query: query
            }, function (data) {
                console.log(data);

                let  result = [];

                if(data.job) {
                    data.job.forEach(function(job) {
                        result.push(job.title);
                        result.push(job.salary);
                        result.push(job.equipment);
                        result.push(job.place);
                    });
                }



                return process(result);
            });
        }
    });


    $.asyncImages();
</script>
<!-- all js include end -->

@foreach($scripts as $script)
    {!! $script->description !!}
@endforeach
    @yield('scripts')
</body>

</html>
