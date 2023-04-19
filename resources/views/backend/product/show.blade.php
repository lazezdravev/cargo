@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="pt-3 px-3 px-lg-6 overflow-hidden">
            <img src="/assets/img/products/medium/{{ $product->image }}" class="img-fluid rounded-5 mb-3 mb-lg-0 shadow-lg" alt="">
            <div class="row align-items-lg-end align-items-center mx-lg-0 mb-4 mb-lg-0">
                <div class="col-auto px-lg-5">

                    <!-- Avatar -->
                    <div class="avatar xxl rounded-4 p-1 bg-body overflow-hidden position-relative mt-lg-n5">
                        <img src="/assets/img/products/thumbnails/{{ $product->image }}" alt="..." class="img-fluid rounded-4">
                    </div>

                </div>
                <div class="col mb-3 px-lg-5">
                    <div class="row align-items-md-end">
                        <div class="col-12 col-md">

                            <!-- Profile Subtitle -->
                            <span class="text-muted small d-block pt-3 mb-1">
                                                    {{ $product->created_at->diffForHumans() }}
                                                </span>

                            <!--Profile Title -->
                            <h3 class="profile-title mb-0">
                                {{ $product->title }}
                            </h3>
                            <p>
                                {{ $product->link }}
                            </p>
                        </div>





                    </div>

                </div>


            </div>

            <div class="row mb-3 px-lg-5" >
                <div class="col-12">

                    <!-- Subscribe Button -->
                    <p>
                        {!! $product->description !!}
                    </p>



                </div>

                @foreach($product->images->chunk(4) as $index => $chunk)
                    <div class="row mb-3">
                        @foreach($chunk as $image)
                            <div class="col-lg-3 col-md-3 col-3">

                                <img class="img-fluid img-thumbnail"
                                     src="/assets/img/sliders/thumbnails/{{$image->image}}"
                                     alt="{{$image->name}}">


                                <div class="pull-right" style="text-align: right;margin-right: 37px; display: block;">

                                    <form action="{{ route('sliders.destroy', $image->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">

                                            <span class="material-symbols-rounded"> delete </span> <!--Result-->

                                        </button>
                                    </form>
                                </div>

                                <div class="nova" style="position: relative; top: -30px; width: 55px;">
                                    <form action="{{ route('sliders.frontpage', $image) }}" method="POST">
                                        @csrf
                                        <label for="front-page">New</label>
                                        <input type="hidden" class="image-id" name="image-id" value="{{ $image->id }}">
                                        <input type="checkbox" name="front_page" class="front-page"
                                               value="{{ $image->front_page }}" @if($image->front_page) checked @endif>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix" style="padding-bottom: 10px"></div>
                @endforeach
            </div>


        </div>
    </div>
@endsection
