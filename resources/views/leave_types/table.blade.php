<div class="table-responsive">
    <table class="table" id="leaveTypes-table">
        <thead>
            <tr>
                <th>SL</th>
        <th>Leave Type</th>
        <th>Day</th>
        <th>Effect Salary</th>
       
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($leaveTypes as $key => $leaveType)
            <tr>
                <td>{{ $key + 1 }}</td>
            <td>{{ $leaveType->leave_type }}</td>
            <td>{{ $leaveType->day }}</td>
            <td>{{ $leaveType->effect_salary }}</td>
                <td>
                    {!! Form::open(['route' => ['leaveTypes.destroy', $leaveType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('leaveTypes.show', [$leaveType->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('leaveTypes.edit', [$leaveType->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
