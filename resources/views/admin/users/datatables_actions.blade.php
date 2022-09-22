{!! Form::open(['route' => ['admin.users.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.users.show', $id) }}" class='btn btn-ghost-success'>
        <i class="fa fa-eye"></i>
    </a>
</div>
{!! Form::close() !!}
