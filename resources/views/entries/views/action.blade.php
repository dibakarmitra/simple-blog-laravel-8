@if($entry->deleted_at)
<p>Deleted</p>
@else
{!! Form::open(['route' => ['entries.destroy', $entry->id], 'method' => 'delete']) !!}
<div class="form-group col-sm-12">
    <a href="{{ route('entries.show', [$entry->id]) }}" class='btn btn-primary'>View</a>
    @auth

    <a href="{{ route('entries.edit', [$entry->id]) }}" class='btn btn-info'>Edit</a>
    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
    @endauth

</div>
{!! Form::close() !!}
@endif