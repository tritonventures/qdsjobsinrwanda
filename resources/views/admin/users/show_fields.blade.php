<div class="container py-3">
    @include('flash::message')
    <b-row no-gutters class="mb-3" v-cloak>
        <b-col>
            <h5>General Information</h5>
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
                <b-input readonly value="{{ $gender ? $gender->name : 'none' }}" />
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
                <b-input class="text-capitalize" readonly value="{{ $proffession ? $proffession->name : 'none' }}" />
            </b-form-group>
        </b-col>

        <b-col cols="12" md="6">
            <b-form-group label="Salary range">
                <b-input readonly value="{{ $salary ? $salary->name : 'none' }}" />
            </b-form-group>
        </b-col>
        <b-col cols="12" md="6">
            <b-form-group label="Nationality">
                <b-input readonly value="{{ $nationality ? $nationality->name : 'none' }}" />
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
