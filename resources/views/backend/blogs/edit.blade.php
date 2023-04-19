@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-12 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Edit Blog</h5>

                    @if(Session::has('flash_message'))
                        <p class="alert alert-info">{{ Session::get('flash_message') }}</p>
                    @endif
                </div>
                <div class="card-body">

                    <div class="col-md-12">
                        <img src="/assets/img/blogs/medium/{{ $blog->image }}" alt="blog" />
                    </div>
                    <form class="row g-3" method="post" action="{{ route('blogs.update', $blog->id) }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
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



                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $blog->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                   name="slug" value="{{ $blog->slug }}">
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                   name="meta_title" value="{{ $blog->meta_title }}">
                            @error('meta_title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-12 mb-5">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description"
                                      class="form-control">{{ $blog->meta_description }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="keywords" class="form-label">Keywords</label>
                            <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                                   name="keywords" value="{{ $blog->keywords }}">
                            @error('keywords')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-12 mb-5">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" placeholder="Textarea"
                                      class="form-control ckeditor">{{ $blog->description }}</textarea>
                        </div>


                        <div class="col-md-12">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" data-role="tagsinput" class="form-control" id="tags" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ $blog->tags }}">
                            @error('tags')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>



                        <div class="col-md-12">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author"
                                   name="author" @error('author') aria-invalid="true" @enderror value="{{ $blog->author }}">
                        </div>
                        @error('author')
                        <label id="author-error"
                               class="error px-3 py-1 bg-danger text-white rounded-2 invalid-feedback"
                               for="author">{{ $message }}</label>
                        @enderror



                        <div class="col-12">
                            <button class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    check_circle
                                                    </span> Save</button>

                            <a href="/admin/blogs" class="btn btn-secondary mb-2 me-2">
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
        $(function () {
            $('input')
                .on('change', function (event) {


                    var $element = $(event.target);


                    var $container = $element.closest('#tags');

                    if (!$element.data('tagsinput')) return;

                    var val = $element.val();
                    if (val === null) val = 'null';
                    var items = $element.tagsinput('items');



                    $('code', $('pre.val', $container)).html(
                        $.isArray(val)
                            ? JSON.stringify(val)
                            : '"' + val.replace('"', '\\"') + '"'
                    );
                    $('code', $('pre.items', $container)).html(
                        JSON.stringify($element.tagsinput('items'))
                    );
                })
                .trigger('change');
        });
    </script>
@endsection

