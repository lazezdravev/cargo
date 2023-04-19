@extends('layouts.backend')

@section('content')

    <div class="container">
        <h1> {{$category->name}}</h1>
        @foreach($category->gallery as $image)
            <div class="row text-center text-lg-left">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="btn-group pull-right">
                        <form action="{{ route('gallery.destroy', $image) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                    <img class="img-fluid img-thumbnail" src="/assets/img/gallery/thumbnails/{{$image->image}}"
                         alt="{{$image->name}}">
                </div>
            </div>
            <br>
        @endforeach
    </div>
@endsection
