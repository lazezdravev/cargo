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
                    <h5 class="mb-1">Products</h5>

                    @if(Session::has('flash_message'))
                        <p class="alert alert-info">{{ Session::get('flash_message') }}</p>
                    @endif
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 ">
                            <img src="/assets/img/products/medium/{{ $product->image }}" alt="Product"/>
                        </div>
                    </div>

                    <form class="row g-3" method="post" action="{{ route('products.update', $product->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-md-12">
                            <label for="inputImage" data-tippy-placement="bottom"
                                   data-tippy-content="Upload image" class="btn btn-primary me-3">
                                Upload image
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
                            <label for="title" class="form-label">Title на продукт</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ $product->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" placeholder="Textarea"
                                      class="form-control ckeditor">{{ $product->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" class="form-select" name="category">
                                {!! $categories !!}
                            </select>
                        </div>


                        <div class="col-md-12">
                            <label for="user_id" class="form-label">User</label>
                            <select id="user_id" class="form-select" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-12 col-md-12 mb-4">
                            <button class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    check_circle
                                                    </span> Промени
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
    </div>
@endsection
@section('scripts')
    <script>
        $('#category option[value="{{ $product->category }}"]').prop('selected', true);
        $('#user_id option[value="{{ $product->user_id }}"]').prop('selected', true);
    </script>
@endsection
