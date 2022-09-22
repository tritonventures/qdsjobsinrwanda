{!! Form::open(['route' => ['shared.internships.filter', $internship->id], 'method' => 'post', 'class' => 'form-row']) !!}

@include('shared.internships.modal_fields')

{!! Form::close() !!}
