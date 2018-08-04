<!-- Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Sks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sks', 'Sks:') !!}
    {!! Form::text('sks', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Dosen Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('id_dosen', 'Id Dosen:') !!}
    {!! Form::text('id_dosen', null, ['class' => 'form-control']) !!}
</div> --}}

<div class="form-group col-sm-6">
    {!! Form::label('id_dosen', 'Dosen:') !!}
    {{ Form::select('id_dosen', $items = App\Models\Dosen::pluck('nama', 'id'), null, array('class'=>'form-control','style'=>'' )) }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mataKuliahs.index') !!}" class="btn btn-default">Cancel</a>
</div>
