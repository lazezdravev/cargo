@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-12 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Обнови Услуга</h5>

                    @if(Session::has('flash_message'))
                        <p class="alert alert-info">{{ Session::get('flash_message') }}</p>
                    @endif
                </div>
                <div class="card-body">

                    <div class="col-md-12">
                        <img src="/assets/img/referrals/medium/{{ $referral->image }}" alt="referral" />
                    </div>
                    <form class="row g-3" method="post" action="{{ route('referrals.update', $referral->id) }}" enctype="multipart/form-data">
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
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $referral->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>



                        <div class="col-12 col-md-12 mb-5">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" placeholder="Textarea"
                                      class="form-control ckeditor">{{ $referral->description }}</textarea>
                        </div>




                        <div class="col-12">
                            <button class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    check_circle
                                                    </span> Обнови</button>

                            <a href="/admin/referrals" class="btn btn-secondary mb-2 me-2">
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

