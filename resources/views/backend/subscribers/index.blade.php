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
                            <th>Email</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ $subscriber->email }}</h6>
                                            <small class="text-muted">{{ $subscriber->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end align-items-center">

                                        <!--Divider line-->
                                        <span class="border-start mx-2 d-block height-20"></span>
                                        <form action="{{ route('subscribers.destroy', $subscriber->id )}}" method="post" class="areyousure">
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
