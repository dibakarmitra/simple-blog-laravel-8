@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Entry Details</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-default float-right" href="{{ route('entries.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">
    <div class="card">

        <div class="card-body">
            <div class="row">
                @include('entries.show_fields')
            </div>
        </div>

    </div>
</div>
<div class="content px-3">
    @auth
    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'comments.store']) !!}

        <div class="card-body">

            <div class="row">
                @include('entries.comment-fields')
            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Comment', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('entries.show', $entry->id) }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
    @endauth
    @guest
    <h4 class="py-3 text-center">Please login to comment</h4>
    @endguest
</div>
<div class="content px-3">
    <table class="table">
        <thead>
            <tr>
                <th class="col-md-4">User</th>
                <th class="col-md-8">Comment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <th class="col-md-4">{{$comment->user->name}}</th>
                <th class="col-md-8">{{$comment->comment}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection