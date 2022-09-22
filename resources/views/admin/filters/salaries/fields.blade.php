<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Min Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min', 'Min:') !!}
    {!! Form::text('min', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Max Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max', 'Max:') !!}
    {!! Form::text('max', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.filters.salaries.index') }}" class="btn btn-secondary">Cancel</a>
</div>
