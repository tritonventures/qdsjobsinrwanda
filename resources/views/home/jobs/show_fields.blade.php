@push('css')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
@endpush
<section class="bgc-fa pb30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <div class="candidate_personal_info style2">
                    <div class="details">
                        <h3>{!! $job->title !!}</h3>
                        <p>Posted {{ $job->created_at ? date('jS F Y', strtotime($job->created_at)) : '' }} by <a
                                href="#" class="text-thm2">
                                @isset($job->company)
                                    {!! $job->company->name !!}
                                @else
                                    -
                                @endisset</a></p>
                    </div>
                    <div class="row personer_information_company">
                        <div class="col-sm-6 col-lg-6">
                            <div class="details">
                                <p>Job Location</p>
                                <p>{!! $job->location !!}</p>
                            </div>
                        </div>
                        @isset($job->experience)
                            <div class="col-sm-6 col-lg-6">
                                <div class="details">
                                    <p>Experience</p>
                                    <p>{!! $job->experience->name !!}</p>
                                </div>
                            </div>
                        @endisset
                        @if ($job->proffessions && $job->proffessions->count() > 0)
                            <div class="col-sm-6 col-lg-6">
                                <div class="details">
                                    <p class="font-weight-normal">Professions:</p>
                                    <div class="categories">
                                        @foreach ($job->proffessions as $proffession)
                                            <div class="category text-capitalize">
                                                {{ $proffession->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($job->languages && $job->languages->count() > 0)
                            <div class="col-sm-6 col-lg-6">
                                <div class="details">
                                    <p class="font-weight-normal">Languages:</p>
                                    <div class="categories">
                                        @foreach ($job->languages as $language)
                                            <div class="category text-capitalize">
                                                {{ $language->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        @isset($job->nationality)
                            <div class="col-sm-6 col-lg-6">
                                <div class="details">
                                    <p>Nationality</p>
                                    <p>{!! $job->nationality->name !!}</p>
                                </div>
                            </div>
                        @endisset
                        @isset($job->education)
                            <div class="col-sm-6 col-lg-6">
                                <div class="details">
                                    <p>Qualification</p>
                                    <p>{!! $job->education->name !!}</p>
                                </div>
                            </div>
                        @endisset
                        @isset($job->deadline)
                            <div class="col-sm-6 col-lg-6">
                                <div class="details">
                                    <p>Deadline</p>
                                    <p>{!! date('jS F Y', strtotime($job->deadline)) !!}</p>
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                @if ($applied)
                    <b-row no-gutters class="mb-3" style="min-width: 200px">
                        <b-button block variant="primary" disabled>Job Applied</b-button>
                    </b-row>
                @else
                    <b-row no-gutters class="mb-3" style="min-width: 200px">
                        <b-button block variant="primary" href="{{ route('apply.job', $job->id) }}">Apply Now
                        </b-button>
                    </b-row>
                @endif
                <div class="candidate_personal_overview style3">
                    <div class="thumb">
                        <img class="img-fluid rounded" style="max-width: 250px; max-height: 250px"
                            src="{{ asset($job->company->logo) }}" alt="{!! $job->company->name !!}">
                    </div>
                    <p class="mb0 mt-3">{!! $job->company->name !!}</p>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="candidate_about_info style2 mt10">
                            <h4 class="fz20 mb30">Description</h4>
                            <article class="overflow-hidden">
                                {!! $job->description !!}
                            </article>
                            @if ($applied)
                                <b-row no-gutters class="mt-3" style="min-width: 200px">
                                    <b-button block variant="primary" disabled>Job Applied</b-button>
                                </b-row>
                            @else
                                <b-row no-gutters class="mt-3" style="min-width: 200px">
                                    <b-button variant="primary" href="{{ route('apply.job', $job->id) }}">Apply
                                        Now</b-button>
                                </b-row>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
