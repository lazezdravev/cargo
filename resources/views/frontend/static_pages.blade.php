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
    <section class="page-title-section bg-img cover-background top-position theme-overlay-dark" data-overlay-dark="5" data-background="/assets/img/static_pages/medium/{{ $static_page->image }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $static_page->title }}</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">{{ $static_page->title }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title section -->

    <section class="pt-0">
        <div class="container">
            <div class="section-heading">


            </div>
        </div>

    </section>
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $static_page->description !!}
                </div>
            </div>
        </div>
    </section>

@endsection
