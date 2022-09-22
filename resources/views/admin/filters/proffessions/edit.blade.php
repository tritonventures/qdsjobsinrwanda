@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('admin.filters.proffessions.index') !!}">Profession</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
          <div class="row px-3 mb-4">
                <a href="{{ route('admin.filters.proffessions.index') }}" class="btn btn-dark mr-3">Back</a>
                <h4 class="mb-0 mt-2">
                    Edit Profession
                </h4>
            </div>
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              {!! Form::model($proffession, ['route' => ['admin.filters.proffessions.update', $proffession->id], 'method' => 'patch']) !!}

                              @include('admin.filters.proffessions.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection