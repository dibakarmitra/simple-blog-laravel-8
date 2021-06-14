<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::input('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div><!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::textarea('entry_id', entry->id, ['class' => 'form-control']) !!}
</div>
<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>