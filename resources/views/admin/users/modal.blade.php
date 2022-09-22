{!! Form::open(['route' => ['admin.users.filter'], 'method' => 'post', 'class' => 'form-row']) !!}

@include('admin.users.modal_fields')

{!! Form::close() !!}
