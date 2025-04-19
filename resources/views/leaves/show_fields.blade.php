<tr>
    <th scopre="row">{!! Form::label('id', 'Id:') !!}</th>
    <td>{{ $leave->id }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('member_id', 'Member Id:') !!}</th>
    <td>{{ $leave->member_id }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('date', 'Date:') !!}</th>
    <td>{{ $leave->date }}</td>
</tr>


{{-- <tr>
    <th scopre="row">{!! Form::label('is_half', 'Is Half:') !!}</th>
    <td>{{ $leave->is_half }}</td>
</tr> --}}


<tr>
    <th scopre="row">{!! Form::label('status', 'Status:') !!}</th>
    <td>{{ $leave->status }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('Reason', 'Reason:') !!}</th>
    <td>{{ $leave->Reason }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('created_at', 'Created At:') !!}</th>
    <td>{{ $leave->created_at }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('updated_at', 'Updated At:') !!}</th>
    <td>{{ $leave->updated_at }}</td>
</tr>


