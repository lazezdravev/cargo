@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Service</h5>


                </div>
                <div class="card-body">
                    <form class="row g-3" method="post" action="{{ route('categories.store') }}"
                          enctype="multipart/form-data">
                        @csrf


                        <div class="col-md-12">
                            <label for="homepage_icon" data-tippy-placement="bottom"
                                   data-tippy-content="Upload image" class="btn btn-primary me-3">
                                Upload Homepage Icon
                            </label>
                            <input type="file"
                                   class="form-control d-none w-0 h-0 position-absolute @error('homepage_icon') is-invalid @enderror"
                                   id="homepage_icon" name="homepage_icon">

                            @error('homepage_icon')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="homepage_image" data-tippy-placement="bottom"
                                   data-tippy-content="Upload image" class="btn btn-primary me-3">
                                Upload Homepage Image
                            </label>
                            <input type="file"
                                   class="form-control d-none w-0 h-0 position-absolute @error('homepage_image') is-invalid @enderror"
                                   id="homepage_image" name="homepage_image">

                            @error('homepage_image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="homepage_title" class="form-label">Homepage Title</label>
                            <input type="text" class="form-control @error('homepage_title') is-invalid @enderror"
                                   id="homepage_title" name="homepage_title">
                            @error('homepage_title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="homepage_description" class="form-label">Homepage Description</label>
                            <textarea name="homepage_description" id="homepage_description" placeholder="Textarea"
                                      class="form-control ckeditor"></textarea>
                            @error('homepage_description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="inputImage" data-tippy-placement="bottom"
                                   data-tippy-content="Upload image" class="btn btn-primary me-3">
                                Upload Image
                            </label>
                            <input type="file"
                                   class="form-control d-none w-0 h-0 position-absolute @error('image') is-invalid @enderror"
                                   id="inputImage" name="image">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="desc" id="description" placeholder="Textarea"
                                      class="form-control ckeditor"></textarea>
                            @error('desc')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="parent_id" class="form-label">Sub service</label>
                            <select id="parent_id" class="form-select" name="parent_id">
                                <option value="">Main Service</option>
                                {!! $categories !!}
                            </select>
                        </div>


                        <div class="col-12 col-md-12 mb-4">
                            <button class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    check_circle
                                                    </span> Save
                            </button>

                            <a href="/admin/categories" class="btn btn-secondary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    arrow_back_ios
                                                    </span> Back</a>
                        </div>

                    </form>
                </div>
            </div>

@endsection
