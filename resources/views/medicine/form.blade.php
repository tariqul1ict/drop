@row
<div class="form-group">
    {{ Form::label('name') }}
    {{ Form::text('name', $medicine->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
</div>
 @endrow
</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>