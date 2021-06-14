<div class="row">
    @foreach($entries as $entry)

    <div class="form-group col-4 {{$entry->deleted_at!=null?'deleted':''}}">
        <div class="card">
            <div class="card-body">
                <div class="card-text">
                    <div class="clearfix">
                        <label>Date :</label>
                        <span>{{$entry->created_at}}</span>
                    </div>
                    <div class="clearfix">
                        <label>Details :</label> <span>{{substr($entry->details,0,75)}}{{(strlen($entry->details)>75)?'...':''}}</span>
                    </div>
                    <div class="clearfix">

                        <span class="{{$entry->deleted_at!=null?'span-deleted':''}}">
                            @include('entries.views.action')
                            {{--
                                @if($entry->deleted_at)
                                Deleted
                                @else
                                {!! Form::open(['route' => ['entries.destroy', $entry->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('entries.show', [$entry->id]) }}" class='btn btn-default btn'>View</a>
                            @auth

                            <a href="{{ route('entries.edit', [$entry->id]) }}" class='btn btn-default btn'>Edit</a>
                            {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            @endauth
                    </div>
                    {!! Form::close() !!}
                    @endif
                    --}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>

@section('css')
<style>
    .deleted .card {
        background-color: #80808030;
        -webkit-text-decoration-line: line-through;
        text-decoration-line: line-through;
    }

    .deleted .span-deleted {
        text-decoration: none;
        display: inline-block;
    }

    .card-body {
        min-height: 201px;
    }
</style>
@endsection