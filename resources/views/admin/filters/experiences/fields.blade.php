<div class="row">
    <!-- Min Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('min', 'Minimum Years:') !!}
        {!! Form::text('min', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>

    <!-- Max Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('max', 'Maximum Years:') !!}
        {!! Form::text('max', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.filters.experiences.index') }}" class="btn btn-secondary">Cancel</a>
    </div>

</div>
