<div class="overflow-auto px-0 w-100">
    <b-row class="m-0">
        <b-col cols="12" md="7" lg="8" class="px-0 px-md-2 pb-3">
            <section class="bg-white p-3 rounded h-100" style="min-width: 200px">
                <h4 class="mb-4">{{ $tender->title }}</h4>
                <article class="overflow-hidden">
                    {!! $tender->description !!}
                </article>
            </section>
        </b-col>
        <b-col class="px-0 px-md-2 pb-3">
            <section class="p-3 rounded border">
                <h4 class="text-uppercase mb-4">
                    <span class="mr-1">
                        <b-icon-building />
                    </span>
                    @isset($tender->company)
                        {!! $tender->company->name !!}
                    @else
                        -
                    @endisset
                </h4>
                <h6 class="mb-3">
                    <span class="mr-1 font-weight-normal">
                        Tender Location:
                    </span>
                    {{ $tender->location }}
                </h6>


                <div class="mb-2">
                    <span>Posted on</span>
                    <h6 class="d-inline">
                        {{ $tender->created_at ? date('jS F Y', strtotime($tender->created_at)) : 'N/A' }}</h6>
                </div>
                <div class="mb-3">
                    <span>Deadline</span>
                    <h6 class="d-inline">
                        {{ $tender->deadline ? date('jS F Y', strtotime($tender->deadline)) : 'N/A' }}
                    </h6>
                </div>
                @if ($tender->proffessions && $tender->proffessions->count() > 0)
                    <h6 class="font-weight-normal">Professions:</h6>
                    <div class="categories">
                        @foreach ($tender->proffessions as $proffession)
                            <div class="category text-capitalize font-weight-bold">
                                {{ $proffession->name }}
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
            <b-row no-gutters class="mt-3" style="min-width: 200px">
                <b-button block variant="primary" href="{{ route('apply.tender', $tender->id) }}">Apply Now</b-button>
            </b-row>
        </b-col>
    </b-row>
</div>
