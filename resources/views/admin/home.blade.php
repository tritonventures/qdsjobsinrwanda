@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row px-3 mb-4">
                <h4 class="mb-0 mt-2">
                    Dashboard
                </h4>
            </div>
            @include('flash::message')
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="mb-3 widget-content rounded bg-skyline p-3 ">
                        <div class="widget-content-wrapper text-white row align-items-center">
                            <div class="col">
                                <h4 class="widget-heading">MEMBERS</h4>
                                <h6 class="widget-subheading font-weight-normal">Total Members</h6>
                            </div>
                            <div class="col-auto">
                                <div class="widget-numbers text-white font-weight-bolder"><span>{{ $candidates }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="mb-3 widget-content rounded bg-midnight p-3 ">
                        <div class="widget-content-wrapper text-white row align-items-center">
                            <div class="col">
                                <h4 class="widget-heading">JOBS</h4>
                                <h6 class="widget-subheading font-weight-normal">Total Jobs</h6>
                            </div>
                            <div class="col-auto">
                                <div class="widget-numbers text-white font-weight-bolder"><span>{{ $jobs }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="mb-3 widget-content rounded bg-sunset p-3 ">
                        <div class="widget-content-wrapper text-white row align-items-center">
                            <div class="col">
                                <h4 class="widget-heading">TENDERS</h4>
                                <h6 class="widget-subheading font-weight-normal">Total Tenders</h6>
                            </div>
                            <div class="col-auto">
                                <div class="widget-numbers text-white font-weight-bolder"><span>{{ $tenders }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="mb-3 widget-content rounded bg-canal p-3 ">
                        <div class="widget-content-wrapper text-white row align-items-center">
                            <div class="col">
                                <h4 class="widget-heading">INTERNSHIPS</h4>
                                <h6 class="widget-subheading font-weight-normal">Total Internships</h6>
                            </div>
                            <div class="col-auto">
                                <div class="widget-numbers text-white font-weight-bolder"><span>{{ $internships }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
