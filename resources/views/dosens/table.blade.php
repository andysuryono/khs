<table class="table table-responsive" id="dosens-table">
    <thead>
        <th>Nama</th>
        <th>Nip</th>
        <th>Password</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($dosens as $dosen)
        <tr>
            <td>{!! $dosen->nama !!}</td>
            <td>{!! $dosen->nip !!}</td>
            <td>{!! $dosen->password !!}</td>
            <td>
                {!! Form::open(['route' => ['dosens.destroy', $dosen->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dosens.show', [$dosen->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dosens.edit', [$dosen->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>