@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Languages</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
         <div class="row px-3 mb-4">
                <h4 class="mb-0 mt-2">
                    Languages
                </h4>
            </div>
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-body">
                             @include('admin.filters.languages.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

