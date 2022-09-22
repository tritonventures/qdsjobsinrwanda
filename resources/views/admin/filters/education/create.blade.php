@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('admin.filters.education.index') !!}">Education</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
          <div class="row px-3 mb-4">
                <a href="{{ route('admin.filters.education.index') }}" class="btn btn-dark mr-3">Back</a>
                <h4 class="mb-0 mt-2">
                    Create Education
                </h4>
            </div>
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route' => 'admin.filters.education.store']) !!}

                                   @include('admin.filters.education.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
