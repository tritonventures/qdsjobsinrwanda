<div class="overflow-auto px-0 w-100">
    <b-row class="m-0">
        <b-col cols="12" md="7" lg="8" class="px-0 px-md-2 pb-3">
            <section class="border p-3 rounded h-100 bg-white" style="min-width: 200px">
                <h5 class="mb-3">{{ $tender->title }}</h5>
                <hr>
                <article class="overflow-hidden">
                    {!! $tender->description !!}
                </article>
            </section>
        </b-col>
        <b-col class="px-0 px-md-2 pb-3">
            <section class="border p-3 rounded bg-white">
                <h4 class="text-uppercase mb-4">
                    <span class="mr-1">
                        <b-icon-building />
                    </span>
                    {{ $tender->company->name }}
                </h4>
                <h6 class="mb-3">
                    <span class="mr-1">
                        <b-icon-geo-alt-fill />
                    </span>
                    {{ $tender->location }}
                </h6>
                @isset($tender->proffessions)
                    <h6 class="mb-3">
                        <span class="mr-1 font-weight-normal mb-2">
                            Desired Professions:
                        </span>
                        <div class="categories text-capitalize">`56h                     
                            @foreach ($tender->proffessions as $proffession)
                                <div variant="dark" class="category">{{ $proffession->name }}</div>
                            @endforeach
                        </div>
                    </h6>
                @endisset
                <div class="mb-2">
                    <span>Posted on</span>
                    <h6 class="d-inline">
                        {{ $tender->created_at ? date('jS F Y', strtotime($tender->created_at)) : 'N/A' }}</h6>
                </div>
                <div>
                    <span>Deadline on</span>
                    <h6 class="d-inline">
                        {{ $tender->deadline ? date('jS F Y', strtotime($tender->deadline)) : 'N/A' }}
                    </h6>
                </div>
            </section>
        </b-col>
    </b-row>
</div>
