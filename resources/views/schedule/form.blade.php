@row
<div class="form-group">
            {{ Form::label('medicine_id') }}
            {{ Form::select('medicine_id', $medicines,$schedule->medicine_id, ['class' => 'form-select' . ($errors->has('medicine_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Medicine']) }}
            {!! $errors->first('medicine_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::date('date', $schedule->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start') }}
            {{ Form::time('start', $schedule->start, ['class' => 'form-control' . ($errors->has('start') ? ' is-invalid' : ''), 'placeholder' => 'Start']) }}
            {!! $errors->first('start', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('end') }}
            {{ Form::time('end', $schedule->end, ['class' => 'form-control' . ($errors->has('end') ? ' is-invalid' : ''), 'placeholder' => 'End']) }}
            {!! $errors->first('end', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('count') }}
            {{ Form::select('count', [
                '1'=>1,
                '2'=>2,
                '3'=>3,
                '4'=>4,
                '5'=>5,
                '6'=>6,
                '7'=>7,
                '8'=>8,
                '9'=>9,
            ],$schedule->count, ['class' => 'form-select' . ($errors->has('count') ? ' is-invalid' : ''), 'placeholder' => 'Select']) }}
            {!! $errors->first('count', '<div class="invalid-feedback">:message</div>') !!}
        </div>
@endrow
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>