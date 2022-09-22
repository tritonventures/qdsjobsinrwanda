<div class="row">
    <!-- Name Field -->
    <div class="form-group col-12 col-md-6 ">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>

    <!-- Logo Field -->
    <div class="form-group col-12 col-md-6 ">
        {!! Form::label('logo', 'Logo:') !!}
        <file-formatter inline-template>
            <div>
                <b-form-file v-model="file" placeholder="{{ isset($company) ? $company->logo : 'Choose a file' }}">
                </b-form-file>
                <input name="logo" style="display: none;visibility:hidden" class="d-none" v-model="fileData">
            </div>
        </file-formatter>
    </div>

    <!-- Description Field -->
    <!-- Website Field -->
    <div class="form-group col-12  ">
        {!! Form::label('website', 'Website:') !!}
        {!! Form::text('website', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>
    <div class="form-group col-12  ">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>


    <!-- Submit Field -->
    <div class="form-group col-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('shared.companies.index') }}" class="btn btn-secondary">Cancel</a>
    </div>

</div>
