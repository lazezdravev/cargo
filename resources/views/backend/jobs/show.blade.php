@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="pt-3 px-3 px-lg-6 overflow-hidden">

            <div class="row align-items-lg-end align-items-center mx-lg-0 mb-4 mb-lg-0">

                <div class="col mb-3 px-lg-5">
                    <div class="row align-items-md-end">
                        <div class="col-12 col-md">

                            <!-- Profile Subtitle -->
                            <span class="text-muted small d-block pt-3 mb-1">
                                                    {{ $job->created_at->diffForHumans() }}
                                                </span>

                            <!--Profile Title -->
                            <h3 class="profile-title mb-0">
                                {{ $job->title }}
                            </h3>

                            <p>{{ $job->type }}</p>
                            <p>{{ $job->option }}</p>
                            <p>{{ $job->experience }}</p>
                            <p>{{ $job->equipment }}</p>
                            <p>{{ $job->salary }}</p>


                        </div>



                    </div>

                </div>

            </div>

            <div class="row mb-3 px-lg-5" >
                <div class="col-12">

                    <!-- Subscribe Button -->
                    <p>
                        {!! $job->description !!}
                    </p>



                </div>
            </div>

            <div class="col-12">
                <div class="card table-card table-nowrap mb-3 mb-lg-5">


                    <div class="table-responsive table-card table-nowrap">
                        <table class="table align-middle table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Job</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>State</th>
                                <th>City</th>
                                <th class="text-end">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($job->applicants as $applicant)
                                <tr>
                                    <td>{{ $applicant->job->title }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $applicant->firstName }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $applicant->lastName }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $applicant->email }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $applicant->phone }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $applicant->state }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $applicant->city }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $applicant->created_at->diffForHumans() }}</h6>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-12">


                <a href="/admin/jobs" class="btn btn-secondary mb-2 me-2">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    arrow_back_ios
                                                    </span> Back</a>
            </div>


        </div>
    </div>
@endsection
