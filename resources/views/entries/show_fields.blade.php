<div class="container">
    <!-- User Id Field -->
    <div class="col-sm-12">
        {!! Form::label('user_id', 'User Id:') !!}
        <p>{{ $entry->user_id }}</p>
    </div>

    <!-- Details Field -->
    <div class="col-sm-12">
        {!! Form::label('details', 'Details:') !!}
        <p>{{ $entry->details }}</p>
    </div>
    <!-- Details Field -->
    <div class="col-sm-12">
        {!! Form::label('Images', 'images:') !!}
        @if(!$entry->files->isEmpty())
        @foreach($entry->files as $file )
        <img width="100%" src="{{ $file->entry_file_url }}" alt="{{ $file->entry_file_name }}" />
        @endforeach
        @endif
    </div>
</div>