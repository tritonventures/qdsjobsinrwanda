<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Georama:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    <style>
        [v-cloak]>* {
            display: none
        }

    </style>
</head>

<body>
    <div id="app" style="min-height:100vh" class="d-flex flex-column flex-md-row">
        <nav class="navbar navbar-dark bg-primary sticky-top d-flex justify-content-between flex-row flex-md-column"
            style="max-height: 100vh">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img class="navbar-brand-full rounded w-auto" src="{{ asset('images/logo.png') }}" height="50"
                    alt="qds logo">
            </a>
            <ul class="navbar-nav ">
                <li class="nav-item pb-0 pb-md-4 px-0 px-md-4">
                    <a href="{{ url('/logout') }}" class="btn btn-light btn-flat"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock mr-2"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <main class="flex-grow-1 d-flex flex-column">
            <div class="content flex-grow-1">
                <div class="container pb-4 pt-5 px-4" v-cloak>
                    <h2 class="mb-5">Edit Profile</h2>
                    <b-form method="POST" action="{{ route('candidate.edit') }}">
                        @csrf
                        <b-row no-gutters>
                            <b-col>
                                <h5 class="mt-4 mb-3">General Information</h5>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col cols="12" md="6">
                                <b-form-group label="Names">
                                    <b-input name="names" value="{{ $user->names }}" />
                                </b-form-group>
                            </b-col>
                            <b-col cols="12" md="6">
                                <b-form-group label="Email">
                                    <b-input type="email" name="email" value="{{ $user->email }}" />
                                </b-form-group>
                            </b-col>
                            <b-col cols="12" md="6">
                                <b-form-group label="Phone number">
                                    <b-input name="phone_number" value="{{ $user->phone_number }}" />
                                </b-form-group>
                            </b-col>
                            <b-col cols="12" md="6">
                                <b-form-group label="Gender">
                                    <select name="gender" class="custom-select text-capitalize">
                                        <option value="" disabled selected>Select Gender</option>
                                        @foreach ($genders as $gender)
                                            <option class="text-capitalize"
                                                :selected="{{ isset($user) ? ($user->gender_id == $gender->id ? 'true' : 'false') : 'false' }}"
                                                :value="{{ $gender->id }}">{{ $gender->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </b-form-group>
                            </b-col>
                            <b-col cols="12" md="6">
                                <b-form-group label="Date of Birth">
                                    <input type="date" value="{{ $user->dob }}" class="form-control" name="dob">
                                </b-form-group>
                            </b-col>
                            <b-col cols="12" md="6">
                                <b-form-group label="Are you currently employed?">
                                    {!! Form::select('is_employed', [1 => 'Yes', 0 => 'No'], $user->is_employed ? 1 : 0, ['class' => 'custom-select']) !!}
                                </b-form-group>
                            </b-col>
                        </b-row>
                        <h5 class="mt-4 mb-3">Skills & Qualifications</h5>
                        <b-row>
                            <b-col cols="12" md="6">
                                <b-form-group label="Profession">
                                    <select name="proffession" class="custom-select text-capitalize">
                                        <option value="" disabled selected>Select Profession</option>
                                        @foreach ($proffessions as $proffession)
                                            <option class="text-capitalize"
                                                :selected="{{ isset($user) ? ($user->proffession_id == $proffession->id ? 'true' : 'false') : 'false' }}"
                                                :value="{{ $proffession->id }}">{{ $proffession->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </b-form-group>
                            </b-col>
                            <b-col cols="12" md="6">
                                <b-form-group label="Salary range">
                                    <select name="salary" class="custom-select text-capitalize">
                                        <option value="" disabled selected>Select Salary</option>
                                        @foreach ($salaries as $salary)
                                            <option class="text-capitalize"
                                                :selected="{{ isset($user) ? ($user->salary_id == $salary->id ? 'true' : 'false') : 'false' }}"
                                                :value="{{ $salary->id }}">{{ $salary->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </b-form-group>
                            </b-col>
                            <b-col cols="12" md="6">
                                <b-form-group label="Nationality">
                                    <select name="nationality" class="custom-select text-capitalize">
                                        <option value="" disabled selected>Select Nationality</option>
                                        @foreach ($nationalities as $nationality)
                                            <option class="text-capitalize"
                                                :selected="{{ isset($user) ? ($user->nationality_id == $nationality->id ? 'true' : 'false') : 'false' }}"
                                                :value="{{ $nationality->id }}">{{ $nationality->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </b-form-group>
                            </b-col>
                            <b-col cols="12" md="6">
                                <b-form-group label="Languages">
                                    <multi-select :list="{{ $languages }}"
                                        selected="{{ $user->languages ? $user->languages : null }}"
                                        name="languages" />
                                </b-form-group>
                            </b-col>
                            <b-col cols="12">
                                <b-row class="mb-4">
                                    <education-helper inline-template selected="{{ $user->educations }}">
                                        <b-container>
                                            <b-row>
                                                <b-col>
                                                    <h5 class="mt-4 mb-3 text-normal">Education(s)</h5>
                                                </b-col>
                                                <b-col cols="auto">
                                                    <b-button variant="dark" @click="addEducation">
                                                        <span>
                                                            <b-icon-plus-circle-fill class="mr-1" />
                                                        </span>
                                                        Add Education
                                                    </b-button>
                                                </b-col>
                                            </b-row>
                                            <b-row v-for="(ed, i) in educations" :key="i"
                                                class="border rounded bg-white py-2 my-2 mx-0">
                                                <b-col cols="12" md="6">
                                                    {{-- education level --}}
                                                    <b-form-group label="Education Level">
                                                        <select name="education[]" v-model="ed.educationId"
                                                            class="custom-select text-capitalize">
                                                            <option value="" disabled selected>Select Education</option>
                                                            @foreach ($educations as $education)
                                                                <option class="text-capitalize"
                                                                    :value="{{ $education->id }}">
                                                                    {{ $education->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </b-form-group>
                                                </b-col>
                                                {{-- school name --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="School name">
                                                        <b-input name="school_name[]" v-model="ed.schoolName"
                                                            placeholder="Enter school name" />
                                                    </b-form-group>
                                                </b-col>
                                                {{-- start date --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="Start Date">
                                                        <input type="date" v-model="ed.startDate" class="form-control"
                                                            name="start_date[]">
                                                    </b-form-group>
                                                </b-col>
                                                {{-- end date --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="End Date">
                                                        <input type="date" v-model="ed.endDate" class="form-control"
                                                            name="end_date[]">
                                                    </b-form-group>
                                                </b-col>
                                                <b-col cols="12" class="d-flex justify-content-end">
                                                    <b-button variant="outline-danger" size="sm"
                                                        @click="removeEducation(ed.id)">Remove</b-button>
                                                </b-col>
                                            </b-row>
                                        </b-container>
                                    </education-helper>
                                </b-row>
                            </b-col>
                            <b-col cols="12">
                                <b-row class="mb-4">
                                    <experience-helper inline-template selected="{{ $user->experiences }}">
                                        <b-container>
                                            <b-row>
                                                <b-col>
                                                    <h5 class="mt-4 mb-3 text-normal">Experience(s)</h5>
                                                </b-col>
                                                <b-col cols="auto">
                                                    <b-button variant="dark" @click="addExperience">
                                                        <span>
                                                            <b-icon-plus-circle-fill class="mr-1" />
                                                        </span>
                                                        Add Experience
                                                    </b-button>
                                                </b-col>
                                            </b-row>
                                            <b-row v-for="(exp, i) in experiences" :key="i"
                                                class="border rounded bg-white py-2 my-2 mx-0">
                                                <input type="hidden" name="new_experiences[]" :value="exp.isNew" />
                                                <input type="hidden" name="experience_ids[]" :value="exp.id" />
                                                <b-col cols="12" md="6">
                                                    {{-- experience company --}}
                                                    <b-form-group label="Company">
                                                        <b-form-input name="companies[]" v-model="exp.company"
                                                            class="text-capitalize" />
                                                    </b-form-group>
                                                </b-col>
                                                {{-- school position --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="Position">
                                                        <b-input name="positions[]" v-model="exp.position"
                                                            class="text-capitalize" />
                                                    </b-form-group>
                                                </b-col>
                                                {{-- start date --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="Start Date">
                                                        <input type="date" v-model="exp.start_date"
                                                            class="form-control" name="start_dates[]">
                                                    </b-form-group>
                                                </b-col>
                                                {{-- end date --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="End Date">
                                                        <input type="date" v-model="exp.end_date" class="form-control"
                                                            name="end_dates[]">
                                                    </b-form-group>
                                                </b-col>
                                                <b-col cols="12" class="d-flex justify-content-end">
                                                    <b-button variant="outline-danger" size="sm"
                                                        @click="removeExperience(exp.id)">Remove</b-button>
                                                </b-col>
                                            </b-row>
                                        </b-container>
                                    </experience-helper>
                                </b-row>
                            </b-col>
                            <b-col cols="12">
                                <b-form-group label="Additional skills">
                                    <b-textarea rows="5" name="skills" value="{{ $user->skills }}" />
                                </b-form-group>
                            </b-col>

                            <b-col cols="12">
                                <b-row no-gutters align-h="end" class="mt-4">
                                    <b-button variant="secondary" class="mr-2"
                                        href="{{ route('candidate.dashboard') }}">
                                        Cancel</b-button>
                                    <b-button variant="primary" type="submit">Update Profile</b-button>
                                </b-row>
                            </b-col>

                        </b-row>


                    </b-form>
                </div>
            </div>
            <footer class="app-footer">
                <div class="text-right p-2 px-3">
                    &copy; All rights reserved, QDS Manpower RWANDA.
                </div>
            </footer>
        </main>

    </div>
</body>
<!-- jQuery 3.1.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ mix('js/app.js') }}">
</script>
@stack('scripts')

</html>
