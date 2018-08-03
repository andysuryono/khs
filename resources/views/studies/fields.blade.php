<!-- Id Semester Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_semester', 'Id Semester:') !!}
    {!! Form::text('id_semester', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Mahasiswa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_mahasiswa', 'Id Mahasiswa:') !!}
    {!! Form::text('id_mahasiswa', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Matakuliah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_matakuliah', 'Id Matakuliah:') !!}
    {!! Form::text('id_matakuliah', null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', 'Nilai:') !!}
    {!! Form::text('nilai', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('studies.index') !!}" class="btn btn-default">Cancel</a>
</div>
