@extends('layouts.backend')
@section('content')
    <div class="row">
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
                        @foreach($jobApplicants as $applicant)
                            <tr>
                                <td>{{ $applicant->job->title }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ $applicant->firstName }}</h6>
                                            <small class="text-muted">{{ $applicant->created_at->diffForHumans() }}</small>
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
    </div>
@endsection
