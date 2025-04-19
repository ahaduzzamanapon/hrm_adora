<div class="table-responsive">
    <table class="table" id="leaves-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Employee</th>
        <th>Leave Type</th>
        <th>Date</th>

        <th>Status</th>
        <th>Reason</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($leaves as $key => $leave)
            <tr>
                <td>{{ $leave->id }}</td>
            <td>{{ $leave->user_name }} {{ $leave->user_last_name }}</td>
            <td>{{ $leave->leave_type_name }}</td>
            
            <td>{{ $leave->date }}</td>
            <td>{{ $leave->status }}</td>
            <td>{{ $leave->Reason }}</td>

                <td>
                    {!! Form::open(['route' => ['leaves.destroy', $leave->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('leaves.show', [$leave->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('leaves.edit', [$leave->id]) }}" class='btn btn-outline-primary btn-xs'><i
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
