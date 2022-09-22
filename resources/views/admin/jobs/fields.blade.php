<div class="row mx-0">
    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>

    <!-- Company Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('company', 'Company:') !!}
        <select name="company_id" class="custom-select text-capitalize">
            <option value="" disabled selected>Select company</option>
            @foreach ($companies as $company)
                <option class="text-capitalize"
                    :selected="{{ isset($job) ? ($job->company_id == $company->id ? 'true' : 'false') : 'false' }}"
                    :value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Location Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('location', 'Location:') !!}
        {!! Form::text('location', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>

    <!-- Nationality Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nationality_id', 'Nationality:') !!}
        <select name="nationality_id" class="custom-select text-capitalize">
            <option value="" disabled selected>Select Nationality</option>
            @foreach ($nationalities as $nationality)
                <option class="text-capitalize"
                    :selected="{{ isset($job) ? ($job->nationality_id == $nationality->id ? 'true' : 'false') : 'false' }}"
                    :value="{{ $nationality->id }}">{{ $nationality->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Language Id Field -->
    <div class="form-group col-md-6 col-12">
        {!! Form::label('languages', 'Languages:') !!}
        <multi-select :list="{{ $languages }}" name="languages"
            selected="{{ isset($job->languages) ? $job->languages : null }}" />
    </div>

    <!-- Experience Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('experience_id', 'Experience:') !!}
        <select name="experience_id" class="custom-select text-capitalize">
            <option value="" disabled selected>Select Experience</option>
            @foreach ($experiences as $experience)
                <option class="text-capitalize"
                    :selected="{{ isset($job) ? ($job->experience_id == $experience->id ? 'true' : 'false') : 'false' }}"
                    :value="{{ $experience->id }}">{{ $experience->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Education Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('education_id', 'Education:') !!}
        <select name="education_id" class="custom-select text-capitalize">
            <option value="" disabled selected>Select Education</option>
            @foreach ($educations as $education)
                <option class="text-capitalize"
                    :selected="{{ isset($job) ? ($job->education_id == $education->id ? 'true' : 'false') : 'false' }}"
                    :value="{{ $education->id }}">{{ $education->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Profession Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('proffession_id', 'Profession:') !!}
        <select name="proffession_id" class="custom-select text-capitalize">
            <option value="" disabled selected>Select profession</option>
            @foreach ($proffessions as $proffession)
                <option class="text-capitalize"
                    :selected="{{ isset($job) ? ($job->proffession_id == $proffession->id ? 'true' : 'false') : 'false' }}"
                    :value="{{ $proffession->id }}">{{ $proffession->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Salary Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('salary_id', 'Salary:') !!}
        <select name="salary_id" class="custom-select text-capitalize">
            <option value="" disabled selected>Select Salary</option>
            @foreach ($salaries as $salary)
                <option class="text-capitalize"
                    :selected="{{ isset($job) ? ($job->salary_id == $salary->id ? 'true' : 'false') : 'false' }}"
                    :value="{{ $salary->id }}">{{ $salary->name }}</option>
            @endforeach
        </select>
    </div>

     <!-- Deadline Field -->
     <div class="form-group col-sm-6">
        {!! Form::label('deadline', 'Job Deadline:') !!}
        <div class="form-group">
            <input type="date" value="{{ isset($job) ? $job->deadline : null }}" class="form-control mb-2"
                name="deadline">
        </div>
    </div>

    <text-editor inline-template description="{{ isset($job) ? $job->description : null }}">
        <div class="form-group col-sm-12">
            <b-row no-gutters>
                <b-col>
                    <label for="description">Job Description:</label>
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
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Cancel</a>
    </div>

</div>
