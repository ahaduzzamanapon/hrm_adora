<!-- Day Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('day', 'Day:',['class'=>'control-label']) !!}
        {!! Form::select('day', ['Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', 'Sunday' => 'Sunday'], null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12" style="text-align-last: right;">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('weekends.index') }}" class="btn btn-danger">Cancel</a>
</div>
