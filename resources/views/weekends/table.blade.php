<div class="table-responsive">
    <table class="table" id="weekends-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Day</th>
  
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($weekends as $key => $weekend)
            <tr>
                <td>{{ $weekend->id }}</td>
            <td>{{ $weekend->day }}</td>
            
                <td>
                    {!! Form::open(['route' => ['weekends.destroy', $weekend->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('weekends.show', [$weekend->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('weekends.edit', [$weekend->id]) }}" class='btn btn-outline-primary btn-xs'><i
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
