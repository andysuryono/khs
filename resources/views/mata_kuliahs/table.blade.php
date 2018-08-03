<table class="table table-responsive" id="mataKuliahs-table">
    <thead>
        <th>Kode</th>
        <th>Nama</th>
        <th>Sks</th>
        <th>Id Dosen</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($mataKuliahs as $mataKuliah)
        <tr>
            <td>{!! $mataKuliah->kode !!}</td>
            <td>{!! $mataKuliah->nama !!}</td>
            <td>{!! $mataKuliah->sks !!}</td>
            <td>{!! $mataKuliah->id_dosen !!}</td>
            <td>
                {!! Form::open(['route' => ['mataKuliahs.destroy', $mataKuliah->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mataKuliahs.show', [$mataKuliah->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mataKuliahs.edit', [$mataKuliah->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>