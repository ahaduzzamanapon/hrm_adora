


<!-- Member Id Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('member_id', 'Select Employee:',['class'=>'control-label']) !!}
        {!! Form::select('member_id', App\Models\User::all()->pluck('name','id')->prepend('Select Employee', '')->toArray(), null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Leave Type Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('leave_type', 'Leave Type:',['class'=>'control-label']) !!}
        {!! Form::select('leave_type', App\Models\LeaveType::all()->pluck('leave_type','id')->prepend('Select Leave Type', '')->toArray(), null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Date Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('date', 'Date:',['class'=>'control-label']) !!}
        {!! Form::date('date', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Is Half Field -->
<div class="col-md-3 d-none">
    <div class="form-group">
        {!! Form::label('is_half', 'Is Half:',['class'=>'control-label']) !!}
        {!! Form::select('is_half', ['No' => 'No', 'Yes' => 'Yes'], null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Status Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('status', 'Status:',['class'=>'control-label']) !!}
        {!! Form::select('status', ['Pending' => 'Pending', 'Approved' => 'Approved'], null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Reason Field -->
<div class="col-md-12">
    <div class="form-group ">
        {!! Form::label('Reason', 'Reason:',['class'=>'control-label']) !!}
        {!! Form::textarea('Reason', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12" style="text-align-last: right;">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('leaves.index') }}" class="btn btn-danger">Cancel</a>
</div>
