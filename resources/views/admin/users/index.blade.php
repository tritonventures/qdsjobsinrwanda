@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Members</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row px-3 mb-4">
                <h4 class="mb-0 mt-2">
                   Members
                </h4>
            </div>
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.users.table')
                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="admin-candidates-filter-modal" tabindex="-1"
                aria-labelledby="admin-candidates-filter-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="admin-candidates-filter-modalLabel">Members Filter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pb-0">
                            @include('admin.users.modal')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
