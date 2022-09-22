@extends('layouts.guest')

@section('content')
    <div class="container-fluid py-4 ">
        <div class="animated fadeIn" v-cloak>
            <b-row class="mb-4">
                <div class="col-lg-12">
                    <div class="col-lg-12 d-flex">
                        <a href="{{ route('index') }}" class="btn btn-dark mr-3">Back</a>
                        <h4 class="mb-0 mt-2">
                            Internship Details
                        </h4>
                    </div>
                </div>
            </b-row>
            @include('coreui-templates::common.errors')
            <div class="w-100 text-center px-3">
                @include('flash::message')
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @include('home.internships.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
