@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-offset-1 col-sm-offset-1 col-lg-12 col-sm-12 col-xs-12">

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif


            <div class="row">
                <div class="col-12 mb-3 mb-lg-5">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-1">Settings</h5>

                            @if(Session::has('flash_message'))
                                <p class="alert alert-info">{{ Session::get('flash_message') }}</p>
                            @endif
                        </div>
                        <div class="card-body">
                            <form class="row g-3" method="post" action="{{ route('settings.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputImage" data-tippy-placement="bottom"
                                           data-tippy-content="Upload image" class="btn btn-primary me-3">
                                        Upload Logo
                                    </label>
                                    <input type="file"
                                           class="form-control d-none w-0 h-0 position-absolute @error('image') is-invalid @enderror"
                                           id="inputImage" name="logo">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="logo_white" data-tippy-placement="bottom"
                                           data-tippy-content="Upload image" class="btn btn-primary me-3">
                                        Upload Logo white Version
                                    </label>
                                    <input type="file"
                                           class="form-control d-none w-0 h-0 position-absolute @error('logo_white') is-invalid @enderror"
                                           id="logo_white" name="logo_white">

                                    @error('logo_white')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label for="meta_image" data-tippy-placement="bottom"
                                           data-tippy-content="Upload image" class="btn btn-primary me-3">
                                        Upload Meta Image
                                    </label>
                                    <input type="file"
                                           class="form-control d-none w-0 h-0 position-absolute @error('meta_image') is-invalid @enderror"
                                           id="meta_image" name="meta_image">

                                    @error('meta_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="title" class="form-label">Page title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title" name="title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="mainurl" class="form-label">Main URL</label>
                                    <input type="text" class="form-control @error('mainurl') is-invalid @enderror"
                                           id="mainurl" name="mainurl">
                                    @error('mainurl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                           id="address" name="address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                           id="phone" name="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="twitter" class="form-label">Twitter</label>
                                    <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                           id="twitter" name="twitter">
                                    @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                           id="facebook" name="facebook">
                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="skype" class="form-label">Skype</label>
                                    <input type="text" class="form-control @error('skype') is-invalid @enderror"
                                           id="skype" name="skype">
                                    @error('skype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror"
                                           id="linkedin" name="linkedin">
                                    @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                           id="instagram" name="instagram">
                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="gplus" class="form-label">Google Business</label>
                                    <input type="text" class="form-control @error('gplus') is-invalid @enderror"
                                           id="gplus" name="gplus">
                                    @error('gplus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" id="searchmap" class="form-control">
                                        <div id="map-canvas"></div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-12 mb-5">
                                    <textarea name="description" id="description" placeholder="Textarea"
                                              class="form-control ckeditor"></textarea>
                                </div>


                                <div class="col-md-12">
                                    <label for="user_id" class="form-label">Editor</label>
                                    <select id="user_id" class="form-select" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                    @if(Auth::user()->id == $user->id) selected @endif >{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Hidden inputs -->

                                <input type="hidden" name="creator" value="{{ Auth::user()->id  }}">
                                <input type="hidden" id="lat" class="form-control" name="lat">
                                <input type="hidden" id="lng" class="form-control" name="lng">


                                <div class="col-12 col-md-12 mb-4">
                                    <button class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    check_circle
                                                    </span> Save
                                    </button>

                                    <a href="/admin/users" class="btn btn-secondary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    arrow_back_ios
                                                    </span> Back</a>
                                </div>
                                <!-- Hidden inputs -->


                                <input type="hidden" id="lat" class="form-control" name="lat">
                                <input type="hidden" id="lng" class="form-control" name="lng">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DO TUKA -->


            @endsection


            @section('scripts')
                    <!-- Google Maps -->
                    <script type="text/javascript"
                            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAS05zxYcZTGI-KfGAk8l0xNC2eCWfNsPw"></script>

                    <script>

                        $(document).ready(function () {
// Google Maps


                            map = new google.maps.Map(document.getElementById('map-canvas'), {
                                center: {lat: 41.9981294, lng: 21.4254355 },
                                zoom: 10
                            });

                            var marker = new google.maps.Marker({
                                position: {lat: 41.9981294, lng: 21.4254355 },
                                map: map,
                                draggable: true
                            });

                            var input = document.getElementById('searchmap');
                            var searchBox = new google.maps.places.SearchBox(input);
                            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

                            google.maps.event.addListener(searchBox, 'places_changed', function () {
                                var places = searchBox.getPlaces();
                                var bounds = new google.maps.LatLngBounds();
                                var i, place;
                                for (i = 0; place = places[i]; i++) {
                                    bounds.extend(place.geometry.location);
                                    marker.setPosition(place.geometry.location);
                                }
                                map.fitBounds(bounds);
                                map.setZoom(15);

                            });

                            google.maps.event.addListener(marker, 'position_changed', function () {
                                var lat = marker.getPosition().lat();
                                var lng = marker.getPosition().lng();

                                $('#lat').val(lat);
                                $('#lng').val(lng);
                            });


                            $("form").bind("keypress", function (e) {
                                if (e.keyCode == 13) {
                                    $("#searchmap").attr('value');
                                    //add more buttons here
                                    return false;
                                }
                            });

                        });

                    </script>


@endsection
