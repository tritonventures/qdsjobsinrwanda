@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('shared.tenders.index') !!}">Tender</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn" v-cloak>
          <div class="row px-3 mb-4">
                <a href="{{ route('shared.tenders.index') }}" class="btn btn-dark mr-3">Back</a>
                <h4 class="mb-0 mt-2">
                    Edit Tender
                </h4>
            </div>
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              {!! Form::model($tender, ['route' => ['shared.tenders.update', $tender->id], 'method' => 'patch',"class"=>"row"]) !!}

                              @include('shared.tenders.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection