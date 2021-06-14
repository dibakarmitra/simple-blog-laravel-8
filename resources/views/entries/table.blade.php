<div class="table-responsive">
    <table class="table" id="entries-table">
        <thead>
            <tr>
                <th>User Id</th>
                <th>Entry Id</th>
                <th>Details</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entries as $entry)
            <tr>
                <td>{{ $entry->user_id }}</td>
                <td>{{ $entry->id }}</td>
                <td>{{ $entry->details }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['entries.destroy', $entry->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('entries.show', [$entry->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @auth
                        @if(Auth::user()->id == $entry->user_id)
                        <a href="{{ route('entries.edit', [$entry->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                        @endauth
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>