{!! Form::open(['route' => ['admin.jobs.filter', $job->id], 'method' => 'post', 'class' => 'form-row']) !!}

@include('admin.jobs.modal_fields')

{!! Form::close() !!}
