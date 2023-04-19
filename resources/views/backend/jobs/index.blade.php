@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card table-card table-nowrap mb-3 mb-lg-5">
                <div class="card-header">
                    <a href="/admin/jobs/create" class="btn btn-primary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    add_circle
                                                    </span>Create Job</a>
                    @if(Session::has('flash_message'))
                        <p class="alert alert-danger">{{ Session::get('flash_message') }}</p>
                    @endif
                </div>


                <div class="table-responsive table-card table-nowrap">
                    <table class="table align-middle table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Place</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Option</th>
                            <th>Experience</th>
                            <th>Equipment</th>
                            <th>Salary</th>
                            <th>Description</th>
                            <th>Applicants</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->place }}</td>
                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $job->title }}</h6>

                                    </div>
                                </td>
                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0"><span class="badge bg-info fs-6">{{ $job->type }}</span></h6>

                                    </div>
                                </td>
                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0"><span class="badge bg-success fs-6">{{ $job->option }}</span></h6>

                                    </div>
                                </td>
                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $job->experience }}</h6>

                                    </div>
                                </td>
                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $job->equipment }}</h6>

                                    </div>
                                </td>
                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $job->salary }}</h6>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{!!  Str::limit(strip_tags($job->description), 20, '...') !!}</h6>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $job->applicants->count() }}</h6>

                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <a href="/admin/jobs/{{ $job->id }}" data-tippy-content="View">
                                        <span
                                            class="material-symbols-rounded align-middle fs-5 text-body">visibility</span>
                                        </a>
                                        <!--Divider line-->
                                        <span class="border-start mx-2 d-block height-20"></span>
                                        <a href="/admin/jobs/{{ $job->id }}/edit" data-tippy-content="Edit">
                                            <span
                                                class="material-symbols-rounded align-middle fs-5 text-body">edit</span>
                                        </a>
                                        <!--Divider line-->
                                        <span class="border-start mx-2 d-block height-20"></span>
                                        <form action="{{ route('jobs.destroy', $job->id )}}" method="post"
                                              class="areyousure">
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
