@extends('layouts.frontend')
@section('meta')
    <meta name="description" content="CDL Worker - Apply Now for CDL Truck Driver Jobs"/>
    <meta name="Author" content="CDLWorker"/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="CDL Jobs - Truck Driver Jobs with The Best Recruitment Agency">
    <meta itemprop="description" content="{!! strip_tags($category->homepage_description) !!}">
    <meta itemprop="image" content="{{ env('APP_URL') }}/assets/img/categories/medium/{{ $category->image }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ url()->full() }}">
    <meta name="twitter:title" content="CDL Jobs - Truck Driver Jobs with The Best Recruitment Agency">
    <meta name="twitter:description" content="{!! strip_tags($category->homepage_description) !!}">
    <meta name="twitter:creator" content="CDLWORKER">
    <meta name="twitter:image" content="/assets/img/categories/medium/{{ $category->image }}">

    <!-- Open Graph data -->
    <meta property="fb:app_id" content="414881072500201"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:title" content="CDL Jobs - Truck Driver Jobs with The Best Recruitment Agency"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ url()->full() }}"/>
    <meta property="og:image" content="/assets/img/categories/medium/{{ $category->image }}"/>
    <meta property="og:description" content="{!! strip_tags($category->homepage_description) !!}"/>
    <meta property="og:site_name" content="CDLWorker"/>
@endsection
@section('content')

    <!-- start page title section -->
    <section class="page-title-section bg-img cover-background top-position theme-overlay-dark" data-overlay-dark="5"
             data-background="/assets/img/categories/medium/{{ $category->image }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $category->name }}</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">{{  $category->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start warehousing page -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 order-2 order-lg-1">
                    <div class="sidebar pr-lg-1-6">
                        <div class="widget">
                            <h4 class="widget-title">Our Services</h4>
                            <div class="widget-body">
                                <ul class="services-list">

                                    @foreach($categories as $index => $cat)
                                        <li @if($category->slug === $cat->slug ) class="active" @endif>
                                            <a href="/service/{{ $cat->slug }}">
                                                {{  $cat->name }} </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Contact Info</h4>
                            <div class="widget-body">
                                <ul class="address-list">
                                    <li>
                                        <div class="media">
                                            <i class="fas fa-mobile-alt"></i>
                                            <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i class="far fa-envelope"></i>
                                            <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p class="mb-0">{{ $settings->address }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i class="far fa-clock"></i>
                                            <p class="mb-0">9:00 AM – 8:00 PM</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget-contact">
                            <h4 class="widget-title">Request a call back</h4>
                            <div class="widget-body">
                                <form class="quform" action="quform/contact.php" method="post"
                                      enctype="multipart/form-data" onclick="" id="contactForm">
                                    @csrf

                                    <div class="quform-elements">

                                        <div class="row">

                                            <!-- Begin Text input element -->
                                            <div class="col-md-12">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="name" type="text" name="name"
                                                               placeholder="Your name here"/>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Text input element -->
                                            <div class="col-md-12">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="email" type="text" name="email"
                                                               placeholder="Your email here"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Text input element -->
                                            <div class="col-md-12">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="subject" type="text"
                                                               name="subject" placeholder="Your subject here"/>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Text input element -->
                                            <div class="col-md-12">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="phone" type="text" name="phone"
                                                               placeholder="Your phone here"/>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Textarea element -->
                                            <div class="col-md-12">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <textarea class="form-control" id="message" name="message"
                                                                  rows="3" placeholder="Tell us a few words"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Textarea element -->


                                            <!-- Begin Submit button -->
                                            <div class="col-md-12">
                                                <div class="quform-submit-inner">
                                                    <button class="butn theme sm btn-block" type="submit">
                                                        <span>Submit</span></button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p id="successMessage"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Submit button -->

                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                        @if($category->file)
                            <div class="widget">
                                <h4 class="widget-title">Brochures</h4>
                                <div class="widget-body">
                                    <ul class="widget-brochure">
                                        <li>
                                            <a href="/files/categories/{{ $category->file }}"
                                               class="letter-spacing-1"><i
                                                    class="far fa-file-pdf"></i>{{ $category->file }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-8 order-1 order-lg-2 mb-2-9 mb-lg-0">

                    <div class="row">
                        <div class="col-lg-12" id="content">
                            {!! $category->desc !!}
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="mb-1-6">Our Work Benefits</h3>
                            <div id="accordion" class="accordion-style">
                                @foreach($questionsAnswers as $index => $qa)
                                    <div class="card">
                                        <div class="card-header" id="heading-{{ $qa->id }}">
                                            <h5 class="mb-0">

                                                <button class="btn btn-link" data-toggle="collapse"
                                                        data-target="#collapse-{{ $qa->id }}"
                                                        aria-expanded="@if($index === 0){{ "true" }}@else{{ "false" }}@endif"
                                                        aria-controls="collapse-{{ $qa->id }}">
                                                    {{ $qa->question }}
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse-{{ $qa->id }}"
                                             class="collapse @if($index === 0){{ "show" }}@else{{ "collapsed" }}@endif"
                                             aria-labelledby="heading-{{ $qa->id }}" data-parent="#accordion">
                                            <div class="card-body">
                                                {!! $qa->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start warehousing page -->

@endsection

@section('scripts')
    <script>
        let allHref = $("#content").find("a");

        allHref.each(function () {
            $(this).addClass("butn").addClass("butn-md").addClass("theme");
            console.log($(this).parent().addClass("text-center").addClass("m-5"));
        });

    </script>


    <script>
        $("#contactForm").on("submit", function (e) {
            e.preventDefault();
            let token = $('input[name="_token"]').val();


            $.ajax({
                url: "{{ route('contact.form') }}",
                data: JSON.stringify($("#contactForm").serialize()),
                method: 'POST',
                headers: {
                    'X-CSRF-Token': token
                },
                success: function (data) {
                    $("#contactForm").trigger("reset");
                    $("#successMessage").html("Just to let you know we received your message and we will get back to you as soon as possible.")

                    // Just to let you know we received your message and we will get back to you as soon as possible.
                },
                error: function (data) {
                    console.log(data);
                }
            });

        });

    </script>
@endsection


