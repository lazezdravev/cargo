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
             data-background="/assets/img/jobs/medium/{{ $job->image }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Application</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="/">Application</a></li>
                        <li><a href="#">{{ $job->title }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start contact section  -->
    <section class="contact-form pb-0">
        <div class="container">

            <div class="text-center pb-4">
                <h2>Complete this form to have a recruiter contact you about our driver opportunities.</h2>

            </div>


            <div class="text-center pb-4">

                <h4>Apply for {{ $job->title }}</h4>
            </div>


            <div class="text-center pb-4">
                <p>{!!  $job->description !!}</p>
            </div>

            <div class="contact-wrapper-box">

                <div class="row mb-2-5 mb-lg-7">


                    <div class="col-lg-12">
                        <div class="contact-form-area">
                            <h3 class="mb-1-6">Let’s get started</h3>
                            <form action="{{ route('job.application', $job->id) }}" method="post"
                                  enctype="multipart/form-data" id="applicationForm">
                                @csrf
                                <div class="quform-elements">

                                    <div class="row">

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">First Name <span
                                                        class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="first_name" type="text" name="first_name" required/>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">Last Name <span
                                                        class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="last_name" type="text" name="last_name" required/>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Text input element -->


                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="phone">Contact Number <span
                                                        class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="phone" type="text" name="phone" required />
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
                                                    <input class="form-control" id="email" type="text" name="email" required />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->








                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="state">State</label>
                                                <div class="quform-input">
                                                    <select id="state" class="form-control" name="state">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AK">Alaska</option>
                                                        <option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="CA">California</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="DC">District Of Columbia</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WA">Washington</option>
                                                        <option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option>
                                                        <option value="WY">Wyoming</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="city">City</label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="city" type="text" name="city" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->






                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="butn theme butn-md" type="submit">
                                                    <span>Apply</span></button>
                                            </div>
                                        </div>
                                        <!-- End Submit button -->

                                    </div>


                                </div>

                            </form>


                            <div class="row">
                                <div class="col-md-12">
                                    <p id="successMessage"></p>
                                </div>
                            </div>
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
        $("#applicationForm").on("submit", function(e) {
            e.preventDefault();
            let token = $('input[name="_token"]').val();


            let sendData = {
                firstName: $("#first_name").val(),
                lastName: $("#last_name").val(),
                phone: $("#phone").val(),
                email: $("#email").val(),
                state: $("#state option:selected").text(),
                city: $("#city").val()
            }


            $.ajax({
                url: "{{ route('job.application', $job->id) }}",
                data: sendData,
                method: 'POST',
                headers: {
                    'X-CSRF-Token': token
                },
                success: function (data) {
                    $("#applicationForm").trigger("reset");
                    $("#successMessage").html("Just to let you know we received your application and we will get back to you as soon as possible.")
                },
                error: function (data) {
                    console.log(data);
                }
            });

        });

    </script>

    <script>
        let state = $('#state option:contains("{{ $geolocation->getRegion() }}")');
        $(state).prop('selected', true);
        $("#city").val("{{ $geolocation->getCity() }}");
    </script>


@endsection
