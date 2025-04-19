<!-- In Time Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('in_time', 'In Time:',['class'=>'control-label']) !!}
        {!! Form::time('in_time', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Out Time Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('out_time', 'Out Time:',['class'=>'control-label']) !!}
        {!! Form::time('out_time', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Start Date Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('start_date', 'Start Date:',['class'=>'control-label']) !!}
        {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12" style="text-align-last: right;">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('attendanceSettings.index') }}" class="btn btn-danger">Cancel</a>
</div>
