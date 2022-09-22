    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Tender Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>

    <!-- Company Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('company', 'Company:') !!}
        <select name="company_id" class="custom-select text-capitalize">
            <option value="" disabled selected>Select company</option>
            @foreach ($companies as $company)
                <option class="text-capitalize"
                    :selected="{{ isset($tender) ? ($tender->company_id == $company->id ? 'true' : 'false') : 'false' }}"
                    :value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Website Link Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('website_link', 'Website Link:') !!}
        {!! Form::text('website_link', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>

    <!-- Location Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('location', 'Location:') !!}
        {!! Form::text('location', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>
    <!-- Proffession Field -->
    <div class="form-group col-md-6 col-12">
        {!! Form::label('proffessions', 'Professions:') !!}
        <multi-select :list="{{ $proffessions }}" name="proffessions"
            selected="{{ isset($tender->proffessions) ? $tender->proffessions : null }}" />
    </div>

    <!-- Deadline Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('deadline', 'Tender Deadline:') !!}
        <div class="form-group">
            <input type="date" value="{{ isset($tender) ? $tender->deadline : null }}" class="form-control mb-2"
                name="deadline">
        </div>
    </div>
    <!-- Description Field -->
    <text-editor inline-template description="{{ isset($tender) ? $tender->description : null }}">
        <div class="form-group col-sm-12">

            <b-row no-gutters>
                <b-col>
                    <label for="description">Tender Description:</label>
                </b-col>
                <b-col cols="auto">
                    <b-button variant="dark" size="sm" v-on:click="preview = !preview">Preview</b-button>
                </b-col>
            </b-row>
            <div v-show="preview">
                <article v-html="inputData" class="border p-3 rounded mt-2"></article>
            </div>
            <div v-show="!preview">
                <vue-editor v-model="inputData" />
            </div>
            <input type="text" name="description" v-model="inputData" style="display: none;visibility:hidden;opacity:0">
        </div>
    </text-editor>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('shared.tenders.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
