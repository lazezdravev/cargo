@extends('layouts.backend')
@section('content')

    <div class="container">
        @foreach($categories as $category)
            @if($category->gallery->count() > 0)
                <div class="row mb-3">

                    <h1 style="text-align: center">{{ $category->name }}</h1>
                    <div class="btn-group pull-right">
                        <a class="btn btn-danger btn-sm" href="/admin/categories/{{ $category->id }}/add-gallery">+
                            Upload Images</a>
                        <br/>

                    </div>
                </div>

                @foreach($category->gallery->chunk(4) as $index => $chunk)
                    <div class="row mb-3">
                        @foreach($chunk as $image)
                            <div class="col-lg-3 col-md-3 col-3">

                                <img class="img-fluid img-thumbnail"
                                     src="/assets/img/gallery/thumbnails/{{$image->image}}"
                                     alt="{{$image->name}}">


                                <div class="pull-right" style="text-align: right;margin-right: 37px; display: block;">
                                    <form action="{{ route('gallery.destroy', $image) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">

                                            <span class="material-symbols-rounded"> delete </span> <!--Result-->

                                        </button>
                                    </form>
                                </div>

                                <div class="nova" style="position: relative; top: -30px; width: 55px;">
                                    <form action="{{ route('gallery.frontpage', $image) }}" method="POST">
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
            @endif
        @endforeach
    </div>
@endsection

@section('scripts')
    <script>
        $("input[name=front_page]").on('change', function () {
            var form = $(this).parent("form");
            var id = $(form).find('.image-id').val();
            var front_page = $(form).find('.front-page').prop('checked');
            if (front_page) {
                front_page = 1;
            } else {
                front_page = 0;
            }
            var sendData = {id: id, front_page: front_page, _token: '{{ csrf_token() }}'};

            console.log(sendData);

            $.ajax({
                url: '/admin/gallery/frontpage/' + id,
                type: 'POST',
                data: sendData,
                dataType: 'JSON',
                success: function (data) {
                    console.log('success');
                }
            });

        });
    </script>
@endsection
