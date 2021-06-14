<!-- User Id Field -->
<div class="form-group col-sm-6 d-none">
    {!! Form::number('user_id', Auth::user()->id, ['class' => 'form-control d-none']) !!}
</div>

<!-- Entry Id Field -->
<div class="form-group col-sm-6 d-none">
    {!! Form::number('entry_id', $entry->id, ['class' => 'form-control d-none']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::text('comment', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Parent Comment Id Field -->
<div class="form-group col-sm-6 d-none">
    {!! Form::number('parent_comment_id', null, ['class' => 'form-control d-none']) !!}
</div>