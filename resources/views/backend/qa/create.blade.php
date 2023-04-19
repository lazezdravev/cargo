@extends('layouts.backend')
@section('content')
    <div class="container">

        <div class="row">
            <div class="card table-responsive table-card table-nowrap">
                <table class="table align-middle table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th class="text-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questionsAnswers as $qa)
                        <tr>
                            <td>{{ $qa->id }}</td>

                            <td>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ $qa->question }}</h6>

                                </div>
                            </td>


                            <td>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{!!  Str::limit(strip_tags($qa->answer), 20, '...') !!}</h6>

                                </div>
                            </td>


                            <td>
                                <!--Divider line-->

                                <div class="d-flex justify-content-end align-items-center">
                                    <span class="border-start mx-2 d-block height-20"></span>
                                    <a href="/admin/qa/{{ $qa->id }}/edit" data-tippy-content="Edit">
                                            <span
                                                class="material-symbols-rounded align-middle fs-5 text-body">edit</span>
                                    </a>
                                    <span class="border-start mx-2 d-block height-20"></span>
                                    <form action="{{ route('qa.destroy', $qa->id )}}" method="post" class="areyousure">
                                        @csrf
                                        @method('delete')
                                        <button data-tippy-content="Delete">
                                            <span
                                                class="material-symbols-rounded align-middle fs-5 text-body">delete</span>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

            <div class="col-12">
                <h1 style="text-align: center">Add question to: {{ $category->name }}</h1>
                <hr>
                <form action="{{ route('qa.store', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="cat_id" value="{{ $category->id }}">


                    <div class="col-md-12">
                        <label for="title" class="form-label">Question</label>
                        <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question">
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>



                    <div class="col-12 col-md-12 mb-5">
                        <label for="answer">Answer</label>
                        <textarea name="answer" id="description" placeholder="Textarea"
                                  class="form-control ckeditor"></textarea>
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
    </div>
@endsection
