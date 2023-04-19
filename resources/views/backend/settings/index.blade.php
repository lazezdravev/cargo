@extends('layouts.backend')
@section('content')
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12">

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif

                <p>


                    <a href="/admin/settings/edit" class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    settings
                                                    </span> Settings</a>
                </p>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 mb-4 mb-lg-4">
                <div class="card">

                    <!-- Card Image -->

                    <img src="/assets/img/logo/medium/{{ $settings->logomedium }}" alt="..." class="card-img-top">


                    <!-- Card - Body -->
                    <div class="card-body mt-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-1">
                                    {{ $settings->title }}
                                </h6>
                                <small class="text-muted">
                                    {{ $settings->mainurl }}
                                </small>
                                <h6>
                                    <small class="text-muted">
                                        Last time edited: {{ $settings->updated_at->diffForHumans() }}
                                    </small>
                                </h6>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 mb-0 mb-lg-8">


                <div class="card h-100 table-card table-nowrap">
                    <div class="card-header">
                        <h5 class="mb-0">Links</h5>
                    </div>
                    <table class="mb-0 table">
                        <thead class="small text-uppercase bg-body text-muted">
                        <tr>
                            <th>Network</th>
                            <th>Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Youtube</td>
                            <td>
                                {{ $settings->youtube }}
                            </td>
                        </tr>
                        <tr>
                            <td>Facebook</td>
                            <td>
                                {{ $settings->facebook }}
                            </td>
                        </tr>
                        <tr>
                            <td>Instagram</td>
                            <td>
                                {{ $settings->instagram }}
                            </td>
                        </tr>
                        <tr>
                            <td>LinkedIn</td>
                            <td>
                                {{ $settings->linkedin }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h5 class="pe-3 mb-0">Information</h5>

                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush mb-0">


                            <li class="list-group-item bg-transparent px-4">
                                <div class="d-flex align-items-center">

                                    <div class="overflow-hidden flex-grow-1">
                                        <h6 class="mb-0 text-truncate">
                                            Address
                                        </h6>
                                        <span class="text-muted text-truncate d-block">{{ $settings->address }}</span>
                                    </div>
                                </div>
                            </li>

                            <!--List group-item begin-->
                            <li class="list-group-item bg-transparent px-4">
                                <div class="d-flex align-items-center">

                                    <div class="overflow-hidden flex-grow-1">
                                        <h6 class="mb-0 text-truncate">
                                            Phone
                                        </h6>
                                        <span class="text-muted text-truncate d-block">{{ $settings->phone }}</span>
                                    </div>
                                </div>
                            </li>
                            <!--List group-item begin-->
                            <li class="list-group-item bg-transparent px-4">
                                <div class="d-flex align-items-center">

                                    <div class="overflow-hidden flex-grow-1">
                                        <h6 class="mb-0 text-truncate">
                                            Email
                                        </h6>
                                        <span class="text-muted text-truncate d-block">{{ $settings->email }}</span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <h6 class="mb-1 p-2">
                                Logo White
                            </h6>
                            <img src="/assets/img/logo_white/{{ $settings->logo_white }}" alt="..."
                                 class="card-img-top">
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card">
                            <h6 class="mb-1 p-2">
                                Meta Image
                            </h6>
                            <img src="/assets/img/meta_image/{{ $settings->meta_image }}" alt="..."
                                 class="card-img-top">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h5 class="pe-3 mb-0">Description</h5>
                    </div>
                    <div class="card-body p-5">
                        <p>{!! $settings->description  !!}</p>
                    </div>
                </div>
            </div>


        </div>


        <div class="row p-2">
            <div class="col-12 pb-1-9">
                <div class="card">

                    <div class="card-body p-2">
                        <div id="map-canvas"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
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
