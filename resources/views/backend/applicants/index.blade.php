@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card table-card table-nowrap mb-3 mb-lg-5">


                <div class="table-responsive table-card table-nowrap">
                    <table class="table align-middle table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>State</th>
                            <th>City</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applicants as $applicant)
                            <tr>
                                <td>{{ $applicant->id }}</td>
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
                                    <div class="d-flex justify-content-end align-items-center">

                                        <!--Divider line-->
                                        <span class="border-start mx-2 d-block height-20"></span>
                                        <form action="{{ route('applicants.destroy', $applicant->id )}}" method="post" class="areyousure">
                                            @csrf
                                            @method('delete')
                                            <button data-tippy-content="Unsubscribe">
                                            <span
                                                class="material-symbols-rounded align-middle fs-5 text-body">Unsubscribe</span>
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
