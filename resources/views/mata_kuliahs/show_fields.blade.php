<!-- Id Field -->
{{-- <div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $mataKuliah->id !!}</p>
</div> --}}

<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{!! $mataKuliah->kode !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $mataKuliah->nama !!}</p>
</div>

<!-- Sks Field -->
<div class="form-group">
    {!! Form::label('sks', 'Sks:') !!}
    <p>{!! $mataKuliah->sks !!}</p>
</div>

<!-- Id Dosen Field -->
<div class="form-group">
    {!! Form::label('id_dosen', 'Dosen:') !!}
    <p>{!! $mataKuliah->dosen->nama !!}</p>
</div>

<!-- Created At Field -->
{{-- <div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $mataKuliah->created_at !!}</p>
</div>

Updated At Field
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $mataKuliah->updated_at !!}</p>
</div> --}}

