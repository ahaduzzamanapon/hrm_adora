<div class="table-responsive">
    <table class="table" id="advanceSalaries-table">
        <thead>
            <tr>
                <th>SL</th>
                <th>Employee Name</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Reason</th>
        
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($advanceSalaries as $key => $advanceSalary)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $advanceSalary->name }} {{ $advanceSalary->last_name }}</td>
            <td>{{ $advanceSalary->date }}</td>
            <td>{{ $advanceSalary->amount }}</td>
            <td>{{ $advanceSalary->reason }}</td>
           
                <td>
                    {!! Form::open(['route' => ['advanceSalaries.destroy', $advanceSalary->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('advanceSalaries.show', [$advanceSalary->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('advanceSalaries.edit', [$advanceSalary->id]) }}" class='btn btn-outline-primary btn-xs'><i
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
