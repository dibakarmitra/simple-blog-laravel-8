<div class="row">
    @foreach($entries as $entry)
    <div class="col-9 offset-1">
        <ul class="timeline">
            <li class="{{$entry->deleted_at!=null?'deleted':''}}">
                <a href="#" class="float-right">{{$entry->created_at}}</a>
                <p>{{$entry->details}}</p>

                {{--
                    @if($entry->deleted_at)
                    <label>Status :</label> 
                    <span class="{{$entry->deleted_at!=null?'span-deleted':''}}">Deleted</span>
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
                @include('entries.views.action')
            </li>
        </ul>
    </div>
    @endforeach
</div>

@section('css')
<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 20px 0;
        padding-left: 20px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }

    .deleted {
        background-color: #80808030;
        -webkit-text-decoration-line: line-through;
        text-decoration-line: line-through;
    }

    .deleted .span-deleted {
        text-decoration: none;
        display: inline-block;
    }
</style>
@endsection