@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.jobs.index') }}">Job</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="container-fluid" v-cloak>
        <div class="animated fadeIn">
            <div class="row px-3 mb-4">
                <a href="{{ route('admin.jobs.index') }}" class="btn btn-dark mr-3">Back</a>
                <h4 class="mb-0 mt-2">
                    Details
                </h4>
            </div>
            @include('coreui-templates::common.errors')
            <div class="w-100 px-3 text-center">
                @include('flash::message')
            </div>
            <div class="row">
                <div class="col-lg-12 p-0">
                    @include('admin.jobs.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
