<div class="form-group col-sm-6">
    {!! Form::label('id_jurusan', 'Jurusan:') !!}
    {{ Form::select('id_jurusan', $items = App\Models\Jurusan::pluck('nama', 'id'), null, array('class'=>'form-control','style'=>'' )) }}
</div>
<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Nim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nim', 'Nim:') !!}
    {!! Form::text('nim', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mahasiswas.index') !!}" class="btn btn-default">Cancel</a>
</div>
