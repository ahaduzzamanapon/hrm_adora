
<!-- Member Id Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('emp_id', 'Select Employee:',['class'=>'control-label']) !!}
        {!! Form::select('emp_id', App\Models\User::all()->pluck('name','id')->prepend('Select Employee', '')->toArray(), null, ['class' => 'form-control']) !!}
    </div>
</div>



<!-- Date Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('date', 'Date:',['class'=>'control-label']) !!}
        {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
    </div>
</div>

<!-- Amount Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('amount', 'Amount:',['class'=>'control-label']) !!}
        {!! Form::number('amount', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Reason Field -->
<div class="col-md-12">
    <div class="form-group ">
        {!! Form::label('reason', 'Reason:',['class'=>'control-label']) !!}
        {!! Form::textarea('reason', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12" style="text-align-last: right;">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('advanceSalaries.index') }}" class="btn btn-danger">Cancel</a>
</div>
