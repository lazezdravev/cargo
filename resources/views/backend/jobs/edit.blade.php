@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-12 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Create Job</h5>

                    @if(Session::has('flash_message'))
                        <p class="alert alert-info">{{ Session::get('flash_message') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <img src="/assets/img/jobs/medium/{{ $job->image }}" alt="job" />
                    </div>
                    <form class="row g-3" method="post" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="inputImage" data-tippy-placement="bottom" data-tippy-content="Upload image" class="btn btn-primary me-3">
                                Upload image
                            </label>
                            <input type="file" class="form-control d-none w-0 h-0 position-absolute @error('image') is-invalid @enderror" id="inputImage" name="image">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $job->title }}">
                            @error('title')
                            <label id="title-error"
                                   class="error px-3 py-1 bg-danger text-white rounded-2 invalid-feedback"
                                   for="title">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ $job->type }}">
                            @error('type')
                            <label id="type-error"
                                   class="error px-3 py-1 bg-danger text-white rounded-2 invalid-feedback"
                                   for="type">{{ $message }}</label>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <div class="col-md-6 mb-3">
                                <label for="camStatus" class="form-label">Option</label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check me-3">
                                        <input type="radio" @if($job->option === "team") checked="" @endif name="option" id="sActive" class="form-check-input" value="team">
                                        <label for="sActive">Team</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input type="radio" @if($job->option === "solo") checked="" @endif name="option" id="sDeactive" class="form-check-input" value="solo">
                                        <label for="sDeactive">Solo</label>
                                    </div>
                                </div>
                                @error('option')
                                <label id="tags-error"
                                       class="error px-3 py-1 bg-danger text-white rounded-2 invalid-feedback"
                                       for="camStatus">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ $job->salary }}">
                            @error('salary')
                            <label id="salary-error"
                                   class="error px-3 py-1 bg-danger text-white rounded-2 invalid-feedback"
                                   for="salary">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="experience" class="form-label">Experience</label>
                            <input type="text" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" value="{{ $job->experience }}">
                            @error('experience')
                            <label id="experience-error"
                                   class="error px-3 py-1 bg-danger text-white rounded-2 invalid-feedback"
                                   for="experience">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="equipment" class="form-label">Equipment</label>
                            <input type="text" class="form-control @error('equipment') is-invalid @enderror" id="equipment" name="equipment" value="{{ $job->equipment }}">
                            @error('equipment')
                            <label id="equipment-error"
                                   class="error px-3 py-1 bg-danger text-white rounded-2 invalid-feedback"
                                   for="equipment">{{ $message }}</label>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="place" class="form-label">Place</label>
                            <input type="text" id="mapsearch" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ $job->place }}">
                            @error('place')
                            <label id="place-error"
                                   class="error px-3 py-1 bg-danger text-white rounded-2 invalid-feedback"
                                   for="place">{{ $message }}</label>
                            @enderror
                        </div>


                        <div class="col-12 col-md-12 mb-5">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" placeholder="Textarea"
                                      class="form-control ckeditor">{{ $job->description }}</textarea>
                            @error('description')
                            <label id="description_error"
                                   class="error px-3 py-1 bg-danger text-white rounded-2 invalid-feedback"
                                   for="description">{{ $message }}</label>
                            @enderror
                        </div>







                        <div class="col-12">
                            <button class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    check_circle
                                                    </span> Save</button>

                            <a href="/admin/jobs" class="btn btn-secondary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    arrow_back_ios
                                                    </span> Back</a>
                        </div>
                    </form>
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




            var input = document.getElementById('mapsearch');
            var searchBox = new google.maps.places.SearchBox(input);


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
