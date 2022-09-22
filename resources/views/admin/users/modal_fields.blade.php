<div class="form-group col-md-6 col-12">
    {!! Form::label('proffession', 'Profession:') !!}
    {!! Form::select('proffession', $proffessions, $selected->proffession, ['class' => 'custom-select text-capitalize', 'placeholder' => 'Select Profession']) !!}
</div>

<div class="form-group col-md-6 col-12">
    {!! Form::label('education', 'Education:') !!}
    {!! Form::select('education', $educations, $selected->education, ['class' => 'custom-select text-capitalize', 'placeholder' => 'Select Education']) !!}
</div>

<div class="form-group col-md-6 col-12">
    {!! Form::label('experience', 'Experience:') !!}
    {!! Form::select('experience', $experiences, $selected->experience, ['class' => 'custom-select text-capitalize', 'placeholder' => 'Select Experience']) !!}
</div>

<div class="form-group col-md-6 col-12">
    {!! Form::label('salary', 'Salary:') !!}
    {!! Form::select('salary', $salaries, $selected->salary, ['class' => 'custom-select text-capitalize', 'placeholder' => 'Select Salary']) !!}
</div>

<div class="form-group col-md-6 col-12">
    {!! Form::label('nationality', 'Nationality:') !!}
    {!! Form::select('nationality', $nationalities, $selected->nationality, ['class' => 'custom-select text-capitalize', 'placeholder' => 'Select Nationality']) !!}
</div>

<div class="form-group col-md-6 col-12">
    {!! Form::label('language', 'Language:') !!}
    {!! Form::select('language', $languages, $selected->language, ['class' => 'custom-select text-capitalize', 'placeholder' => 'Select Language']) !!}
</div>

<div class="modal-footer w-100 mt-3">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <a href="{{ route('admin.users.clearFilter') }}" class="btn btn-secondary">Reset Filters</a>
    <button type="submit" class="btn btn-primary">Save Filters</button>
</div>
