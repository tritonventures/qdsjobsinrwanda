@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.users.index') }}">User</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn" v-cloak>
           <div class="row px-3 mb-4">
                <a href="{{ route('admin.users.index') }}" class="btn btn-dark mr-3">Back</a>
                <h4 class="mb-0 mt-2">
                    Details
                </h4>
            </div>
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body">
                                 @include('admin.users.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection