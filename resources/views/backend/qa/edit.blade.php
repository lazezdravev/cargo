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


                <form action="{{ route('qa.update', $qa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="cat_id" value="{{ $qa->cat_id }}">


                    <div class="col-md-12">
                        <label for="title" class="form-label">Question</label>
                        <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" value="{{ $qa->question }}">
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>



                    <div class="col-12 col-md-12 mb-5">
                        <label for="answer">Answer</label>
                        <textarea name="answer" id="description" placeholder="Textarea"
                                  class="form-control ckeditor">{{ $qa->answer }}</textarea>
                    </div>


                    <div class="col-12 col-md-12 mb-4">
                        <button class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    check_circle
                                                    </span> Update
                        </button>

                        <a href="/admin/categories" class="btn btn-secondary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    arrow_back_ios
                                                    </span> Back</a>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
