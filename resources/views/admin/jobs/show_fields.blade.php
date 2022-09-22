<b-container fluid class="overflow-auto px-0 w-100">
    <b-row class="m-0">
        <b-col cols="12" md="7" lg="8" class="px-0 px-md-2 pb-3">
            <section class="border p-3 rounded h-100" style="min-width: 200px">
                <h4 class="mb-3">{{ $job->title }}</h4>
                <hr>
                <article class="overflow-hidden">
                    {!! $job->description !!}
                </article>
            </section>
        </b-col>
        <b-col class="px-0 px-md-2 pb-3">
            <section class="p-3 rounded border ">
                <h4 class="text-uppercase mb-4">
                    <span class="mr-1">
                        <b-icon-building />
                    </span>
                    @isset($job->company)
                        {{ $job->company->name }}
                    @else
                        -
                    @endisset

                </h4>
                <h6 class="mb-3">
                    <span class="mr-1">
                        <b-icon-geo-alt-fill />
                    </span>
                    {{ $job->location }}
                </h6>
                @isset($job->experience)
                    <h6 class="mb-3">
                        <span class="mr-1 font-weight-normal">
                            Desired Experience:
                        </span>
                        {{ $job->experience->name }}

                    </h6>
                @endisset
                @if ($job->education)
                    <h6 class="mb-3">
                        <span class="mr-1 font-weight-normal">
                            Desired Education:
                        </span>
                        {{ $job->education->name }}
                    </h6>
                @endif
                @if ($job->salary)
                    <h6 class="mb-3">
                        <span class="mr-1 font-weight-normal">
                            Proposed Salary:
                        </span>
                        {{ $job->salary->name }}
                    </h6>
                @endif
                @if ($job->nationality)
                    <h6 class="mb-3">
                        <span class="mr-1 font-weight-normal">
                            Desired Nationality:
                        </span>
                        {{ $job->nationality->name }}
                    </h6>
                @endif
                @if ($job->proffession)
                    <h6 class="mb-3 text-capitalize">
                        <span class="mr-1 font-weight-normal">
                            profession:
                        </span>
                        {{ $job->proffession->name }}
                    </h6>
                @endif
                @if ($job->languages && $job->languages->count() > 0)
                    <h6 class="mb-3 text-capitalize">
                        <span class="mr-1 font-weight-normal">
                            Desired Languages:
                        </span>
                        @foreach ($job->languages as $language)

                            <b-badge class="pb-2 px-2 my-1 font-sm font-weight-normal" style="padding-top: 5px;">
                                {{ $language->name }}
                            </b-badge>

                        @endforeach
                    </h6>
                @endif


                <div class="mb-2">
                    <span>Posted on</span>
                    <h6 class="d-inline">
                        {{ $job->created_at ? date('jS F Y', strtotime($job->created_at)) : 'N/A' }}</h6>
                </div>
                <div class="mb-3">
                    <span>Deadline on</span>
                    <h6 class="d-inline">
                        {{ $job->deadline ? date('jS F Y', strtotime($job->deadline)) : 'N/A' }}
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
                <b-button variant="dark" class="px-3" v-b-modal="'admin-jobs-candidates-filter-modal'">
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
                @if ($job->users->count() > 0)
                    @foreach ($job->users as $user)
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
                                <form action="{{ route('admin.jobs.approveMember', [$job->id, $user->id]) }}"
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

        @if ($job->approvedUsers->count() > 0)
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
                    @foreach ($job->approvedUsers as $user)
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
                                <form action="{{ route('admin.jobs.removeMember', [$job->id, $user->id]) }}"
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

<b-modal id="admin-jobs-candidates-filter-modal" title="Member Filter" hide-footer body-class="pb-0">
    @include('admin.jobs.modal')
</b-modal>
