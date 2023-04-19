@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-12 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Edit Script</h5>

                    @if(Session::has('flash_message'))
                        <p class="alert alert-info">{{ Session::get('flash_message') }}</p>
                    @endif
                </div>
                <div class="card-body">


                    <form class="row g-3" method="post" action="{{ route('scripts.update', $script->id) }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf



                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $script->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>



                        <div class="col-12 col-md-12 mb-5">
                            <label for="description">Edit your script here:</label>
                            <textarea name="description" id="description" rows="10"
                                      class="form-control">{{ $script->description }}</textarea>
                        </div>




                        <div class="col-12">
                            <button class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    check_circle
                                                    </span> Save</button>

                            <a href="/admin/scripts" class="btn btn-secondary mb-2 me-2">
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

