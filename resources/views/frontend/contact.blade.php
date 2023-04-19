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
             data-background="/images/cdlworker-contact.png">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start contact section  -->
    <section class="contact-form pb-0">
        <div class="container">
            <div class="section-heading">
                <h2 class="display-20 display-md-18 display-lg-16">Get In Touch</h2>

            </div>
            <div class="contact-wrapper-box">

                <div class="row mb-2-5 mb-lg-7">
                    <div class="col-lg-6">
                        <div id="map-canvas"></div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form-area">
                            <h3 class="mb-1-6">Call us or fill in the form</h3>
                            <form action="{{ route('contact.form') }}" method="post"
                                  enctype="multipart/form-data" id="contactForm">
                                @csrf
                                <div class="quform-elements">

                                    <div class="row">

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">Your Name <span
                                                        class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="name" type="text" name="name"
                                                           placeholder="Your name here" required/>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email">Your Email <span
                                                        class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="email" type="text" name="email"
                                                           placeholder="Your email here" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="subject">Your Subject <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="subject" type="text" name="subject"
                                                           placeholder="Your subject here" required/>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="phone">Contact Number<span
                                                        class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="phone" type="tel" name="phone"
                                                           placeholder="Your phone here" required/>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Textarea element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="message">Message <span
                                                        class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <textarea class="form-control" id="message" name="message" rows="3"
                                                              placeholder="Tell us a few words" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Textarea element -->



                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="butn theme butn-md" type="submit">
                                                    <span>Send Message</span></button>
                                            </div>
                                        </div>
                                        <!-- End Submit button -->

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p id="successMessage"></p>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end contact section -->
@endsection
@section('scripts')
    <script>
        $("#contactForm").on("submit", function(e) {
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

    <!-- Google Maps -->
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAS05zxYcZTGI-KfGAk8l0xNC2eCWfNsPw"></script>

    <script>

        $(document).ready(function () {
// Google Maps

            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: {{ $settings->lat }}, lng: {{ $settings->lng }}},
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: {lat: {{ $settings->lat }}, lng: {{ $settings->lng }}},
                map: map,
                draggable: false
            });

        });

    </script>
@endsection
