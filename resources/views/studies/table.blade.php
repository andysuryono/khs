<table class="table table-responsive" id="studies-table">
    <thead>
        <th>Id Semester</th>
        <th>Id Mahasiswa</th>
        <th>Id Matakuliah</th>
        <th>Nilai</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($studies as $study)
        <tr>
            <td>{!! $study->id_semester !!}</td>
            <td>{!! $study->id_mahasiswa !!}</td>
            <td>{!! $study->id_matakuliah !!}</td>
            <td>{!! $study->nilai !!}</td>
            <td>
                {!! Form::open(['route' => ['studies.destroy', $study->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('studies.show', [$study->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('studies.edit', [$study->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>