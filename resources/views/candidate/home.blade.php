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
</head>

<body>
    <div id="app" style="min-height:100vh" class="d-flex flex-column flex-md-row">
        <nav class="navbar navbar-dark bg-primary sticky-top d-flex justify-content-between flex-row flex-md-column"
            style="max-height: 100vh">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img class="navbar-brand-full rounded w-auto" src="{{ asset('images/logo.jpeg') }}" height="50"
                    alt="QDS logo">
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
        <main class="flex-grow-1 d-flex flex-column text-capitalize">
            <div class="content flex-grow-1">
                <div class="container pb-4 pt-5 px-4">

                    <b-row>
                        <b-col>
                            <h2 class="mb-5">Welcome, <span
                                    class="h4">{{ Auth::user()->names }}</span></h2>
                        </b-col>
                        <b-col cols="auto" v-cloak>
                            <b-button href="{{ route('index') }}" variant="dark">View Jobs</b-button>
                        </b-col>
                    </b-row>
                    @include('flash::message')
                    <b-row no-gutters class="mt-4 mb-3" v-cloak>
                        <b-col>
                            <h5>General Information</h5>
                        </b-col>
                        <b-col cols="auto">
                            <b-button variant="primary" href="{{ route('candidate.edit') }}">Edit Profile</b-button>
                        </b-col>
                    </b-row>
                    <b-row v-cloak>
                        <b-col cols="12" md="6">
                            <b-form-group label="Names">
                                <b-input readonly value="{{ $user->names }}" />
                            </b-form-group>
                        </b-col>
                        <b-col cols="12" md="6">
                            <b-form-group label="Email">
                                <b-input readonly value="{{ $user->email }}" />
                            </b-form-group>
                        </b-col>
                        <b-col cols="12" md="6">
                            <b-form-group label="Phone number">
                                <b-input readonly value="{{ $user->phone_number }}" />
                            </b-form-group>
                        </b-col>
                        <b-col cols="12" md="6">
                            <b-form-group label="Gender">
                                <b-input readonly value="{{ $user->gender ? $user->gender->name : 'none' }}" />
                            </b-form-group>
                        </b-col>
                        <b-col cols="12" md="6">
                            <b-form-group label="Date of Birth">
                                <b-input readonly value="{{ $user->dob }}" />
                            </b-form-group>
                        </b-col>
                        <b-col cols="12" md="6">
                            <b-form-group label="currently employed?">
                                <b-input readonly value="{{ $user->is_employed ? 'Yes' : 'No' }}" />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <h5 class="mt-4 mb-3" v-cloak>Skills & Qualifications</h5>
                    <b-row v-cloak>
                        <b-col cols="12" md="6">
                            <b-form-group label="Profession">
                                <b-input class="text-capitalize" readonly
                                    value="{{ $user->proffession ? $user->proffession->name : 'none' }}" />
                            </b-form-group>
                        </b-col>

                        <b-col cols="12" md="6">
                            <b-form-group label="Salary range">
                                <b-input readonly value="{{ $user->salary ? $user->salary->name : 'none' }}" />
                            </b-form-group>
                        </b-col>
                        <b-col cols="12" md="6">
                            <b-form-group label="Nationality">
                                <b-input readonly
                                    value="{{ $user->nationality ? $user->nationality->name : 'none' }}" />
                            </b-form-group>
                        </b-col>
                        @if ($user->languages && $user->languages->count() > 0)

                            <b-col cols="12" md="6">
                                <b-form-group label="Languages">
                                    @foreach ($user->languages as $item)
                                        <h5 class="d-inline ">
                                            <b-badge class="font-weight-normal p-2" variant="dark">{{ $item->name }}
                                            </b-badge>
                                        </h5>
                                    @endforeach
                                </b-form-group>
                            </b-col>
                        @endif
                        @if ($user->educations && $user->educations->count() > 0)
                            <b-col cols="12">
                                <b-row class="mb-4">
                                    <education-helper inline-template selected="{{ $user->educations }}">
                                        <b-container>
                                            <b-row>
                                                <b-col>
                                                    <h5 class="mt-4 mb-3 text-normal">Education(s)</h5>
                                                </b-col>
                                            </b-row>
                                            <b-row v-for="(ed, i) in educations" :key="i"
                                                class="border rounded bg-white py-2 my-2 mx-0">
                                                <b-col cols="12" md="6">
                                                    {{-- education level --}}
                                                    <b-form-group label="Education Level">
                                                        <b-input :value="ed.educationName" readonly />
                                                    </b-form-group>
                                                </b-col>
                                                {{-- school name --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="School name">
                                                        <b-input :value="ed.schoolName" readonly />
                                                    </b-form-group>
                                                </b-col>
                                                {{-- start date --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="Start Date">
                                                        <b-input :value="ed.startDate" readonly />
                                                    </b-form-group>
                                                </b-col>
                                                {{-- end date --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="End Date">
                                                        <b-input :value="ed.endDate" readonly />
                                                    </b-form-group>
                                                </b-col>
                                            </b-row>
                                        </b-container>
                                    </education-helper>
                                </b-row>
                            </b-col>
                        @endif
                        @if ($user->experiences && $user->experiences->count() > 0)
                            <b-col cols="12">
                                <b-row class="mb-4">
                                    <experience-helper inline-template selected="{{ $user->experiences }}">
                                        <b-container>
                                            <b-row>
                                                <b-col>
                                                    <h5 class="mt-4 mb-3 text-normal">Experience(s)</h5>
                                                </b-col>
                                            </b-row>
                                            <b-row v-for="(exp, i) in experiences" :key="i"
                                                class="border rounded bg-white py-2 my-2 mx-0">
                                                <b-col cols="12" md="6">
                                                    {{-- company --}}
                                                    <b-form-group label="Company">
                                                        <b-input :value="exp.company" readonly />
                                                    </b-form-group>
                                                </b-col>
                                                {{-- school name --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="Position">
                                                        <b-input :value="exp.position" readonly />
                                                    </b-form-group>
                                                </b-col>
                                                {{-- start date --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="Start Date">
                                                        <b-input :value="exp.start_date" readonly />
                                                    </b-form-group>
                                                </b-col>
                                                {{-- end date --}}
                                                <b-col cols="12" md="6">
                                                    <b-form-group label="End Date">
                                                        <b-input :value="exp.end_date" readonly />
                                                    </b-form-group>
                                                </b-col>
                                            </b-row>
                                        </b-container>
                                    </experience-helper>
                                </b-row>
                            </b-col>
                        @endif
                        <b-col cols="12">
                            <b-form-group label="Additional skills">
                                <b-textarea readonly rows="5" value="{{ $user->skills }}" />
                            </b-form-group>
                        </b-col>

                    </b-row>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="{{ mix('js/app.js') }}">
</script>
@stack('scripts')

</html>
