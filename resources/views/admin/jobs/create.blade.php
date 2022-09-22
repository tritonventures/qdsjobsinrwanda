@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.jobs.index') !!}">Job</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container-fluid" v-cloak>
        <div class="animated fadeIn">
            <div class="row px-3 mb-4">
                <a href="{{ route('admin.jobs.index') }}" class="btn btn-dark mr-3">Back</a>
                <h4 class="mb-0 mt-2">
                    Create Job
                </h4>
            </div>
            @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => 'admin.jobs.store', 'class' => 'row']) !!}
                            @include('admin.jobs.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
