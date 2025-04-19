<div class="table-responsive">
    <table class="table" id="attendanceSettings-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>In Time</th>
        <th>Out Time</th>
        <th>Start Date</th>
        
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($attendanceSettings as $key => $attendanceSetting)
            <tr>
                <td>{{ $attendanceSetting->id }}</td>
            <td>{{ $attendanceSetting->in_time }}</td>
            <td>{{ $attendanceSetting->out_time }}</td>
            <td>{{ $attendanceSetting->start_date }}</td>
                <td>
                    {!! Form::open(['route' => ['attendanceSettings.destroy', $attendanceSetting->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('attendanceSettings.show', [$attendanceSetting->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('attendanceSettings.edit', [$attendanceSetting->id]) }}" class='btn btn-outline-primary btn-xs'><i
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
