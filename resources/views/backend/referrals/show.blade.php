@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="pt-3 px-3 px-lg-6 overflow-hidden">
            <img src="/assets/img/referrals/medium/{{ $referral->image }}" class="img-fluid rounded-5 mb-3 mb-lg-0 shadow-lg" alt="">
            <div class="row align-items-lg-end align-items-center mx-lg-0 mb-4 mb-lg-0">
                <div class="col-auto px-lg-5">

                    <!-- Avatar -->
                    <div class="avatar xxl rounded-4 p-1 bg-body overflow-hidden position-relative mt-lg-n5">
                        <img src="/assets/img/referrals/thumbnails/{{ $referral->image }}" alt="..." class="img-fluid rounded-4">
                    </div>

                </div>
                <div class="col mb-3 px-lg-5">
                    <div class="row align-items-md-end">
                        <div class="col-12 col-md">

                            <!-- Profile Subtitle -->
                            <span class="text-muted small d-block pt-3 mb-1">
                                                    {{ $referral->created_at->diffForHumans() }}
                                                </span>

                            <!--Profile Title -->
                            <h3 class="profile-title mb-0">
                                {{ $referral->title }}
                            </h3>

                        </div>



                    </div>

                </div>

            </div>

            <div class="row mb-3 px-lg-5" >
                <div class="col-12">

                    <!-- Subscribe Button -->
                    <p>
                        {!! $referral->description !!}
                    </p>



                </div>
            </div>


        </div>
    </div>
@endsection
