@extends('layouts.backend')
@section('content')
    <div class="container">
        <div class="row">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="col-12">
                <h1 style="text-align: center">Add images to: {{ $product->title }}</h1>
                <hr>
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">


                    <div class="col-md-12 mb-4">
                        <label for="inputImage" data-tippy-placement="bottom"
                               data-tippy-content="Upload image" class="btn btn-primary me-3">
                            Upload images
                        </label>
                        <input type="file"
                               class="form-control d-none w-0 h-0 position-absolute @error('image') is-invalid @enderror"
                               id="inputImage" name="images[]" multiple>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="col-12 col-md-12 mb-4">
                        <button class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    check_circle
                                                    </span> Upload
                        </button>

                        <a href="/admin/products" class="btn btn-secondary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    arrow_back_ios
                                                    </span> Back</a>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
