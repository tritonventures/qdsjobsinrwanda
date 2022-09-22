@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Internships</li>
    </ol>
    <div class="container-fluid" v-cloak>
        <div class="animated fadeIn">
            <div class="row px-3 mb-4">
                <h4 class="mb-0 mt-2">
                    Internships
                </h4>
            </div>
            <div class="w-100 text-center">
                @include('flash::message')
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('shared.internships.table')
                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
