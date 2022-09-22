<b-container fluid class="overflow-auto px-0 w-100">
    <b-row class="m-0">
        <b-col cols="12" md="7" lg="8" class="px-0 px-md-2 pb-3">
            <section class="border p-3 rounded h-100" style="min-width: 200px">
                <h4 class="mb-3">{{ $internship->title }}</h4>
                <hr>
                <article class="overflow-hidden">
                    {!! $internship->description !!}
                </article>
            </section>
        </b-col>
        <b-col class="px-0 px-md-2 pb-3">
            <section class="p-3 rounded border ">
                <h4 class="text-uppercase mb-4">
                    <span class="mr-1">
                        <b-icon-building />
                    </span>
                    {{ $internship->company->name }}
                </h4>
                <h6 class="mb-3">
                    <span class="mr-1">
                        <b-icon-geo-alt-fill />
                    </span>
                    {{ $internship->location }}
                </h6>
                @isset($internship->experience)
                    <h6 class="mb-3">
                        <span class="mr-1 font-weight-normal">
                            Desired Experience:
                        </span>
                        {{ $internship->experience->name }}

                    </h6>
                @endisset
                @if ($internship->education)
                    <h6 class="mb-3">
                        <span class="mr-1 font-weight-normal">
                            Desired Education:
                        </span>
                        {{ $internship->education->name }}
                    </h6>
                @endif
                @if ($internship->salary)
                    <h6 class="mb-3">
                        <span class="mr-1 font-weight-normal">
                            Proposed Salary:
                        </span>
                        {{ $internship->salary->name }}
                    </h6>
                @endif
                @if ($internship->nationality)
                    <h6 class="mb-3">
                        <span class="mr-1 font-weight-normal">
                            Desired Nationality:
                        </span>
                        {{ $internship->nationality->name }}
                    </h6>
                @endif
                @if ($internship->proffession)
                    <h6 class="mb-3 text-capitalize">
                        <span class="mr-1 font-weight-normal">
                            profession:
                        </span>
                        {{ $internship->proffession->name }}
                    </h6>
                @endif
                @if ($internship->languages && $internship->languages->count() > 0)
                    <h6 class="mb-3 text-capitalize">
                        <span class="mr-1 font-weight-normal">
                            Desired Languages:
                        </span>
                        @foreach ($internship->languages as $language)

                            <b-badge class="pb-2 px-2 my-1 font-sm font-weight-normal" style="padding-top: 5px;">
                                {{ $language->name }}
                            </b-badge>

                        @endforeach
                    </h6>
                @endif


                <div class="mb-2">
                    <span>Posted on</span>
                    <h6 class="d-inline">
                        {{ $internship->created_at ? date('jS F Y', strtotime($internship->created_at)) : 'N/A' }}</h6>
                </div>
                <div class="mb-3">
                    <span>Deadline on</span>
                    <h6 class="d-inline">
                        {{ $internship->deadline ? date('jS F Y', strtotime($internship->deadline)) : 'N/A' }}
                    </h6>
                </div>

            </section>

        </b-col>
    </b-row>
    <b-row no-gutters class="px-3 pb-4 mb-4">


        <b-row no-gutters class="w-100 align-items-end">
            <b-col class="py-2">
                <h5 class="mb-3">APPLICANTS:</h5>
            </b-col>
            <b-col class="py-2" cols="auto">
                <b-button variant="dark" class="px-3" v-b-modal="'admin-internships-candidates-filter-modal'">
                    Filter</b-button>
            </b-col>
        </b-row>
        <b-table-simple hover bordered responsive>
            <b-thead>
                <b-tr>
                    <b-th>No.</b-th>
                    <b-th>Names</b-th>
                    <b-th>Email</b-th>
                    <b-th>Phone</b-th>
                    <b-th class="text-center">Action</b-th>
                </b-tr>
            </b-thead>
            <b-tbody>
                @if ($internship->users->count() > 0)
                    @foreach ($internship->users as $user)
                        <b-tr class="va-baseline">
                            <b-td>{{ $loop->iteration }}</b-td>
                            <b-td>
                                <a href="{{ route('admin.users.show', $user->id) }}">
                                    {{ $user->names }}
                                </a>
                            </b-td>
                            <b-td>{{ $user->email }}</b-td>
                            <b-td>{{ $user->phone_number }}</b-td>
                            <b-td class="d-flex justify-content-center">
                                <form action="{{ route('shared.internships.approveMember', [$internship->id, $user->id]) }}"
                                    method="post">
                                    @csrf
                                    <b-button size="sm" type="submit" variant="dark">Approve</b-button>
                                </form>
                            </b-td>
                        </b-tr>
                    @endforeach

                @else
                    <b-tr>
                        <b-td colspan="5">
                            <p class="m-0 text-center py-4">No applicants available</p>
                        </b-td>
                    </b-tr>
                @endif
            </b-tbody>
        </b-table-simple>
    </b-row>
    <b-row no-gutters class="px-3 pb-4">

        @if ($internship->approvedUsers->count() > 0)
            <h5 class="mb-3">APPROVED APPLICANTS:</h5>
            <b-table-simple hover bordered responsive>
                <b-thead>
                    <b-tr>
                        <b-th>No.</b-th>
                        <b-th>Names</b-th>
                        <b-th>Email</b-th>
                        <b-th>Phone</b-th>
                        <b-th class="text-center">Action</b-th>
                    </b-tr>
                </b-thead>
                <b-tbody>
                    @foreach ($internship->approvedUsers as $user)
                        <b-tr class="va-baseline">
                            <b-td>{{ $loop->iteration }}</b-td>
                            <b-td>
                                <a href="{{ route('admin.users.show', $user->id) }}">
                                    {{ $user->names }}
                                </a>
                            </b-td>
                            <b-td>{{ $user->email }}</b-td>
                            <b-td>{{ $user->phone_number }}</b-td>
                            <b-td class="d-flex justify-content-center">
                                <form action="{{ route('shared.internships.removeMember', [$internship->id, $user->id]) }}"
                                    method="post">
                                    @csrf
                                    <b-button size="sm" type="submit" variant="dark">Remove</b-button>
                                </form>
                            </b-td>
                        </b-tr>
                    @endforeach
                </b-tbody>
            </b-table-simple>
        @endif
    </b-row>
</b-container>

<b-modal id="admin-internships-candidates-filter-modal" title="Member Filter" hide-footer body-class="pb-0">
    @include('shared.internships.modal')
</b-modal>
