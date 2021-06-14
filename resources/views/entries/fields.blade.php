<!-- Details Field -->
<div class="form-group col-sm-6 d-none">
    {!! Form::number('user_id', Auth::user()->id, ['class' => 'form-control d-none']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12" height="50px">
    {!! Form::label('details', 'Details:') !!}
    {!! Form::textarea('details', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>
<div class="form-group file-input col-sm-12">
{{ Form::file('images',array('class' => 'form-control col-sm-12', 'multiple')) }}
</div>
