<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metas -->
    <meta charset="utf-8" />
    <meta name="author" content="Pingdevs" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    @yield('meta')

    <!-- title  -->
    <title>{{ $settings->title }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="/assets/img/logo/thumbnails/{{ $settings->logo }}" />
    <link rel="apple-touch-icon" href="/assets/img/logo/thumbnails/{{ $settings->logo }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/logo/thumbnails/{{ $settings->logo }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/logo/thumbnails/{{ $settings->logo }}" />

    <!-- plugins -->
    <link rel="stylesheet" href="/assets/css/plugins.css">


    <!-- quform css -->
    <link rel="stylesheet" href="/assets/quform/css/base.css">

    <!-- core style css -->
    <link href="/assets/css/styles.css" rel="stylesheet">

    <!-- custom css -->

    <link href="/assets/css/wallpaper.css" rel="stylesheet">


    <link href="/assets/css/custom.css" rel="stylesheet">
</head>

<body>
<!-- start page loading -->
<div id="preloader">
    <div class="row loader">
        <div class="loader-icon"></div>
    </div>
</div>
<!-- end page loading -->
