<!-- Leave Type Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('leave_type', 'Leave Type:',['class'=>'control-label']) !!}
        {!! Form::text('leave_type', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Day Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('day', 'Day:',['class'=>'control-label']) !!}
        {!! Form::number('day', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- effect_salary Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('effect_salary', 'effect_salary:',['class'=>'control-label']) !!}
        {!! Form::select('effect_salary', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12" style="text-align-last: right;">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('leaveTypes.index') }}" class="btn btn-danger">Cancel</a>
</div>
