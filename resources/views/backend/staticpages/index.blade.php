@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card table-card table-nowrap mb-3 mb-lg-5">
                <div class="card-header">
                    <a href="/admin/static_pages/create" class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    add_circle
                                                    </span>Create Page</a>
                    @if(Session::has('flash_message'))
                        <p class="alert alert-danger">{{ Session::get('flash_message') }}</p>
                    @endif
                </div>


                <div class="table-responsive table-card table-nowrap">
                    <table class="table align-middle table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($static_pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="/assets/img/static_pages/thumbnails/{{ $page->image }}" class="avatar sm rounded-circle"
                                                 alt="">
                                        </div>



                                    </div>
                                </td>
                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $page->title }}</h6>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{!!  Str::limit(strip_tags($page->description), 20, '...') !!}</h6>

                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <a href="/admin/static_pages/{{ $page->id }}" data-tippy-content="View">
                                        <span
                                            class="material-symbols-rounded align-middle fs-5 text-body">visibility</span>
                                        </a>
                                        <!--Divider line-->
                                        <span class="border-start mx-2 d-block height-20"></span>
                                        <a href="/admin/static_pages/{{ $page->id }}/edit" data-tippy-content="Edit">
                                            <span
                                                class="material-symbols-rounded align-middle fs-5 text-body">edit</span>
                                        </a>
                                        <!--Divider line-->
                                        <span class="border-start mx-2 d-block height-20"></span>
                                        <form action="{{ route('static_pages.destroy', $page->id )}}" method="post" class="areyousure">
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
        </div>
    </div>
@endsection
