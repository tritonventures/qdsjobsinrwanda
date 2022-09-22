{!! Form::open(['route' => ['shared.tenders.destroy', $id], 'method' => 'delete']) !!}
<div class="container">
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-dark  " type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a href="{{ route('shared.tenders.show', $id) }}" class='dropdown-item'>
                        Show Tender
                    </a>
                    <a href="{{ route('shared.tenders.edit', $id) }}" class='dropdown-item'>
                        Edit Tender
                    </a>
                    <a href="{{ route('shared.tenders.publish', $id) }}"
                        class="dropdown-item">{{ $published ? 'Unpublish Tender' : 'Publish Tender' }}</a>
                    {!! Form::button('Delete Tender', [
    'type' => 'submit',
    'class' => 'dropdown-item btn w-100 text-left text-danger',
    'onclick' => "return confirm('Are you sure?')",
]) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
